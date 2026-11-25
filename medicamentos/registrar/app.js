document.addEventListener('DOMContentLoaded', () => {
        const modalForm = document.getElementById('crud-modal');
        const modalSearch = document.getElementById('search-modal');
        const form = document.getElementById('crud-form');
        const tabla = document.getElementById('tabla-registros');
        
        const btnOpenModal = document.getElementById('btn-open-modal');
        const btnOpenSearch = document.getElementById('btn-open-search');
        const btnCloseX = document.getElementById('btn-close-x');
        const btnCloseSearchX = document.getElementById('btn-close-search-x');
        const btnCancel = document.getElementById('btn-cancel');
        const btnSubmit = document.getElementById('btn-submit');
        const formTitle = document.getElementById('form-title');
        const idInput = document.getElementById('registro-id');

        const btnExecuteSearch = document.getElementById('btn-execute-search');
        const searchCodigoInput = document.getElementById('search-codigo-input');
        const searchDetailResult = document.getElementById('search-detail-result');
        const searchErrorMessage = document.getElementById('search-error-message');

        // Inicializar tabla
        cargarRegistros();

        // --- MODAL CREAR / EDITAR ---
        btnOpenModal.addEventListener('click', () => {
            form.reset();
            idInput.value = '';
            formTitle.innerText = "Registrar Medicamento";
            btnSubmit.innerText = "Registrar";
            modalForm.classList.remove('hidden');
        });

        const cerrarFormModal = () => {
            modalForm.classList.add('hidden');
            form.reset();
        };
        btnCloseX.addEventListener('click', cerrarFormModal);
        btnCancel.addEventListener('click', cerrarFormModal);

        // --- MODAL BÚSQUEDA ---
        btnOpenSearch.addEventListener('click', () => {
            searchCodigoInput.value = '';
            searchDetailResult.classList.add('hidden');
            searchErrorMessage.classList.add('hidden');
            modalSearch.classList.remove('hidden');
        });

        const cerrarSearchModal = () => {
            modalSearch.classList.add('hidden');
        };
        btnCloseSearchX.addEventListener('click', cerrarSearchModal);

        // --- ENVIAR FORMULARIO (CREATE / UPDATE) ---
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                alert('Por favor, rellene correctamente todos los campos.');
                return;
            }
            const data = {
                id: idInput.value || null,
                codigo: document.getElementById('codigo').value.trim(),
                nombre_generico: document.getElementById('nombre_generico').value.trim(),
                nombre_comercial: document.getElementById('nombre_comercial').value.trim(),
                forma_farmaceutica: document.getElementById('forma_farmaceutica').value,
                gramaje: document.getElementById('gramaje').value.trim(),
                contenido: document.getElementById('contenido').value.trim(),
                via_administracion: document.getElementById('via_administracion').value,
                presentacion: document.getElementById('presentacion').value
            };
            const accion = data.id ? 'UPDATE' : 'CREATE';
            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ accion, ...data })
                });
                const res = await response.json();
                if (res.status === 'success') {
                    cerrarFormModal();
                    cargarRegistros();
                    alert(res.message);
                } else {
                    alert(res.message);
                }
            } catch (error) {
                alert('Error de conexión.');
            }
        });

        // --- CARGAR ÚLTIMOS 5 REGISTROS ---
        async function cargarRegistros() {
            try {
                const response = await fetch('api.php?accion=READ');
                const data = await response.json();
                tabla.innerHTML = '';
                data.forEach(reg => {
                    const tr = document.createElement('tr');
                    const disabledEdit = reg.ediciones >= 3 ? 'disabled' : '';
                    const badgeClass = reg.ediciones >= 3 ? 'badge-danger' : (reg.ediciones > 0 ? 'badge-warning' : '');
                    tr.innerHTML = `
                        <td><strong>${reg.codigo}</strong></td>
                        <td><div>${reg.nombre_comercial}</div><small style="color:var(--text-muted)">${reg.nombre_generico} (${reg.gramaje})</small></td>
                        <td>${reg.forma_farmaceutica} / ${reg.via_administracion}</td>
                        <td><span class="badge ${badgeClass}">${reg.ediciones}/3</span></td>
                        <td>
                            <button class="btn btn-edit" ${disabledEdit} onclick="prepararEdicion(${JSON.stringify(reg).replace(/"/g, '&quot;')})">Editar</button>
                            <button class="btn btn-danger" onclick="eliminarRegistro(${reg.id})">Eliminar</button>
                        </td>
                    `;
                    tabla.appendChild(tr);
                });
            } catch (error) {
                console.error(error);
            }
        }

        // --- EJECUTAR BÚSQUEDA POR CÓDIGO ---
        btnExecuteSearch.addEventListener('click', async () => {
            const codigoBuscado = searchCodigoInput.value.trim();
            if (!codigoBuscado) {
                alert('Digite un código.');
                return;
            }
            try {
                const response = await fetch(`api.php?accion=SEARCH&codigo=${encodeURIComponent(codigoBuscado)}`);
                const res = await response.json();
                if (res.status === 'success') {
                    searchErrorMessage.classList.add('hidden');
                    document.getElementById('det-codigo').innerText = res.data.codigo;
                    document.getElementById('det-generico').innerText = res.data.nombre_generico;
                    document.getElementById('det-comercial').innerText = res.data.nombre_comercial;
                    document.getElementById('det-forma').innerText = res.data.forma_farmaceutica;
                    document.getElementById('det-gramaje').innerText = res.data.gramaje;
                    document.getElementById('det-contenido').innerText = res.data.contenido;
                    document.getElementById('det-via').innerText = res.data.via_administracion;
                    document.getElementById('det-presentacion').innerText = res.data.presentacion;
                    searchDetailResult.classList.remove('hidden');
                } else {
                    searchDetailResult.classList.add('hidden');
                    searchErrorMessage.classList.remove('hidden');
                }
            } catch (error) {
                alert('Error al consultar.');
            }
        });

        window.prepararEdicion = (reg) => {
            formTitle.innerText = "Editar Registro";
            btnSubmit.innerText = "Guardar Cambios";
            idInput.value = reg.id;
            document.getElementById('codigo').value = reg.codigo;
            document.getElementById('nombre_generico').value = reg.nombre_generico;
            document.getElementById('nombre_comercial').value = reg.nombre_comercial;
            document.getElementById('forma_farmaceutica').value = reg.forma_farmaceutica;
            document.getElementById('gramaje').value = reg.gramaje;
            document.getElementById('contenido').value = reg.contenido;
            document.getElementById('via_administracion').value = reg.via_administracion;
            document.getElementById('presentacion').value = reg.presentacion;
            modalForm.classList.remove('hidden');
        };

        window.eliminarRegistro = async (id) => {
            if (!confirm('¿Seguro que desea eliminar este registro?')) return;
            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ accion: 'DELETE', id })
                });
                const res = await response.json();
                if (res.status === 'success') cargarRegistros();
            } catch (error) {
                alert('Error.');
            }
        };

            // =========================================================================
        // MÓDULO DE CATÁLOGO GENERAL EN PDF
        // =========================================================================
        const modalPdf = document.getElementById('pdf-modal');
        const btnOpenPdf = document.getElementById('btn-open-pdf');
        const btnClosePdfX = document.getElementById('btn-close-pdf-x');
        const btnDownloadPdf = document.getElementById('btn-download-pdf');
        const btnDownloadPdfMobile = document.getElementById('btn-download-pdf-mobile');
        const pdfTotalBadge = document.getElementById('pdf-total-badge');
        const pdfLoading = document.getElementById('pdf-loading');
        const pdfPreviewFrame = document.getElementById('pdf-preview-frame');
        const pdfMobileFallback = document.getElementById('pdf-mobile-fallback');
        const pdfMobileList = document.getElementById('pdf-mobile-list');

        let documentoPdfActual = null;
        let pdfBlobUrlActual = null;

        const cerrarPdfModal = () => {
            modalPdf.classList.add('hidden');
            if (pdfBlobUrlActual) {
                URL.revokeObjectURL(pdfBlobUrlActual);
                pdfBlobUrlActual = null;
            }
            pdfPreviewFrame.src = '';
        };

        btnClosePdfX.addEventListener('click', cerrarPdfModal);

        // Cerrar modales al hacer clic fuera de la tarjeta
        window.addEventListener('click', (e) => {
            if (e.target === modalForm) cerrarFormModal();
            if (e.target === modalSearch) cerrarSearchModal();
            if (e.target === modalPdf) cerrarPdfModal();
        });

        // Helper para cargar imágenes y preservar sus dimensiones reales en el PDF
        function cargarImagenBase64(url) {
            return new Promise((resolve) => {
                const img = new Image();
                img.crossOrigin = 'Anonymous';
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.naturalWidth;
                    canvas.height = img.naturalHeight;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);
                    resolve({
                        dataUrl: canvas.toDataURL('image/png'),
                        width: img.naturalWidth,
                        height: img.naturalHeight
                    });
                };
                img.onerror = () => resolve(null);
                img.src = url;
            });
        }

        // Construir documento PDF empresarial
        async function generarDocumentoPdf(medicamentos) {
            if (!window.jspdf || !window.jspdf.jsPDF) {
                throw new Error('La librería jsPDF no se cargó correctamente.');
            }

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: 'letter'
            });

            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();
            const marginX = 14;

            // Cargar logos institucionales en paralelo
            const [logoUps, logoFiscalia] = await Promise.all([
                cargarImagenBase64('../../image/ups2.png'),
                cargarImagenBase64('../../image/fiscalia.png')
            ]);

            const fechaEmision = new Date().toLocaleDateString('es-MX', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Encabezado institucional dibujado en cada página
            const dibujarEncabezado = () => {
                doc.setFillColor('#fbfcf9');
                doc.rect(0, 0, pageWidth, 4, 'F');

                // Logo izquierdo (ups2.png) manteniendo proporción
                if (logoUps) {
                    const maxH = 18;
                    const ratio = logoUps.width / logoUps.height;
                    const drawW = Math.min(maxH * ratio, 60);
                    const drawH = drawW / ratio;
                    doc.addImage(logoUps.dataUrl, 'PNG', marginX, 8, drawW, drawH);
                }

                // Logo derecho (fiscalia.png) manteniendo proporción
                if (logoFiscalia) {
                    const drawH = 14;
                    const ratio = logoFiscalia.width / logoFiscalia.height;
                    const drawW = drawH * ratio;
                    doc.addImage(logoFiscalia.dataUrl, 'PNG', pageWidth - marginX - drawW, 7, drawW, drawH);
                }

                // Títulos centrales
                doc.setFont('helvetica', 'bold');
                doc.setFontSize(13);
                doc.setTextColor('#1e293b');
                doc.text('CATÁLOGO GENERAL DE MEDICAMENTOS', pageWidth / 2, 13, { align: 'center' });

                doc.setFont('helvetica', 'normal');
                doc.setFontSize(9);
                doc.setTextColor('#64748b');
                doc.text(`Sistema de Gestión de Medicamentos  |  Fecha de emisión: ${fechaEmision}`, pageWidth / 2, 19, { align: 'center' });

                // Línea divisoria
                doc.setDrawColor('#cbd5e1');
                doc.setLineWidth(0.4);
                doc.line(marginX, 26, pageWidth - marginX, 26);
            };

            // Preparar filas de la tabla con las columnas de MariaDB
            const columnas = [
                'Código',
                'Nombre Genérico',
                'Nombre Comercial',
                'Forma Farmacéutica',
                'Gramaje',
                'Contenido',
                'Vía de Adm.',
                'Presentación'
            ];

            const filas = medicamentos.map(m => [
                m.codigo || '',
                m.nombre_generico || '',
                m.nombre_comercial || '',
                m.forma_farmaceutica || '',
                m.gramaje || '',
                m.contenido || '',
                m.via_administracion || '',
                m.presentacion || ''
            ]);

            doc.autoTable({
                head: [columnas],
                body: filas,
                startY: 30,
                margin: { top: 30, left: marginX, right: marginX, bottom: 16 },
                theme: 'grid',
                styles: {
                    font: 'helvetica',
                    fontSize: 8.5,
                    cellPadding: 2.8,
                    textColor: '#1e293b',
                    lineColor: '#cbd5e1',
                    lineWidth: 0.25,
                    valign: 'middle'
                },
                headStyles: {
                    fillColor: '#5F6D6B',
                    textColor: '#ffffff',
                    fontStyle: 'bold',
                    halign: 'center'
                },
                alternateRowStyles: {
                    fillColor: '#f8fafc'
                },
                columnStyles: {
                    0: { fontStyle: 'bold', halign: 'center', cellWidth: 24 },
                    4: { halign: 'center', cellWidth: 24 },
                    6: { halign: 'center', cellWidth: 28 },
                    7: { halign: 'center', cellWidth: 28 }
                },

                foot: [[
                    {
                        content: `Total de medicamentos registrados: ${medicamentos.length}`,
                        colSpan: 8,
                        styles: { halign: 'right' }
                    }
                ]],
                showFoot: 'lastPage',
                startY: 30,
                margin: { top: 30, left: marginX, right: marginX, bottom: 16 },
                theme: 'grid',
                styles: {
                    font: 'helvetica',
                    fontSize: 8.5,
                    cellPadding: 2.8,
                    textColor: '#1e293b',
                    lineColor: '#cbd5e1',
                    lineWidth: 0.25,
                    valign: 'middle'
                },
                headStyles: {
                    fillColor: '#5F6D6B',
                    textColor: '#ffffff',
                    fontStyle: 'bold',
                    halign: 'center'
                },
                footStyles: {
                    fillColor: '#e2e8f0',
                    textColor: '#1e293b',
                    fontStyle: 'bold',
                    fontSize: 9
                },







                



                didDrawPage: (data) => {
                    dibujarEncabezado();

                    // Pie de página con numeración
                    const pageNumber = doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.setTextColor('#64748b');
                    doc.text(
                        `Sistema Informático del Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o Extinción de Dominio.`,
                        marginX,
                        pageHeight - 8
                    );

                    doc.text(
                        `Página ${data.pageNumber} de ${pageNumber}`,
                        pageWidth - marginX,
                        pageHeight - 8,
                        { align: 'right' }
                    );
                }
            });

            return doc;
        }

        // Renderizar pantallas móviles
        function renderizarVistaMovil(medicamentos) {
            pdfMobileList.innerHTML = '';
            medicamentos.forEach(m => {
                const item = document.createElement('div');
                item.className = 'pdf-mobile-item';
                item.innerHTML = `
                    <div class="pdf-mobile-item-head">
                        <strong>${m.codigo}</strong>
                        <span>${m.forma_farmaceutica} • ${m.gramaje}</span>
                    </div>
                    <div class="pdf-mobile-item-title">${m.nombre_comercial} <small>(${m.nombre_generico})</small></div>
                    <div class="pdf-mobile-item-meta">Vía: ${m.via_administracion} | ${m.presentacion} (${m.contenido})</div>
                `;
                pdfMobileList.appendChild(item);
            });
        }

        // Abrir PDF
        btnOpenPdf.addEventListener('click', async () => {
            modalPdf.classList.remove('hidden');
            pdfLoading.classList.remove('hidden');
            pdfPreviewFrame.classList.add('hidden');
            pdfMobileFallback.classList.add('hidden');

            try {
                const response = await fetch('api.php?accion=READ_ALL');
                const res = await response.json();

                if (res.status !== 'success') {
                    alert(res.message || 'No se pudo obtener el catálogo de medicamentos.');
                    cerrarPdfModal();
                    return;
                }

                const lista = res.data || [];
                pdfTotalBadge.innerText = `${lista.length} medicamentos registrados${lista.length === 1 ? '' : 's'}`;

                if (lista.length === 0) {
                    pdfLoading.classList.add('hidden');
                    alert('Aún no hay medicamentos registrados para generar el catálogo.');
                    cerrarPdfModal();
                    return;
                }

                documentoPdfActual = await generarDocumentoPdf(lista);

                const blob = documentoPdfActual.output('blob');
                if (pdfBlobUrlActual) URL.revokeObjectURL(pdfBlobUrlActual);
                pdfBlobUrlActual = URL.createObjectURL(blob);

                const esMovil = window.innerWidth <= 768 || /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);

                pdfLoading.classList.add('hidden');

                if (esMovil) {
                    renderizarVistaMovil(lista);
                    pdfMobileFallback.classList.remove('hidden');
                } else {
                    pdfPreviewFrame.src = pdfBlobUrlActual;
                    pdfPreviewFrame.classList.remove('hidden');
                }
    } catch (error) {
    console.error('Error al generar PDF:', error);
    pdfLoading.classList.add('hidden');
    alert('Ocurrió un error al generar el catálogo PDF.');
    cerrarPdfModal();
    }
    });

    // Descargar archivo PDF
    const descargarArchivoPdf = () => {
        if (!documentoPdfActual) return;
        const fechaArchivo = new Date().toISOString().slice(0, 10);
        documentoPdfActual.save(`Catalogo_Medicamentos_${fechaArchivo}.pdf`);
    };

    btnDownloadPdf.addEventListener('click', descargarArchivoPdf);
    btnDownloadPdfMobile.addEventListener('click', descargarArchivoPdf);

    // =========================================================================
    // SIDEBAR / MENÚ LATERAL
    // =========================================================================
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const body = document.body;

    function toggleMenu() {
        if (!sidebar || !overlay) return;
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        body.classList.toggle('sidebar-open');
    }

    if (menuToggle) menuToggle.addEventListener('click', toggleMenu);
    if (overlay) overlay.addEventListener('click', toggleMenu);




    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (sidebar && sidebar.classList.contains('active')) toggleMenu();
            const btnClosePdf = document.getElementById('btn-close-pdf-x');
            if (modalPdf && !modalPdf.classList.contains('hidden') && btnClosePdf) {
                btnClosePdf.click();
            }
        }
    });
});
