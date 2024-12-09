document.getElementById('formulario-registro').addEventListener('submit', async function(e) {
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
            document.getElementById('añadir-usuario').classList.remove('hidden');
        } else {
            // Mostrar modal de usuario existente
            document.getElementById('usuario-existente').classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al procesar la solicitud');
    }
});

// Manejadores para cerrar modales
document.getElementById('btnConfirmarEditar').addEventListener('click', function() {
    document.getElementById('añadir-usuario').classList.add('hidden');
    location.reload();
});

document.getElementById('btnCerrarExistente').addEventListener('click', function() {
    document.getElementById('usuario-existente').classList.add('hidden');
    // Volver a mostrar el modal de registro
    document.getElementById('defaultModal').classList.remove('hidden');
});

// Cerrar modales con el botón X
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        const modal = this.closest('[id^="añadir-usuario"], [id^="usuario-existente"]');
        if (modal) {
            modal.classList.add('hidden');
            if (modal.id === 'usuario-existente') {
                document.getElementById('defaultModal').classList.remove('hidden');
            } else {
                location.reload();
            }
        }
    });
});