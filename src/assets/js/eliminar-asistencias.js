let asistenciaIdAEliminar = null;

function mostrarModalEliminar(id) {
    asistenciaIdAEliminar = id;
    const modal = document.getElementById('popup-modal');
    modal.classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    // Botón para confirmar la eliminación
    const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');
    btnConfirmarEliminar.addEventListener('click', function() {
        if (asistenciaIdAEliminar) {
            eliminarAsistencia(asistenciaIdAEliminar);
        }
    });

    // Botón para cancelar la eliminación
    const btnCancelarEliminar = document.getElementById('btnCancelarEliminar');
    btnCancelarEliminar.addEventListener('click', function() {
        cerrarModal();
    });

    // Cerrar modal con el botón X
    const botonesCloseModal = document.querySelectorAll('[data-modal-hide="popup-modal"]');
    botonesCloseModal.forEach(boton => {
        boton.addEventListener('click', cerrarModal);
    });
});

function cerrarModal() {
    const modal = document.getElementById('popup-modal');
    if (modal) {
        modal.classList.add('hidden');
        asistenciaIdAEliminar = null;
    }
}

function eliminarAsistencia(id) {
    const formData = new FormData();
    formData.append('id', id);

    fetch('../../Backend/tablas/actions/eliminar-asistencias.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            cerrarModal();
            // Recargar la tabla para mostrar los cambios
            location.reload();
        } else {
            alert('Error al eliminar la asistencia: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la solicitud');
    });
}
