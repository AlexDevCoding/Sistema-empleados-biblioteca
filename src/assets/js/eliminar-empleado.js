let empleadoIdAEliminar = null;

function eliminarEmpleado(id) {
    empleadoIdAEliminar = id;
    console.log('ID a eliminar:', id); // Para depuración
    const modal = document.getElementById('popup-modal');
    modal.classList.remove('hidden');
}

// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Botón confirmar eliminación
    const btnConfirmar = document.getElementById('btnConfirmarEliminar');
    btnConfirmar.addEventListener('click', function() {
        console.log('Intentando eliminar ID:', empleadoIdAEliminar); // Para depuración
        
        if (empleadoIdAEliminar) {
            fetch('../../Backend/tablas/actions/eliminar-empleado.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + empleadoIdAEliminar
            })
            .then(response => {
                console.log('Respuesta recibida'); // Para depuración
                return response.json();
            })
            .then(data => {
                console.log('Datos:', data); // Para depuración
                if (data.success) {
                    document.getElementById('popup-modal').classList.add('hidden');
                    window.location.reload();
                } else {
                    alert('Error al eliminar: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al procesar la solicitud');
            });
        }
    });

    // Botones para cerrar el modal
    const btnCancelar = document.getElementById('btnCancelarEliminar');
    btnCancelar.addEventListener('click', function() {
        document.getElementById('popup-modal').classList.add('hidden');
        empleadoIdAEliminar = null;
    });
});