<?php

  include('../../Backend/auth/autenticación.php')

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">
</head>
<body class="bg-[#060d23]">
    
  <nav
  class="fixed top-0 z-50 w-full bg-[#0b1739] dark:bg-gray-800 dark:border-gray-700" id="barra-de-navegacion"
>
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button
          data-drawer-target="logo-sidebar"
          data-drawer-toggle="logo-sidebar"
          aria-controls="logo-sidebar"
          type="button"
          class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        >
          <span class="sr-only">Open sidebar</span>
          <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              clip-rule="evenodd"
              fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
            ></path>
          </svg>
        </button>
        <a href=" " class="flex ms-2 md:me-24">
          <img
            src="../../assets/Img/file.png"
            class="h-[50px] me-3"
            alt="Biblioteca Virtual"
          />
          <span
            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white"
            >Biblioteca Virtual</span
          >
        </a>
      </div>
      
    </div>
  </div>
</nav>

<aside
id="logo-sidebar"
class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#081028] border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
aria-label="Sidebar"
>
<div class="h-full px-3 pb-4 overflow-y-auto bg-[#081028] leading-8">
  
  <ul class="space-y-2 font-medium">
    <li>
      <a
        href="tablero-empleados.php"
        class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
      >
        <i class="ti ti-users" style="font-size: 25px;"></i>

        <span class="ms-3">Perfil</span>
      </a>
    </li>
    <li>
      <a
        href="asistencias.php.php"
        class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group" 
        
      >
      <i class="ti ti-calendar-clock"style="font-size: 25px;"></i>
        <span class="flex-1 ms-3 whitespace-nowrap">Mi Asistencia</span>
       
      
       
      </a>
  
    </li>
    

 
    <li>
      <a
        href="#"
        class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group" 
        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
      >
      <i class="ti ti-file-description" style="font-size: 25px;"></i>
        <span class="flex-1 ms-3 whitespace-nowrap">Permisos</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
       </svg>
      
       
      </a>
      <ul id="dropdown-example" class="hidden py-2 space-y-2">
        <li>
          <a href="solicitudes-permisos.php" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
          hover:text-white dark:text-white dark:hover:bg-gray-700">Mis Solicitudes</a>
       </li>
  
        
  </ul>
    </li>





    <li>
      <a
        href="../../Backend/logout.php"
        class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
      >
      <i class="ti ti-logout" style="font-size: 25px;"></i>
        <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sección</span>
      </a>
    </li>
    
  </ul>
</div>
</aside>

<section class="p-4 sm:ml-64 mt-10" id="section">
  <div
            class="flex relative   rounded  h-10 mt-[15px] "
          >
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#1e54ff] dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Tablero
              </a>
            </li>
       
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="cursor-default ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Mis Asistencias</span>
              </div>
            </li>
          </ol>
          </div>

          <div class="encabezado flex justify-between items-center w-[90%] text-[#b9dfff]">

            <h1 class=" text-[28px]">Mis Asistencias</h1>
          
            <button  class="bg-slate-950 text-slate-400 
            border border-slate-400 
            font-medium overflow-hidden relative 
            px-4 py-2 rounded-md hover:brightness-150 
            hover: hover:border-b a
            ctive:opacity-75 outline-none duration-300 group" id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
              <span class="bg-slate-400 
              shadow-slate-400 absolute -top-[150%] 
              left-0 inline-flex w-80 h-[5px] rounded-md 
              opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
             Añadir Asistencia
            </button>

            <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
              <!-- Modal content -->
              <div class="relative p-4 bg-[#0b1739] rounded-lg shadow  sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-white dark:text-white">
                    Añadir Asistencia
                  </h3>
                  <button type="button"
                    class="text-gray-400 bg-transparent  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  hover:brightness-150 "
                    data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar Modal</span>
                  </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="../../Backend/tablas/registrar-asistencias.php" id="formulario-registro">
                  <div class="grid gap-4 mb-4 ">
                    <div>
                      <label for="cedula" class="block mb-2 text-sm font-medium text-white">Cédula de Identidad</label>
                      <input type="text" name="cedula" id="cedula" class="bg-[#060d23] border text-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar Cédula" required>
                    </div>
                
                    <div>
                      <label for="nombre" class="block mb-2 text-sm font-medium text-white">Nombre Completo</label>
                      <input type="text" name="nombre" id="nombre_completo" class="bg-[#060d23] border text-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar Nombre Completo">
                  </div>
                    <div class="">
                      <label class="block text-sm font-medium text-white mb-2">Seleccionar Fecha</label>
    
                      <div id="date-range-picker" date-rangepicker class="flex items-center">
                        <div class="relative w-[100%]">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                          </div>
                          <input datepicker id="default-datepicker" name="fecha" type="text"
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
                                  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                              </svg>
                          </div>
                          <input type="time" name="hora_entrada" id="start-time" class="bg-[#060d23] border  text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 min="09:00" max="18:00" value="00:00" required />
                      </div>
                  </div>
                  <div>
                      <label for="end-time" class="block mb-2 text-sm font-medium text-white dark:text-white">Hora de salida</label>
                      <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                              </svg>
                          </div>
                          <input type="time" name="hora_salida" id="end-time" class="bg-[#060d23] border   text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500  dark:focus:ring-blue-500 dark:focus:border-blue-500 "  min="09:00" max="18:00" value="00:00" required />
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


            








          </div>
          
  
  <div
    class="p-[30px]  border-none  rounded-lg  mt-8 w-[90%] bg-[#0b1739]"
  >
 
 


  <table id="pagination-table" class="">
  
    <thead>
      
        <tr class="uppercase">
          
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th>Estado</th>
            <th>Acciones</th>
           
        </tr>
    </thead>
    <tbody>
    <?php include '../../Backend/tablas/obtener-asistencias.php'
        ?>
    </tbody>
</table>




    
  

   
  </div>
</section>



<script src="../../assets/js/tables.js"></script>
  <script src="../../assets/js/empleados.js" id="scripts"></script>
  <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
  <script src="../../assets/js/buscador.js"></script>
</body>
</html>