function exportarExcelv2() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabla1'));
  XLSX.utils.book_append_sheet(workbook, ws1, "Flota Sana");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('tabla2'));
  XLSX.utils.book_append_sheet(workbook, ws2, "Tipo de Contrato");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "FlotaSana.xlsx");
}

function exportarpersonas() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('calidadp'));
  XLSX.utils.book_append_sheet(workbook, ws1, "Flota Sana");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('estatusp'));
  XLSX.utils.book_append_sheet(workbook, ws2, "Tipo");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('protegidosactivosp'));
  XLSX.utils.book_append_sheet(workbook, ws3, "de");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('protegidoseedadp'));
  XLSX.utils.book_append_sheet(workbook, ws4, "Contrato");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('protegidossexop'));
  XLSX.utils.book_append_sheet(workbook, ws5, "trato");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "PERSONAS.xlsx");
}
// MEDIDAS
function exportarmedidas() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('medidasapoyo'));
  XLSX.utils.book_append_sheet(workbook, ws1, "Flota Sana");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('medidasejecutadas'));
  XLSX.utils.book_append_sheet(workbook, ws2, "Tipo");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('ejecutadasmunicipio'));
  XLSX.utils.book_append_sheet(workbook, ws3, "de");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('medidasasistencia'));
  XLSX.utils.book_append_sheet(workbook, ws4, "Contrato");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('medidasresguardo'));
  XLSX.utils.book_append_sheet(workbook, ws5, "trato");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "medidas.xlsx");
}
// EXPEDIENTES
function exportarexpedientes() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('estatusexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws1, "Flota Sana");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('sedeexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws2, "Tipo");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws3 = XLSX.utils.table_to_sheet(document.getElementById('delitoprincipalexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws3, "de");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws4 = XLSX.utils.table_to_sheet(document.getElementById('radicacionexpediente'));
  XLSX.utils.book_append_sheet(workbook, ws4, "Contrato");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws5 = XLSX.utils.table_to_sheet(document.getElementById('autoridadsolicitante'));
  XLSX.utils.book_append_sheet(workbook, ws5, "trato");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws6 = XLSX.utils.table_to_sheet(document.getElementById('procedemientorecurso'));
  XLSX.utils.book_append_sheet(workbook, ws6, "proceso");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "expedientes.xlsx");
}
// resumenprograma
function exportarresumen() {
  /* creamos el nuevo workbook */
  var workbook = XLSX.utils.book_new();
  /* convertimos tabla 'tablaOriginal' a un  worksheet llamado "Flota Sana" */
  var ws1 = XLSX.utils.table_to_sheet(document.getElementById('resumenexpedientes'));
  XLSX.utils.book_append_sheet(workbook, ws1, "Flota Sana");
  /* convertimos tabla 'tablaFlSaC' a un  worksheet llamado "Tipo de Contrato" */
  var ws2 = XLSX.utils.table_to_sheet(document.getElementById('resumenprograma'));
  XLSX.utils.book_append_sheet(workbook, ws2, "Tipo de Contrato");
  /* exportamos en el libro con los worksheets */
  XLSX.writeFile(workbook, "resumen.xlsx");
}
