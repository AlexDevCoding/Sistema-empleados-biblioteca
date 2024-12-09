document.querySelector("#formulario-registro").addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (response.ok && data.success) {
            // Ocultar el modal de registro
            const modalRegistro = document.querySelector("#defaultModal");
            if (modalRegistro) {
                modalRegistro.classList.add('hidden');
            }
            
            // Mostrar el modal de confirmación
            const modalConfirmacion = document.querySelector("#añadir-asistencia");
            if (modalConfirmacion) {
                modalConfirmacion.classList.remove('hidden');
            }
        } else {
            throw new Error(data.message || 'Error al registrar la asistencia');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al registrar la asistencia: ' + error.message);
    }
});

// Manejador para el botón de confirmación
document.querySelector("#btnConfirmarEditar").addEventListener('click', function() {
    document.querySelector("#añadir-asistencia").classList.add('hidden');
    location.reload();
});

// Manejadores para cerrar el modal de confirmación
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', () => {
        const modalConfirmacion = document.querySelector("#añadir-asistencia");
        if (modalConfirmacion) {
            modalConfirmacion.classList.add('hidden');
            location.reload();
        }
    });
});