<?php
header('Content-Type: application/json');
$host = 'localhost';
$db   = 'farmacia_db';
$user = 'root'; // Cambia según tu configuración
$pass = '';     // Cambia según tu configuración

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $e->getMessage()]);
    exit;
}

$action = $_GET['action'] ?? '';

// 1. LEER PRODUCTOS
if ($action === 'read') {
    $stmt = $pdo->query("SELECT * FROM productos ORDER BY id DESC");
    echo json_encode($stmt->fetchAll());
    exit;
}

// Recibir datos POST/JSON
$data = json_decode(file_get_contents('php://input'), true);

if (!$data && !empty($_POST)) {
    $data = $_POST;
}

// 2. CREAR Y EDITAR PRODUCTO
if ($action === 'save') {
    try {
        if (!empty($data['id'])) {
            // Editar
            $sql = "UPDATE productos SET codigo=?, nombre_generico=?, nombre_comercial=?, forma_farmaceutica=?, gramaje=?, contenido=?, via_administracion=?, presentacion=?, caducidad=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $data['codigo'], $data['nombre_generico'], $data['nombre_comercial'],
                $data['forma_farmaceutica'], $data['gramaje'], $data['contenido'],
                $data['via_administracion'], $data['presentacion'], $data['caducidad'], $data['id']
            ]);
            echo json_encode(['status' => 'success', 'message' => 'Producto actualizado con éxito']);
        } else {
            // Registrar nuevo
            $sql = "INSERT INTO productos (codigo, nombre_generico, nombre_comercial, forma_farmaceutica, gramaje, contenido, via_administracion, presentacion, caducidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $data['codigo'], $data['nombre_generico'], $data['nombre_comercial'],
                $data['forma_farmaceutica'], $data['gramaje'], $data['contenido'],
                $data['via_administracion'], $data['presentacion'], $data['caducidad']
            ]);
            echo json_encode(['status' => 'success', 'message' => 'Producto registrado con éxito']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al guardar: ' . $e->getMessage()]);
    }
    exit;
}

// 3. ELIMINAR PRODUCTO
if ($action === 'delete') {
    try {
        $stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$data['id']]);
        echo json_encode(['status' => 'success', 'message' => 'Producto eliminado con éxito']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar: ' . $e->getMessage()]);
    }
    exit;
}
