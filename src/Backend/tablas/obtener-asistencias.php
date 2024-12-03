<?php

include('../../Backend/conexión.php'); 

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT a.id, e.nombre_completo, a.fecha, a.hora_entrada, a.hora_salida, a.estado
        FROM asistencias a
        JOIN empleados e ON a.empleado_id = e.id
        ORDER BY a.fecha DESC";

$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "<tr><td colspan='5'>Error en la consulta: " . mysqli_error($conn) . "</td></tr>";
    exit;
}


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td class='  px-4 py-2'>" . htmlspecialchars($row["nombre_completo"]) . "</td>";
        echo "<td class='  px-4 py-2'>" . date('m/d/Y', strtotime($row["fecha"])) . "</td>";
        echo "<td class='  px-4 py-2'>" . date('h:i A', strtotime($row["hora_entrada"])) . "</td>";
        echo "<td class='  px-4 py-2'>" . date('H:i A', strtotime($row["hora_salida"])) . "</td>";
        echo "<td class='  px-4 py-2'>" . htmlspecialchars($row["estado"]) . "</td>";
        echo '<td class="celda">';
         
        echo '<button onclick="cargarDatosAsistencia(this)" 
            class="boton"
            data-modal-target="updateProductModal" 
            data-modal-toggle="updateProductModal" 
            data-id="' . htmlspecialchars($row['id']) . '" 
            data-nombre="' . htmlspecialchars($row['nombre_completo']) . '"
            data-fecha="' . date('m/d/Y', strtotime($row["fecha"])) . '" 
            data-hora-entrada="' . date('H:i', strtotime($row["hora_entrada"])) . '" 
            data-hora-salida="' . date('H:i', strtotime($row["hora_salida"])) . '" 
            data-estado="' . htmlspecialchars($row['estado']) . '">
    <i class="ti ti-pencil "></i></button>';
        echo '<button onclick="mostrarModalEliminar(' . htmlspecialchars($row['id']) . ')" 
                      class="eliminar"
                      data-modal-target="popup-modal" 
                      data-modal-toggle="popup-modal">
                <i class="ti ti-trash"></i>
              </button>';
        echo '</td>';
        echo '</tr>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros de asistencia.</td></tr>";
}


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





<div id="updateProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative p-4 bg-[#0b1739] rounded-lg shadow  sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-white dark:text-white">
                Editar Asistencia
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
            <form method="POST" action="../../Backend/tablas/actions/actualizar-asistencias.php" id="formulario-registro">
              <div class="grid gap-4 mb-4 ">
               

                <div>
                  <label for="nombre" class="block mb-2 text-sm font-medium text-white">Nombre Completo</label>
                  <input type="text" name="nombre" id="nombre_completo" class="bg-[#060d23] border text-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar Nombre Completo">
                </div>
                <div class="">
                  <label class="block text-sm font-medium text-white mb-2">Seleccionar Fecha</label>

                  <div class="flex items-center">
                    <div class="relative w-[100%]">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                      </div>
                      <input datepicker datepicker-autohide datepicker-autoselect-today datepicker-buttons name="fecha" type="text" datepicker-format="mm/dd/yyyy"
                        class="bg-[#060d23] border  text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Fecha">
                    </div>


                  </div>

                </div>









                <div>
                  <label for="category" class="block mb-2 text-sm font-medium text-white ">Estado</label>
                  <select id="category" name="estado"
                    class="bg-[#060d23] border  text-gray-400 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="">Seleccionar Estado</option>
                    <option value="A tiempo">A tiempo</option>
                    <option value="Tardanza">Tardanza</option>
                    <option value="Ausente">Ausente</option>

                  </select>
                </div>





                <div>
                  <label for="start-time" class="block mb-2 text-sm font-medium text-white dark:text-white">Hora de entrada</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input type="time" name="hora_entrada" id="start-time" class="bg-[#060d23] border  text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 min=" 07:00" max="18:00" value="00:00" required />
                  </div>
                </div>
                <div>
                  <label for="end-time" class="block mb-2 text-sm font-medium text-white dark:text-white">Hora de salida</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input type="time" name="hora_salida" id="end-time" class="bg-[#060d23] border   text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500  dark:focus:ring-blue-500 dark:focus:border-blue-500 " min="07:00" max="18:00" value="00:00" required />
                  </div>
                </div>


















              </div>
              <button type="submit" class="text-white bg-blue-700 
                          hover:bg-[#235dff] focus:ring-4 
                          focus:ring-blue-300 font-medium rounded-lg 
                          text-sm px-5 py-2.5 me-2 mb-2  
                          ">Añadir Asistencia</button>



          </div>

          </form>
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








    
      <script src="../../assets/js/editar-asistencias.js"></script>
      <script src="../../assets/js/eliminar-asistencias.js"></script>