<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/output.css" rel="stylesheet" />
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
              src="../assets/Img/file.png"
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
            href="index.html"
            class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
          >
            <svg
              class="w-5 h-5 text-[rgb(0,170,255)] transition duration-75 group-hover:text-white dark:group-hover:text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 21"
            >
              <path
                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"
              />
              <path
                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"
              />
            </svg>
            <span class="ms-3">Tablero</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group" 
            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
          >
            <svg
              class="flex-shrink-0 w-5 h-5 text-[rgb(0,170,255)] transition duration-75 group-hover:text-white dark:group-hover:text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 18 18"
            >
              <path
                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
              />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Empleados</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
           </svg>
          
           
          </a>
          <ul id="dropdown-example" class="hidden py-2 space-y-2">
            <li>
              <a href="Asistencias.html" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
              hover:text-white dark:text-white dark:hover:bg-gray-700">Asistencias</a>
           </li>
            <li>
               <a href="lista-empleados.html" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
               hover:text-white dark:text-white dark:hover:bg-gray-700">Lista de Empleados</a>
            </li>
            <li>
              <a href="permisos-vacaciones.html" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
              hover:text-white dark:text-white dark:hover:bg-gray-700">Permisos Y Vacaciones</a>
           </li>
            
      </ul>
        </li>
        
  
     
        <li>
          <a
            href="#"
            class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
          >
            <svg
              class="flex-shrink-0 w-5 h-5 text-[rgb(0,170,255)] transition duration-75 group-hover:text-white dark:group-hover:text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 18 20"
            >
              <path
                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"
              />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Estadísticas</span>
          </a>
        </li>
  
        <li>
          <a
            href="#"
            class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
          >
            <svg
              class="flex-shrink-0 w-5 h-5 text-[rgb(0,170,255)] transition duration-75 group-hover:text-white dark:group-hover:text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"
              />
              <path
                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"
              />
              <path
                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"
              />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Manual de usuario</span>
          </a>
        </li>
  
  
  
        <li>
          <a
            href="../Backend/logout.php"
            class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
          >
            <svg
              class="flex-shrink-0 w-5 h-5 text-[rgb(0,170,255)] transition duration-75 group-hover:text-white dark:group-hover:text-white"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 18 16"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"
              />
            </svg>
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
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-700 cursor-default hover:text-[#1e54ff] md:ms-2 dark:text-gray-400 dark:hover:text-white">Empleados</span>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="cursor-default ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Permisos y Vacaciones</span>
      </div>
    </li>
  </ol>
  </div>

   <div class="encabezado flex justify-between items-center w-[90%] text-[#b9dfff]">

            <h1 class=" text-[28px]">Lista de Permisos y Vacaciones</h1>
          
            <button  class="bg-slate-950 text-slate-400 
            border border-slate-400 
            font-medium overflow-hidden relative 
            px-4 py-2 rounded-md hover:brightness-150 
             hover:border-b a
            ctive:opacity-75 outline-none duration-300 group" id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" >
              <span class="bg-slate-400 
              shadow-slate-400 absolute -top-[150%] 
              left-0 inline-flex w-80 h-[5px] rounded-md 
              opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
             Añadir Permiso
            </button>


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-[#0b1739] rounded-lg shadow  sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white dark:text-white">
                    Nueva Solicitud
                </h3>
                <button type="button" class="text-gray-400 bg-transparent  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  hover:brightness-150 " data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Cerrar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="#">
                <div class="grid gap-4 mb-4 ">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Empleado</label>
                        <input type="text" name="name" id="name" class="bg-[#060d23] border border-gray-300 text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingresar nombre" required="">
                    </div>
                 
                
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-white ">Tipo de Permiso</label>
                        <select id="category" class="bg-[#060d23] border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Seleccionar Categoria</option>
                            <option value="Vacaciones">Vacaciones</option>
                            <option value="Permiso medico">Permiso medico</option>
                            <option value="Permiso Personal">Permiso Personal</option>
                         
                        </select>
                    </div>
                  


                    <div class="">
                        <label class="block text-sm font-medium text-white mb-2">Seleccionar rango de fechas</label>
                        
                <div id="date-range-picker" date-rangepicker class="flex items-center">
                    <div class="relative w-[50%]">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="start" type="text" class="bg-[#060d23] border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha Inicio">
                    </div>
                    <span class="mx-4 text-gray-500">A</span>
                    <div class="relative w-[50%]">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="end" type="text" class="bg-[#060d23] border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha Final">
                </div>
                </div>
  
                      </div>
                      
                      
                      
                    

                 
                        
                      </div>
                      <button type="button" 
                      class="text-white bg-blue-700 
                      hover:bg-[#235dff] focus:ring-4 
                      focus:ring-blue-300 font-medium rounded-lg 
                      text-sm px-5 py-2.5 me-2 mb-2  
                      ">Añadir Solicitud</button>



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
          
            <th>Nombre Completo</th>
            <th>Tipo De Permiso</th>
            <th>Fecha inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="empleados-table">
        
        <?php
          include '../Backend/tablas/Permisos-Vacaciones.php'
        ?>
          
       
    </tbody>
</table>




    
  

   
  </div>


  </section>

  <script src="../assets/js/tables.js"></script>
  <script src="../assets/js/empleados.js" id="scripts"></script>
  <script type="module" src="../assets/js/flowbite.js" id="scripts"></script>
</body>
</html>