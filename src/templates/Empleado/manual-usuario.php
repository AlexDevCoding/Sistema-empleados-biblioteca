<?php

include('../../Backend/auth/autenticación.php')

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">
    <link rel="icon" href="../../assets/Img/file.png">
    <title>Manual de usuario</title>
</head>

<body class="bg-[#060d23]">
    <nav
        class="fixed top-0 z-50 w-full bg-[#0b1739] dark:bg-gray-800 dark:border-gray-700" id="barra-de-navegacion">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button
                        data-drawer-target="logo-sidebar"
                        data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="w-6 h-6"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href=" " class="flex ms-2 md:me-24">
                        <img
                            src="../../assets/Img/file.png"
                            class="h-[50px] me-3"
                            alt="Biblioteca Virtual" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">Biblioteca Virtual</span>
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
        <i class="ti ti-layout-dashboard" style="font-size: 25px;"></i>
          <span class="ms-3">Tablero</span>
        </a>
      </li>
      <li>
        <a
          href="#"
          class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group" 
          aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
        >
        <i class="ti ti-users" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Empleados</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
         </svg>
        
         
        </a>
        <ul id="dropdown-example" class="hidden py-2 space-y-2">
          <li>
            <a href="asistencias.php" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
            hover:text-white dark:text-white dark:hover:bg-gray-700">Asistencias</a>
         </li>
        
          <li>
            <a href="permisos-vacaciones.php" class="flex items-center w-full p-2 text-[rgb(0,170,255)] transition duration-75 rounded-lg pl-11 group hover:bg-[rgb(37,92,255)] 
            hover:text-white dark:text-white dark:hover:bg-gray-700">Permisos Y Vacaciones</a>
         </li>
          
    </ul>
      </li>
      

   
      <li>
        <a
          href="estadisticas.php"
          class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
        >
        <i class="ti ti-chart-bar" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Estadísticas</span>
        </a>
      </li>

      <li>
        <a
          href="reportes.php"
          class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
        >
        <i class="ti ti-report-search" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Reportes</span>
        </a>
      </li>


   


      <li>
        <a
          href="manual-usuario.php"
          class="flex items-center p-2 text-[rgb(0,170,255)] rounded-lg dark:text-white hover:bg-[rgb(37,92,255)] hover:text-white dark:hover:bg-gray-700 group"
        >
        <i class="ti ti-help-octagon" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Manual de usuario</span>
        </a>
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


        <div class="p-[30px] pl-[100px] pr-[100px]  border-none  rounded-lg  mt-8 w-[90%] bg-[#0b1739]">

            <h1 class="text-white text-center text-2xl font-bold">Manual de usuario</h1>
            <div class="w-full">

                <button id="boton-imprimir" onclick="imprimirSeccion()" type="button" class="text-white bg-blue-700 
        hover:bg-[#235dff] focus:ring-4 
        focus:ring-blue-300 font-medium rounded-lg 
        text-sm px-5 py-2.5 me-2 mb-2  
        ">Imprimir Manual de Usuario</button>

            </div>
            <h2 class="text-white text-left text-xl  font-bold mt-4">INGRESO – SISTEMA DE GESTIÓN</h2>
            <p class="text-white text-sm mt-2 text-justify">
                Para comenzar, debe iniciar sesión utilizando el usuario y la clave previamente registrados. Una vez introducidos los datos, podrás acceder al sistema de gestión.
            </p>

            <img src="../../assets/Img/ingreso.png" alt="" class="border-solid border-4 rounded-lg mt-4">


            <h2 class="text-white text-left text-xl  font-bold mt-2">TABLERO – INICIO</h2>
            <p class="text-white text-sm mt-2 text-justify">
                El Tablero de inicio incluye un menú lateral con funciones como tablero principal, gestión de empleados, estadísticas, reportes, bitácora de usuarios, base de datos, manual de usuario y cerrar sesión. En el panel principal se muestran datos clave como el total de empleados, la tasa de asistencia y las solicitudes de vacaciones pendientes, junto con gráficos de empleados por departamento y su estado (activos o inactivos).
            </p>

            <img src="../../assets/Img/tablero.png" alt="" class="border-solid border-4 rounded-lg mt-4">

            <h2 class="text-white text-left text-xl  font-bold mt-2">REGISTRO – EMPLEADO</h2>
            <p class="text-white text-sm mt-2 text-justify ">
                En el menú, se encuentra la opción de agregar nuevos empleados. Para completar este formulario de registro, es necesario proporcionar la siguiente información:
            </p>

            <ul class="text-white text-left text-sm mt-2"></ul>
            <li class="text-white"><strong>Nombre Completo:</strong> Ingrese el nombre del empleado.</li>
            <li class="text-white"><strong>Cédula:</strong> Ingrese la cédula del empleado.</li>
            <li class="text-white"><strong>Departamento:</strong> Seleccione el departamento al que pertenece el empleado.</li>
            <li class="text-white"><strong>Puesto:</strong> Ingrese el puesto del empleado.</li>
            <li class="text-white"><strong>Fecha de Ingreso:</strong> Ingrese la fecha de ingreso del empleado.</li>
            <li class="text-white"><strong>Fecha de Nacimiento:</strong> Ingrese la fecha de nacimiento del empleado.</li>
            <li class="text-white"><strong>Teléfono:</strong> Ingrese el teléfono del empleado.</li>
            <li class="text-white"><strong>Correo Electrónico:</strong> Ingrese el correo electrónico del empleado.</li>
            <li class="text-white"><strong>Estado:</strong> Seleccione el estado del empleado (activo o inactivo).</li>
            </ul>

            <img src="../../assets/Img/registro-empleado.png" alt="" class="border-solid border-4 rounded-lg mt-4">


            <h2 class="text-white text-left text-xl  font-bold mt-2">LISTA – EMPLEADOS</h2>
            <p class="text-white text-sm mt-2 text-justify">
                En la sección de lista de empleados del sistema de gestión, se pueden consultar y gestionar los datos de los empleados registrados. Esta interfaz presenta una tabla detallada que incluye información como el nombre completo, la cédula de identidad, el puesto de trabajo, el departamento, la fecha de ingreso, el estado laboral (Activo o Inactivo) y el teléfono. Además, cada fila cuenta con una columna de "Acciones", que permite editar o eliminar fácilmente la información de un empleado. También se incluyen opciones de búsqueda y control sobre la cantidad de registros visibles por página, optimizando así la navegación y gestión del personal. En la parte superior derecha se encuentra el botón "Añadir Empleado", que permite registrar manualmente los empleados, asegurando un control eficiente y organizado del personal.
            </p>



            <img src="../../assets/Img/lista-empleados.png" alt="" class="border-solid border-4 rounded-lg mt-4">


            <h2 class="text-white text-left text-xl  font-bold mt-2">REGISTRO – ASISTENCIA</h2>
            <p class="text-white text-sm mt-2 text-justify">
                En el menú, se encuentra la opción asistencias de los empleados. Para completar este formulario de registro, es necesario proporcionar la siguiente información
            </p>

            <ul class="text-white text-sm mt-2 text-justify"></ul>
            <li class="text-white"><strong>Cédula de Identidad: </strong> Ingresar la cédula del empleado ya registrado.</li>
            <li class="text-white"><strong>Nombre Completo: </strong> Al ingresar la cédula automáticamente el nombre completo del empleado aparecerá en el campo.</li>
            <li class="text-white"><strong>Fecha: </strong> Seleccionar la fecha de la asistencia.</li>
            <li class="text-white"><strong>Estado: </strong> Seleccionar el estado en el que ingreso el empleado A tiempo, tardanza y ausente.</li>
            <li class="text-white"><strong>Hora de entrada: </strong> Seleccionar La hora exacta de entrada del empleado.</li>
            <li class="text-white"><strong>Hora De Salida: </strong> Seleccionar La hora exacta de salida del empleado.</li>
            </ul>



            <img src="../../assets/Img/Registro-asistencias.png" alt="" class="border-solid border-4 rounded-lg mt-4">

            <h2 class="text-white text-left text-xl  font-bold mt-2">LISTA – ASISTENCIA</h2>
            <p class="text-white text-sm mt-2 text-justify">
                En la sección de Lista de Asistencias del sistema, se pueden consultar y gestionar los registros de asistencia de los empleados registrados, presentando una tabla detallada que incluye información como el nombre del empleado, la fecha de asistencia, la hora de entrada, la hora de salida y el estado de puntualidad (A tiempo o Retraso), además de contar con una columna de "Acciones" que permite editar o eliminar fácilmente la información de un registro. En la parte superior derecha se encuentra el botón "Añadir Asistencia", que permite registrar manualmente la asistencia de un empleado, asegurando un control eficiente y organizado de las asistencias del personal.
            </p>

            <img src="../../assets/Img/Lista-ASISTENCIAS.png" alt="" class="border-solid border-4 rounded-lg mt-4">


            <h2 class="text-white text-left text-xl  font-bold mt-2">REGISTRO – PERMISOS Y VACACIONES</h2>
            <p class="text-white text-sm mt-2 text-justify">
                En el menú, se encuentra la opción permisos y vacaciones. Para completar este formulario de registro, es necesario proporcionar la siguiente información:
            </p>

            <ul class="text-white text-left text-sm mt-2"></ul>
            <li class="text-white text-justify"><strong>Cédula de Identidad: </strong> Ingresar la cédula del empleado ya registrado.</li>
            <li class="text-white text-justify"><strong>Nombre Completo: </strong> Al ingresar la cédula automáticamente el nombre completo del empleado aparecerá en el campo.</li>
            <li class="text-white text-justify"><strong>Tipo de permiso: </strong> Seleccionar el tipo de permiso que desea registrar.</li>
            <li class="text-white text-justify"><strong>Fecha de inicio: </strong> Seleccionar La fecha de inicio del permiso.</li>
            <li class="text-white text-justify"><strong>Fecha de fin: </strong> Seleccionar La fecha de fin del permiso.</li>

            </ul>

            <img src="../../assets/Img/REGISTRO – PERMISOS Y VACACIONES.png" alt="" class="border-solid border-4 rounded-lg mt-4">



            <h2 class="text-white text-left text-xl  font-bold mt-2">LISTA – PERMISOS Y VACACIONES</h2>
            <p class="text-white text-sm mt-2 text-justify">
                En la sección de Lista de Asistencias del sistema, se pueden consultar y gestionar los registros de asistencia de los empleados registrados, presentando una tabla detallada que incluye información como el nombre del empleado, la fecha de asistencia, la hora de entrada, la hora de salida y el estado de puntualidad (A tiempo o Retraso), además de contar con una columna de "Acciones" que permite editar o eliminar fácilmente la información de un registro. En la parte superior derecha se encuentra el botón "Añadir Asistencia", que permite registrar manualmente la asistencia de un empleado, asegurando un control eficiente y organizado de las asistencias del personal.
            </p>

            <img src="../../assets/Img/LISTA – PERMISOS Y VACACIONES.png" alt="" class="border-solid border-4 rounded-lg mt-4">



            <h2 class="text-white text-left text-xl  font-bold mt-2">SECCIÓN - REPORTES</h2>
            <p class="text-white text-left text-sm mt-2">
                En la sección de Reportes del sistema, se permite la generación y consulta de diversos informes relacionados con la administración del personal. La interfaz está compuesta por tres paneles principales:
            </p>

            <ul class="text-white text-left text-sm mt-2"></ul>
            <li class="text-white text-justify "><strong>Reportes de Empleados: </strong> Este panel dispone de un menú desplegable que permite seleccionar un período, como "Mensual", y cuenta con un botón denominado "Generar Reporte", el cual permite obtener un informe detallado sobre el personal registrado.</li>
            <li class="text-white text-justify"><strong>Reportes de Asistencias: </strong> Este panel facilita la consulta de los registros de asistencia del personal, permitiendo seleccionar un período específico para generar reportes que detallen información como las fechas y horarios de asistencia.</li>
            <li class="text-white text-justify"><strong>Reportes de Permisos y Vacaciones: </strong> En este panel se pueden generar informes relacionados con los permisos solicitados y las vacaciones tomadas por los empleados, también seleccionando un período determinado.</li>


            </ul>

            <img src="../../assets/Img/reportes.png" alt="" class="border-solid border-4 rounded-lg mt-4">


            

           



        </div>

    </section>

    <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
    <script>
        function imprimirSeccion() {
            // Clonar el contenido de la sección para manipularlo
            const seccion = document.querySelector('#section').cloneNode(true);

            // Remover el botón de imprimir del contenido clonado
            const botonImprimir = seccion.querySelector('#boton-imprimir');
            if (botonImprimir) {
                botonImprimir.remove();
            }

            // Crear la ventana de impresión con el contenido modificado
            const ventanaImpresion = window.open('', '', 'height=600,width=800');
            ventanaImpresion.document.write('<html><head><title>Imprimir Manual de Usuario</title>');
            ventanaImpresion.document.write('<style>');
            ventanaImpresion.document.write('@page { size: portrait; }');
            ventanaImpresion.document.write('img { max-width: 100%; height: auto; display: block; margin: 0 auto; }');
            ventanaImpresion.document.write('</style>');
            ventanaImpresion.document.write('</head><body>');
            ventanaImpresion.document.write(seccion.innerHTML);
            ventanaImpresion.document.write('</body></html>');
            ventanaImpresion.document.close();
            ventanaImpresion.print();
        }
    </script>
</body>

</html>

</html>