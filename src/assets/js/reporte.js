function inicializarSelectores() {
    const selectores = {
        tipo_empleado: document.querySelector('select[name="tipo_empleado"]'),
        tipo_asistencia: document.querySelector('select[name="tipo_asistencia"]'),
        tipo_permiso: document.querySelector('select[name="tipo_permiso"]')
    };

    Object.entries(selectores).forEach(([key, selector]) => {
        selector.addEventListener('change', () => {
            const valorSeleccionado = selector.value;
            if (valorSeleccionado !== 'Seleccionar Período') {
                Object.entries(selectores).forEach(([otherKey, otherSelector]) => {
                    if (otherKey !== key) {
                        otherSelector.value = 'Seleccionar Período';
                        otherSelector.disabled = true;
                    }
                });
            } else {
                Object.values(selectores).forEach(select => {
                    select.disabled = false;
                });
            }
        });
    });
}

async function generarPDF() {
    try {
        const tipoEmpleado = document.querySelector('select[name="tipo_empleado"]').value;
        const tipoAsistencia = document.querySelector('select[name="tipo_asistencia"]').value;
        const tipoPermiso = document.querySelector('select[name="tipo_permiso"]').value;

        let tipoReporte = '';
        let periodo = '';

        if (tipoEmpleado !== 'Seleccionar Período') {
            tipoReporte = 'empleados';
            periodo = tipoEmpleado;
        } else if (tipoAsistencia !== 'Seleccionar Período') {
            tipoReporte = 'asistencias';
            periodo = tipoAsistencia;
        } else if (tipoPermiso !== 'Seleccionar Período') {
            tipoReporte = 'permisos';
            periodo = tipoPermiso;
        } else {
            alert("Por favor seleccione un tipo de reporte y período");
            return;
        }

        const response = await fetch(`../../Backend/reports/obtener-reportes.php?tipo_reporte=${tipoReporte}&periodo=${periodo}`);
        const data = await response.json();

        if (data.error) {
            alert(data.error);
            return;
        }

        if (data.mensaje) {
            alert(data.mensaje);
            return;
        }

        if (!Array.isArray(data)) {
            console.error('Los datos recibidos no son un array:', data);
            alert("Error en el formato de datos recibidos");
            return;
        }

        const { jsPDF } = window.jspdf;
        if (!jsPDF) {
            console.error('jsPDF no está definido');
            alert("Error: librería PDF no cargada correctamente");
            return;
        }

        const doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'a4'
        });

        doc.setFillColor(0, 51, 153);
        doc.rect(0, 0, 297, 25, 'F');
        doc.setFont('helvetica', 'bold');
        doc.setFontSize(20);
        doc.setTextColor(255, 255, 255);
        doc.text(`Reporte de ${tipoReporte.toUpperCase()}`, 15, 15);

        doc.setFont('helvetica', 'normal');
        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        doc.text(`Período: ${periodo}`, 15, 35);
        doc.text(`Fecha de generación: ${new Date().toLocaleDateString()}`, 15, 42);

        if (data.length > 0) {
            let y = 55;
            switch(tipoReporte) {
                case 'empleados':
                    generarTablaEmpleados(doc, data, y);
                    break;
                case 'asistencias':
                    generarTablaAsistencias(doc, data, y);
                    break;
                case 'permisos':
                    generarTablaPermisos(doc, data, y);
                    break;
                default:
                    console.error('Tipo de reporte no reconocido:', tipoReporte);
                    alert("Tipo de reporte no válido");
                    return;
            }
        }

        const nombreArchivo = `Reporte_${tipoReporte}_${periodo}_${new Date().toISOString().split('T')[0]}.pdf`;
        doc.save(nombreArchivo);

    } catch (error) {
        console.error('Error detallado:', error);
        alert("Error al generar el reporte: " + error.message);
    }
}

function generarTablaEmpleados(doc, data, startY) {
    const headers = ['Nombre', 'Cédula', 'Puesto', 'Departamento', 'Ingreso', 'Estado'];
    const columnWidths = [60, 35, 50, 50, 40, 42];
    generarTablaGenerica(doc, data, headers, columnWidths, startY);
}

function generarTablaAsistencias(doc, data, startY) {
    const headers = ['Empleado', 'Fecha', 'Entrada', 'Salida', 'Estado'];
    const columnWidths = [70, 45, 45, 45, 42];
    generarTablaGenerica(doc, data, headers, columnWidths, startY);
}

function generarTablaPermisos(doc, data, startY) {
    const headers = ['Empleado', 'Tipo', 'Inicio', 'Fin', 'Estado'];
    const columnWidths = [70, 50, 45, 45, 37];
    generarTablaGenerica(doc, data, headers, columnWidths, startY);
}

function generarTablaGenerica(doc, data, headers, columnWidths, startY) {
    let y = startY;
    let currentX = 15;

    doc.setFillColor(240, 240, 240);
    doc.rect(10, y - 7, 277, 10, 'F');
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(60, 60, 60);
    doc.setFontSize(10);

    headers.forEach((header, index) => {
        doc.text(header.toUpperCase(), currentX, y);
        currentX += columnWidths[index];
    });

    doc.setFont('helvetica', 'normal');
    doc.setTextColor(0, 0, 0);
    y += 10;

    data.forEach((row, rowIndex) => {
        if (y > 180) {
            doc.addPage();
            y = 30;
        }

        if (rowIndex % 2 === 0) {
            doc.setFillColor(249, 249, 249);
            doc.rect(10, y - 7, 277, 10, 'F');
        }

        currentX = 15;
        Object.values(row).forEach((value, index) => {
            let texto = String(value);
            if (texto.length > 25) {
                texto = texto.substring(0, 22) + '...';
            }
            doc.text(texto, currentX, y);
            currentX += columnWidths[index];
        });
        y += 10;
    });
}

document.addEventListener('DOMContentLoaded', inicializarSelectores);