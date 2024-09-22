document.getElementById('formulario').onsubmit = function(event) {
  event.preventDefault(); 

  const formData = new FormData(this);
  const contraseña = formData.get('Contraseña');
  const repetirContraseña = formData.get('repetir_Contraseña');

  if (contraseña !== repetirContraseña) {
      mostrarModal('modalError', 'Las contraseñas no coinciden.');
      return;
  }

  fetch('../Backend/registrar.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      const modalId = data.success ? 'modalExito' : 'modalError';
      mostrarModal(modalId, data.message);
  })
  .catch(() => {
      mostrarModal('modalError', 'Hubo un error al procesar la solicitud.');
  });
};

function mostrarModal(id, message) {
  const modal = document.getElementById(id);
  modal.classList.remove('hidden');
  modal.querySelector('p').textContent = message;
}

function cerrarModal(id) {
  document.getElementById(id).classList.add('hidden');
}