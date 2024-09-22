document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('../Backend/login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'error') {
      showModal('Inconveniente', data.message);
    } else {
      window.location.href = 'index.html';
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showModal('Error', 'Ocurrió un error en la solicitud, por favor intenta nuevamente.');
  });
});

function showModal(title, message) {
  const modal = document.getElementById('modal');
  const modalTitle = document.getElementById('modalTitle');
  const modalMessage = document.getElementById('modalMessage');

  if (modal && modalTitle && modalMessage) { 
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    modal.classList.remove('hidden');
  }
}

document.getElementById('modalClose').addEventListener('click', function() {
  const modal = document.getElementById('modal');
  if (modal) {
    modal.classList.add('hidden');
  }
});
