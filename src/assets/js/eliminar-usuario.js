let usuarioIdAEliminar = null;

function mostrarModalEliminar(id) {
    usuarioIdAEliminar = id;
    const modal = document.getElementById('popup-modal');
    modal.classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    // Botón para confirmar la eliminación
    const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');
    btnConfirmarEliminar.addEventListener('click', function() {
        if (usuarioIdAEliminar) {
            eliminarUsuario(usuarioIdAEliminar);
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
        usuarioIdAEliminar = null;
    }
}

function eliminarUsuario(id) {
    const formData = new FormData();
    formData.append('id', id);

    fetch('../../Backend/tablas/actions/eliminar-usuario.php', {
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
            alert('Error al eliminar el usuario: ' + data.message);
        }
    })
}
