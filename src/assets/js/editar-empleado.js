function cargarDatosEmpleado(button) {
    // Obtiene los datos del botón
    const id = button.getAttribute("data-id");
    const nombre = button.getAttribute("data-nombre");
    const cedula = button.getAttribute("data-cedula");
    const puesto = button.getAttribute("data-puesto");
    const departamento = button.getAttribute("data-departamento");
    const fecha = button.getAttribute("data-fecha");
    const estado = button.getAttribute("data-estado");
    const telefono = button.getAttribute("data-telefono");

    // Rellena los campos del modal
    document.querySelector("#updateProductModal input[name='nombre_completo']").value = nombre;
    document.querySelector("#updateProductModal input[name='cedula_identidad']").value = cedula;
    document.querySelector("#updateProductModal input[name='puesto']").value = puesto;
    document.querySelector("#updateProductModal select[name='departamento']").value = departamento;
    document.querySelector("#updateProductModal input[name='fecha_ingreso']").value = fecha;
    document.querySelector("#updateProductModal select[name='estado']").value = estado;
    document.querySelector("#updateProductModal input[name='telefono']").value = telefono;

    // Cambia la acción del formulario
    const form = document.querySelector("#updateProductModal form");
    form.action = `../../Backend/tablas/actions/actualizar-empleado.php?id=${id}`;

    // Cambia el texto del botón submit - Corregido el selector
    const submitButton = document.querySelector("#updateProductModal button[type='submit']");
    if (submitButton) {
        submitButton.textContent = "Actualizar Empleado";
    }
}
