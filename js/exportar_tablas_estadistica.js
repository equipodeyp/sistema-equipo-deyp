function exportarExcelv2() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabla1'));
  XLSX.utils.book_append_sheet(workbook, ws1, "juridicamente");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('tabla2'));
  XLSX.utils.book_append_sheet(workbook, ws2, "incorporacion");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "SOLICITUDES.xlsx");
}

function exportarpersonas() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('calidadp'));
  XLSX.utils.book_append_sheet(workbook, ws1, "calidad");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('estatusp'));
  XLSX.utils.book_append_sheet(workbook, ws2, "estatus");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('protegidosactivosp'));
  XLSX.utils.book_append_sheet(workbook, ws3, "protegidos activos");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('protegidoseedadp'));
  XLSX.utils.book_append_sheet(workbook, ws4, "edad");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('protegidossexop'));
  XLSX.utils.book_append_sheet(workbook, ws5, "sexo");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "PERSONAS.xlsx");
}
// MEDIDAS
function exportarmedidas() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('medidasapoyo'));
  XLSX.utils.book_append_sheet(workbook, ws1, "medidas otorgadas");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('medidasejecutadas'));
  XLSX.utils.book_append_sheet(workbook, ws2, "medidas ejecutadas");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('ejecutadasmunicipio'));
  XLSX.utils.book_append_sheet(workbook, ws3, "medidas por municipio");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('medidasasistencia'));
  XLSX.utils.book_append_sheet(workbook, ws4, "medidas de asistencia");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('medidasresguardo'));
  XLSX.utils.book_append_sheet(workbook, ws5, "medidas de resguardo");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "medidas.xlsx");
}
// EXPEDIENTES
function exportarexpedientes() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('estatusexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws1, "estatus");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('sedeexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws2, "sede");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('delitoprincipalexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws3, "delito principal");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('radicacionexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws4, "municipio");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('autoridadsolicitante'));
  XLSX.utils.book_append_sheet(workbook, ws5, "autoridad");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws6 = XLSX.utils.table_to_sheet(document.getElementById('procedemientorecurso'));
  XLSX.utils.book_append_sheet(workbook, ws6, "etapa procedimiento");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "expedientes.xlsx");
}
// resumenprograma
function exportarresumen() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('resumenexpedientes'));
  XLSX.utils.book_append_sheet(workbook, ws1, "expedientes");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('resumenprograma'));
  XLSX.utils.book_append_sheet(workbook, ws2, "resumen");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "resumen.xlsx");
}
// resumen DIARIO
function exportarresumendiario() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('rdexpedientes'));
  XLSX.utils.book_append_sheet(workbook, ws1, "expedientes");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('resumendiario'));
  XLSX.utils.book_append_sheet(workbook, ws2, "resumen");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('rdestatusexpedientes'));
  XLSX.utils.book_append_sheet(workbook, ws3, "estatus expedintes");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('rdestatuspersonas'));
  XLSX.utils.book_append_sheet(workbook, ws4, "estatus personas");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('rdestatusmedidas'));
  XLSX.utils.book_append_sheet(workbook, ws5, "estatus medidas");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "resumen_diario.xlsx");
}
//
function exportarexpedientestotales() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('expedientestotales'));
  XLSX.utils.book_append_sheet(workbook, ws1, "expedientes");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "expedientestotales.xlsx");
}

//
function exportaralojamientotemporal() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('alojamientotemporal'));
  XLSX.utils.book_append_sheet(workbook, ws1, "expedientes");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "alojamientotemporal.xlsx");
}
