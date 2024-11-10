<?php
session_start();


if (isset($_SESSION['usuario'])) {
    if ($_SESSION['rol'] === 'Administrador') {
        header("Location: Admin/tablero-admin.php");
    } elseif ($_SESSION['rol'] === 'Empleado') {
        header("Location: Empleado/tablero-empleados.php");
    }
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/output.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Iniciar Sección</title>
  </head>
  <body class=" ">
 
    <form
      class="w-[90%] max-w-[400px] absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] rounded-[20px] bg-[#0b1739] " action="../Backend/login.php" id="loginForm"
    method="POST">
      <fieldset class="flex flex-col p-[25px]">

        <div class="flex flex-col items-center">
       <img src="../assets/Img/file.png" class="w-[100px] " alt="">
       <h1 class="font-bold text-[20px] text-white mb-[15px]">Iniciar Sección</h1>
    </div>
     
        <div class="relative z-0 w-full mb-5 group">
            <input
              type="text"
              name="Usuario"
              id="floating_username"
              class="block py-2.5 px-0 w-full text-sm text-[#eaf6ff] bg-transparent border-0 border-b-2 border-gray-300 autofill:bg-yellow-200 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_username"
              class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Usuario</label
            >
          </div>

          <div class="relative z-0 w-full mb-5 group">
            <input
              type="password"
              name="Contraseña"
              id="floating_password"
              class="block py-2.5 px-0 w-full text-sm text-[#eaf6ff] bg-transparent border-0 border-b-2 border-gray-300 appearance-none autofill:bg-yellow-200 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
              placeholder=" "
              required
            />
            <label
              for="floating_password"
              class="peer-focus:font-medium  absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >Contraseña</label
            >
          </div>

          <button
          type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
          Iniciar Sección
        </button>
        
     <span class="mt-2 text-[#888]">¿No tienes una cuenta? <a href="registro.html" class="font-[500] text-white hover:text-[#60a5fa]">Registrate</a></span>

      </fieldset>
    </form>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
  <div class="bg-white p-4 rounded-lg shadow-lg flex items-center space-x-4 w-96">    
    <div class="w-12 h-12 flex items-center justify-center bg-red-500 rounded-full">
      <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </div>
  <div class="flex-1">
    <h2 id="modalTitle" class="font-bold text-lg"></h2>
    <p id="modalMessage" class="mt-2"></p>
    
  </div>
  <button  id="t" onclick="cerrarModal('modalError')" class="text-gray-500 mb-10 font-medium text-black">X</button>
</div>
</div>
    <script src="../assets/js/login.js"></script>
  </body>
</html>
