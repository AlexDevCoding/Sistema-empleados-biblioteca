document.getElementById('cedula').addEventListener('input', function() {
    const cedula = this.value.trim();
    const nombreInput = document.getElementById('nombre_completo');
    if (cedula.length > 0) {
        fetch(`../../Backend/tablas/busca-empleado.php?cedula=${cedula}`)
            .then(response => {
               
                if (!response.ok) {
                    throw new Error('no responde la red');
                }
                return response.json();
            })
            .then(data => {
                console.log(data)
                if (data && data.nombre_completo) {
                    nombreInput.value = data.nombre_completo;
                    nombreInput.disabled = true;
                } else {
                    nombreInput.value = '';
                    nombreInput.disabled = false;
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        nombreInput.value = '';
        nombreInput.disabled = false;
    }
});
