<?php
            include('../../Backend/conexión.php');

            $sql = "SELECT id, nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono FROM empleados";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
      
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['cedula_identidad']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['puesto']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['departamento']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['fecha_ingreso']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
                    echo '<td class="celda">';
         
                    echo '<button 
                    onclick="cargarDatosEmpleado(this)" 
                    class="boton" 
                    type="button"
                    data-modal-target="updateProductModal" 
                    data-modal-toggle="updateProductModal" 
                    data-id="' . htmlspecialchars($row['id']) . '" 
                    data-nombre="' . htmlspecialchars($row['nombre_completo']) . '" 
                    data-cedula="' . htmlspecialchars($row['cedula_identidad']) . '" 
                    data-puesto="' . htmlspecialchars($row['puesto']) . '" 
                    data-departamento="' . htmlspecialchars($row['departamento']) . '" 
                    data-fecha="' . htmlspecialchars($row['fecha_ingreso']) . '" 
                    data-estado="' . htmlspecialchars($row['estado']) . '" 
                    data-telefono="' . htmlspecialchars($row['telefono']) . '">
                    <i class="ti ti-pencil"></i>
                </button>';

                    echo '<button onclick="eliminarEmpleado(' . htmlspecialchars($row['id']) . ')" class="eliminar" data-modal-target="popup-modal" data-modal-toggle="popup-modal"><i class="ti ti-trash"></i></button>';

                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="8">No se encontraron empleados.</td></tr>'; // Mensaje si no hay resultados
            }

            $conn->close();
            ?>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 bg-[#0b1739] rounded-lg shadow-lg w-full max-w-md mx-auto ">
        <button type="button"  class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-hide="popup-modal">
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
            <h3 class="mb-5 text-lg font-normal text-gray-500">¿Estás seguro de que deseas eliminar este empleado?</h3>
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





<div id="updateProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative p-4 bg-[#0b1739] rounded-lg shadow  sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-white dark:text-white">
                Editar Empleado
              </h3>
              <button type="button"
                class="text-gray-400 bg-transparent  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  hover:brightness-150 "
                data-modal-toggle="updateProductModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Cerrar Modal</span>
              </button>
            </div>
            <form action="../../Backend/añadir-empleado.php" method="POST">
              <div class="grid gap-4 mb-4 ">
                <div>
                  <label for="name" class="block mb-2 text-sm font-medium text-white">Nombre Completo</label>
                  <input type="text" name="nombre_completo" id="name" class="bg-[#060d23] border
                         text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                         dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Ingresar nombre completo" required>
                </div>

                <div>
                  <label for="Identidad" class="block mb-2 text-sm font-medium text-white">Cédula de Identidad</label>
                  <input type="text" name="cedula_identidad" id="cedula_identidad" class="bg-[#060d23] border  text-white 
                      text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                      block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
                       dark:focus:border-primary-500" placeholder="Ingresar cédula" pattern="\d{8}"
                    title="la cédula debe contener 8 digitos" required>

                </div>

                <div>
                  <label for="name" class="block mb-2 text-sm font-medium text-white">Puesto De Trabajo</label>
                  <input type="text" name="puesto" id="name" class="bg-[#060d23] border 
                       text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full 
                       p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                       dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Puesto de Trabajo"
                    required>
                </div>





                <div>
                  <label for="category" class="block mb-2 text-sm font-medium text-white ">Departamento</label>
                  <select id="category"
                    class="bg-[#060d23] border  text-gray-400 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500
                    " name="departamento">
                    <option selected="" disabled>Seleccionar Departamento</option>
                    <option value="Dirección">Dirección</option>
                    <option value="Administración">Administración</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                    <option value="Planificación">Planificación</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Operaciones">Operaciones</option>
                    <option value="Proyectos">Proyectos</option>
                    <option value="Atención y Social">Atención y Social</option>
         
                  </select>
                </div>

                <div class="">
                  <label class="block text-sm font-medium text-white mb-2">Seleccionar rango de fechas</label>

                  <div id="date-range-picker" date-rangepicker class="flex items-center">
                    <div class="relative w-[100%]">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                      </div>
                      <input datepicker id="default-datepicker" name="fecha_ingreso" type="text"
                        class="bg-[#060d23] border  text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Fecha Inicio">
                    </div>


                  </div>

                </div>

                <div>
                  <label for="estado" class="block mb-2 text-sm font-medium text-white">Estado</label>
                  <select name="estado" id="estado" class="bg-[#060d23] border text-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                </div>


                <div>
                  <label for="Teléfono" class="block mb-2 text-sm font-medium text-white">Teléfono</label>
                  <input type="tel" name="telefono" id="telefono" class="bg-[#060d23] border text-white 
                      text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                      block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
                       dark:focus:border-primary-500" placeholder="Ingresar telefono" pattern="\d{10,11}"
                    title="El teléfono debe contener 10 u 11 dígitos" required required>

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

      <script src="../../assets/js/eliminar-empleado.js"></script>
      <script src="../../assets/js/editar-empleado.js"></script>