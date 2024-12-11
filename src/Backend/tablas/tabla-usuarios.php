<?php

include '../../Backend/conexión.php';


$query = "SELECT id, usuario, rol, fecha, nombre, apellido FROM usuarios";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['rol'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
       
     
    
  
      
       
       
        echo '<td class="celda">';
         
                    echo '<button 
                onclick="cargarDatosUsuario(this)" 
                class="boton" 
                type="button" 
                data-modal-target="updateProductModal" 
                data-modal-toggle="updateProductModal" 
                data-id="' . htmlspecialchars($row['id']) . '" 
                data-nombre="' . htmlspecialchars($row['nombre']) . '"
                data-apellido="' . htmlspecialchars($row['apellido']) . '"
                data-usuario="' . htmlspecialchars($row['usuario']) . '"
                data-rol="' . htmlspecialchars($row['rol']) . '">
                <i class="ti ti-pencil"></i>
              </button>';
                    echo '<button onclick="mostrarModalEliminar(' . htmlspecialchars($row['id']) . ')" class="eliminar" data-modal-target="popup-modal" data-modal-toggle="popup-modal"><i class="ti ti-trash"></i></button>';
                    echo '</td>';
                    echo '</tr>';
    }
} else {
    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
}

// Cerrar la conexión
mysqli_close($conn);
?>


<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 bg-[#0b1739] rounded-lg shadow-lg w-full max-w-md mx-auto">
        <button type="button" class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center">
            <div class="flex justify-center items-center mb-4">
                <svg class="text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </div>
            <h3 class="mb-5 text-lg font-normal text-gray-500">¿Estás seguro de que deseas eliminar este permiso?</h3>
            <div class="flex justify-center gap-4">
                <button data-modal-hide="popup-modal" id="btnConfirmarEliminar" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Si estoy seguro
                </button>
                <button data-modal-hide="popup-modal" id="btnCancelarEliminar" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    No, cancelar
                </button>
            </div>
        </div>
    </div>
</div>


<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-[#0b1739] rounded-lg shadow sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Editar Usuario
                </h3>
                <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:brightness-150" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar Modal</span>
                </button>
            </div>
            <form action="../../Backend/tablas/actions/actualizar-usuario.php" method="post" id="formulario">
                <input type="hidden" name="id" id="editar-id">
              <div class="grid gap-4 mb-4 ">
                <div>
                  <label for="name" class="block mb-2 text-sm font-medium text-white">Nombre </label>
                  <input type="text" name="nombre" id="editar-nombre" class="bg-[#060d23] border
                         text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                         dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingresar nombre"
                    required>
                </div>

                <div>
                  <label for="apellido" class="block mb-2 text-sm font-medium text-white">Apellido </label>
                  <input type="text" name="apellido" id="editar-apellido" class="bg-[#060d23] border
                         text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                         dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingresar Apellido"
                    required>
                </div>


                <div>
                  <label for="usuario" class="block mb-2 text-sm font-medium text-white">Usuario </label>
                  <input type="text" name="usuario" id="editar-usuario" class="bg-[#060d23] border
                         text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                         dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingresar usuario"
                    required>
                </div>

            


                <div>
                  <label for="contraseña" class="block mb-2 text-sm font-medium text-white">Nueva Contraseña
                  </label>
                  <input type="password" name="nueva_contraseña" id="editar-nueva_contraseña" class="bg-[#060d23] border
                         text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                         dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nueva contraseña"
                    >

                </div>

                <div>

                  <label for="contraseña" class="block mb-2 text-sm font-medium text-white">Tipo de Usuario
                  </label>
                  <select name="tipo_usuario" id="editar-tipo_usuario"
                    class="bg-[rgb(6,13,35)]  text-gray-400   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected class="" >Seleccione tipo de usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>

                  </select>

                </div>

              </div>
              <button type="submit" class="text-white bg-blue-700 
                      hover:bg-[#235dff] focus:ring-4 
                      focus:ring-blue-300 font-medium rounded-lg 
                      text-sm px-5 py-2.5 me-2 mb-2  
                      ">Añadir Solicitud</button>



          </div>

          </form>
        </div>
    </div>
</div>

<div id="confirmar-editar" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 bg-[#0b1739] rounded-lg shadow-lg w-full max-w-md mx-auto">
        <button type="button" class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center">
            <div class="flex justify-center items-center mb-4">
                <svg class="text-green-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                </svg>
            </div>
            <h3 class="mb-5 text-lg font-normal text-gray-500">¡El permiso ha sido actualizado exitosamente!</h3>
            <div class="flex justify-center gap-4">
                <button data-modal-hide="popup-modal" id="btnConfirmarEditar" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/editar-usuario.js"></script>
<script src="../../assets/js/eliminar-usuario.js"></script>