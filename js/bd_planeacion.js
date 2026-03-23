$(document).ready(function() {
    $('#searchplaneacion_rutas').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_rutas.php',
                type: 'POST',
                data: $('#searchplaneacion_rutas').serialize(),
                success: function(response) {
                    $('#resultados_rutas').html(response);
                    new DataTable('#bd_planeacion_rutas', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION RUTAS',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_expedientes').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_expedientes.php',
                type: 'POST',
                data: $('#searchplaneacion_expedientes').serialize(),
                success: function(response) {
                    $('#resultados_expedientes').html(response);
                    new DataTable('#bd_planeacion_expedientes', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION EXPEDIENTES',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_traslados').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_traslados.php',
                type: 'POST',
                data: $('#searchplaneacion_traslados').serialize(),
                success: function(response) {
                    $('#resultados_traslados').html(response);
                    new DataTable('#bd_planeacion_traslados', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION TRASLADOS',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_evaluacion').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_evaluaciones.php',
                type: 'POST',
                data: $('#searchplaneacion_evaluacion').serialize(),
                success: function(response) {
                    $('#resultados_evaluaciones').html(response);
                    new DataTable('#bd_planeacion_evaluaciones', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION EVALUACIONES',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_gestiones').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_gestiones.php',
                type: 'POST',
                data: $('#searchplaneacion_gestiones').serialize(),
                success: function(response) {
                    $('#resultados_gestiones').html(response);
                    new DataTable('#bd_planeacion_gestiones', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION GESTIONES',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_convenios').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_convenios.php',
                type: 'POST',
                data: $('#searchplaneacion_convenios').serialize(),
                success: function(response) {
                    $('#resultados_convenios').html(response);
                    new DataTable('#bd_planeacion_convenios', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION CONVENIOS',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_informe_asistencias').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_informe_asistencias.php',
                type: 'POST',
                data: $('#searchplaneacion_informe_asistencias').serialize(),
                success: function(response) {
                    $('#resultados_informe_asistencias').html(response);
                    new DataTable('#bd_planeacion_informe_asistencias', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION INFORME ASISTENCIAS',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#searchplaneacion_informe_resguardo').on('submit', function(e) {
        e.preventDefault(); // Evitar recarga
        // 1. Mostrar Spinner
        $('#loader_carga').show();
        // 2. Esperar 5 segundos
        setTimeout(function() {
            // 3. Ejecutar consulta Ajax
            $.ajax({
                url: 'buscar_informe_resguardo.php',
                type: 'POST',
                data: $('#searchplaneacion_informe_resguardo').serialize(),
                success: function(response) {
                    $('#resultados_informe_resguardo').html(response);
                    new DataTable('#bd_planeacion_informe_resguardo', {
                      layout: {
                          bottomEnd: {
                            paging: {
                              firstLast: false
                            }
                          }
                      },
                      language: {
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sSearch: "Buscar:",
                        oPaginate: {
                          sFirst: "Primero",
                          sLast: "Último",
                          sNext: "Siguiente",
                          sPrevious: "Anterior"
                        },
                        sProcessing: "Procesando...",
                      },
                      // para usar los botones
                      responsive: true,
                      dom: 'Brtip',
                      buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn color-btn-export-xls',
                        title: 'BD PLANEACION INFORME RESGUARDO',
                        // Añade esto para asegurar que tome todas las filas
                        exportOptions: {
                          modifier: {
                          page: 'all',    // Exporta todas las páginas, no solo la visible
                          search: 'none'  // Exporta todo, incluso lo que está filtrado
                        }
                      }
                    },]
                    });
                    $('#loader_carga').hide(); // Ocultar spinner
                }
            });
        }, 5000); // 5000 milisegundos
    });
});
////////////////////////////////////////////////////////////////////////////////
