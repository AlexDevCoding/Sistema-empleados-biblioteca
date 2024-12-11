document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-registro');
    
    if (formulario) {
        formulario.addEventListener('submit', async function(e) {
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
                    modalRegistro._flowbiteModal.hide();
                }
                
                if (data.success) {
                    // Mostrar modal de éxito
                    const modalExito = document.getElementById('añadir-empleado');
                    modalExito.classList.remove('hidden');
                } else if (data.error_type === 'duplicate') {
                    // Mostrar modal de empleado existente
                    const modalExistente = document.getElementById('empleado-existente');
                    modalExistente.classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al procesar la solicitud');
            }
        });
    }

    // Botón para cerrar modal de éxito
    const btnConfirmar = document.getElementById('btnConfirmarEditar');
    if (btnConfirmar) {
        btnConfirmar.addEventListener('click', function() {
            const modalExito = document.getElementById('añadir-empleado');
            modalExito.classList.add('hidden');
            location.reload();
        });
    }

    // Botón para cerrar modal de empleado existente
    const btnCerrarExistente = document.getElementById('btnCerrarExistente');
    if (btnCerrarExistente) {
        btnCerrarExistente.addEventListener('click', function() {
            const modalExistente = document.getElementById('empleado-existente');
            modalExistente.classList.add('hidden');
            // Volver a mostrar el modal de registro
            const modalRegistro = document.getElementById('defaultModal');
            if (modalRegistro) {
                modalRegistro._flowbiteModal.show();
            }
        });
    }

    // Cerrar modales con el botón X
    document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.fixed');
            if (modal) {
                modal.classList.add('hidden');
                if (modal.id === 'empleado-existente') {
                    const modalRegistro = document.getElementById('defaultModal');
                    if (modalRegistro) {
                        modalRegistro._flowbiteModal.show();
                    }
                } else if (modal.id === 'añadir-empleado') {
                    location.reload();
                }
            }
        });
    });
});