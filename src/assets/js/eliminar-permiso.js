// Evento para abrir el modal de confirmación de eliminación
function eliminarPermiso(id) {
    const modal = document.getElementById('popup-modal');
    const btnConfirmar = document.getElementById('btnConfirmarEliminar');
    const btnCancelar = document.getElementById('btnCancelarEliminar');

    modal.classList.remove('hidden');

    btnConfirmar.onclick = async function () {
        try {
            const response = await fetch('../../Backend/tablas/actions/eliminar-permiso.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    id: id
                })
            });

            const responseText = await response.text();
            const result = JSON.parse(responseText);

            if (result.success) {
                location.reload();
            }
        } catch (error) {
            console.error("Error al procesar la solicitud:", error);
        } finally {
            modal.classList.add('hidden');
        }
    };

    btnCancelar.onclick = function () {
        modal.classList.add('hidden');
    };
}

document.querySelectorAll('[data-modal-hide]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const modal = document.getElementById('popup-modal');
        modal.classList.add('hidden');
    });
});