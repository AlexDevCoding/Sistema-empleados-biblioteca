

<?php

  include('../../Backend/auth/autenticación.php')

?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">

    <title>Document</title>
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
          href="asistencias.php"
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

    <section class="p-4 sm:ml-64" id="section">
      


    </section>
    <script src="../../assets/js/graficas.js"></script>
   
    <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
 

  
  </body>
</html>