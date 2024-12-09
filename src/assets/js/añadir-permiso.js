document.getElementById('defaultModal').querySelector('form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        // Cerrar el modal de registro
        const modalRegistro = document.getElementById('defaultModal');
        if (modalRegistro) {
            modalRegistro.classList.add('hidden');
        }
        
        if (data.success) {
            // Mostrar modal de éxito
            document.getElementById('añadir-permiso').classList.remove('hidden');
        } else {
            // Mostrar mensaje de error
            alert(data.message || 'Error al registrar el permiso');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al procesar la solicitud');
    }
});

// Manejador para cerrar el modal de éxito
document.getElementById('btnConfirmarEditar').addEventListener('click', function() {
    document.getElementById('añadir-permiso').classList.add('hidden');
    location.reload(); // Recargar la página para mostrar el nuevo permiso
});

// Cerrar modales con el botón X
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        const modal = this.closest('#añadir-permiso');
        if (modal) {
            modal.classList.add('hidden');
            location.reload();
        }
    });
});