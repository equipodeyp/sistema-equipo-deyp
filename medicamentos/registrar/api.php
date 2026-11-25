<?php
header("Content-Type: application/json; charset=utf-8");
error_reporting(0);

// Conexión a MariaDB
$conn = new mysqli('localhost', 'root', '', 'sistemafgjem');
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Fallo de conexión con la base de datos"]);
    exit;
}
$conn->set_charset("utf8mb4");

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'GET' && isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    
    // 1. Cargar los últimos 5 registros para la tabla principal

    if ($accion === 'READ') {
        $sql = "SELECT id, codigo, nombre_generico, nombre_comercial, forma_farmaceutica, gramaje, contenido, via_administracion, presentacion, ediciones 
                FROM medicamentos 
                ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        $regs = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $regs[] = $row;
            }
        }
        echo json_encode($regs);
        exit;
    }


    // 2. Cargar TODOS los registros para el catálogo PDF
    if ($accion === 'READ_ALL') {
        $sql = "SELECT codigo, nombre_generico, nombre_comercial, forma_farmaceutica, gramaje, contenido, via_administracion, presentacion 
                FROM medicamentos 
                ORDER BY nombre_generico ASC, codigo ASC";
        $result = $conn->query($sql);
        $regs = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $regs[] = $row;
            }
            echo json_encode(["status" => "success", "data" => $regs]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al consultar el catálogo"]);
        }
        exit;
    }
    
    // 3. Buscar medicamento por código
    if ($accion === 'SEARCH') {
        $codigo = $_GET['codigo'] ?? '';
        $stmt = $conn->prepare("SELECT id, codigo, nombre_generico, nombre_comercial, forma_farmaceutica, gramaje, contenido, via_administracion, presentacion 
                                FROM medicamentos 
                                WHERE codigo = ?");
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        
        if ($res) {
            echo json_encode(["status" => "success", "data" => $res]);
        } else {
            echo json_encode(["status" => "not_found"]);
        }
        exit;
    }
}

if ($metodo === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $accion = $input['accion'] ?? '';
    
    // 4. Registrar nuevo medicamento
    if ($accion === 'CREATE') {
        $codigo = trim($input['codigo']);
        
        $check = $conn->prepare("SELECT id FROM medicamentos WHERE codigo = ?");
        $check->bind_param("s", $codigo);
        $check->execute();
        $check->store_result();
        $num_filas = $check->num_rows;
        $check->close();
        
        if ($num_filas > 0) {
            echo json_encode(["status" => "error", "message" => "El medicamento ya se encuentra registrado"]);
            exit;
        }
        
        $stmt = $conn->prepare("INSERT INTO medicamentos (codigo, nombre_generico, nombre_comercial, forma_farmaceutica, gramaje, contenido, via_administracion, presentacion) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssssssss",
            $codigo,
            $input['nombre_generico'],
            $input['nombre_comercial'],
            $input['forma_farmaceutica'],
            $input['gramaje'],
            $input['contenido'],
            $input['via_administracion'],
            $input['presentacion']
        );
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Medicamento registrado correctamente"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al registrar el medicamento"]);
        }
        $stmt->close();
        
    // 5. Actualizar medicamento existente (máximo 3 ediciones)
    } elseif ($accion === 'UPDATE') {
        $id = (int)$input['id'];
        $codigo = trim($input['codigo']);
        
        $checkC = $conn->prepare("SELECT id FROM medicamentos WHERE codigo = ? AND id != ?");
        $checkC->bind_param("si", $codigo, $id);
        $checkC->execute();
        $checkC->store_result();
        if ($checkC->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "El código ya pertenece a otro medicamento"]);
            $checkC->close();
            exit;
        }
        $checkC->close();
        
        $checkE = $conn->prepare("SELECT ediciones FROM medicamentos WHERE id = ?");
        $checkE->bind_param("i", $id);
        $checkE->execute();
        $resCheck = $checkE->get_result()->fetch_assoc();
        $checkE->close();
        
        if ($resCheck && $resCheck['ediciones'] >= 3) {
            echo json_encode(["status" => "error", "message" => "Límite alcanzado: Este registro ya ha sido modificado 3 veces."]);
            exit;
        }
        
        $stmt = $conn->prepare("UPDATE medicamentos 
                                SET codigo=?, nombre_generico=?, nombre_comercial=?, forma_farmaceutica=?, gramaje=?, contenido=?, via_administracion=?, presentacion=?, ediciones = ediciones + 1 
                                WHERE id=?");
        $stmt->bind_param(
            "ssssssssi",
            $codigo,
            $input['nombre_generico'],
            $input['nombre_comercial'],
            $input['forma_farmaceutica'],
            $input['gramaje'],
            $input['contenido'],
            $input['via_administracion'],
            $input['presentacion'],
            $id
        );
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Registro actualizado con éxito."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al actualizar el registro"]);
        }
        $stmt->close();
        
    // 6. Eliminar medicamento
    } elseif ($accion === 'DELETE') {
        $id = (int)$input['id'];
        $stmt = $conn->prepare("DELETE FROM medicamentos WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Registro eliminado."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al eliminar el registro"]);
        }
        $stmt->close();
    }
}

$conn->close();
?>
