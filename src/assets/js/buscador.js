document.getElementById('cedula').addEventListener('input', function() {
    const cedula = this.value.trim(); // Agregado trim() para eliminar espacios en blanco
    if (cedula.length > 0) {
        fetch(`../../Backend/tablas/busca-empleado.php?cedula=${cedula}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('no responde la red');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Para depuración, puedes eliminarlo después
                if (data && data.nombre_completo) { // Verifica si data y nombre_completo existen
                    document.getElementById('nombre_completo').value = data.nombre_completo; // Asegúrate de que el campo coincide con la clave en el JSON
                } else {
                    document.getElementById('nombre_completo').value = '';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('nombre_completo').value = '';
    }
});
