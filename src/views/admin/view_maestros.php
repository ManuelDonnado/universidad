<?php
session_start();
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e0c81e361c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="bg-slate-700 h-screen w-20 lg:w-40 fixed" >
        <div class="flex justify-between border-b-white" >
            <div>
              <img class="bg-white rounded-full h-10 w-10 m-4 " src="/src/images/inicio.png" alt="">
            </div>
            <div>
                <h3 class="text-white text-[14px] m-4 my-6" >Universidad </h3>
            </div> 
        </div>
        <hr>
        <div>
            <h2 class="text-white mx-4 text-[12px] m-2" > <?php echo $user['nombre_rol'];  ?> </h2>
            <h3 class="text-white mx-4 text-[12px] m-2" > <?php echo $user['nombre'] . " " . $user['apellido'];  ?>  </h3>
        </div>
        <hr>
    <?php 
        
        //echo "prueba de vista";
        //var_dump($user);
    if ( $user['id_rol'] === 1 ) { ?>   
        <div>
            <div class=" flex justify-center text-[12px] text-white  m-3 my-6" >
                MENÚ ADMINISTRACION
            </div>

            <div class="flex flex-col m-3 text-[12px] text-white " >
            <a href="/view_permisos"> <i class="fa-solid fa-user-gear" style="color: #89919f;"></i>   Permisos </a> 
               <a href="/view_maestros"> <i class="fa-solid fa-chalkboard-user" style="color: #89919f;"></i>   Maestros</a>
               <a href="/view_alumnos">  <i class="fa-solid fa-graduation-cap" style="color: #89919f;"></i>   Alumnos </a> 
                <a href="/view_materias"> <i class="fa-solid fa-book" style="color: #89919f;"></i>   Materias</a>
                <a href="/view_clases"> <i class="fa-solid fa-clipboard-user" style="color: #89919f;"></i>   Clases </a>
            </div>
        </div>
    <?php  }  elseif ($user['id_rol'] === 2) { ?>  
        <div>
            <div class=" flex justify-center text-[12px] text-white " >
                MENÚ MAESTRO 
            </div>

            <div class="flex flex-col m-3 text-[12px] text-white ">
               <a href="#"><i class="fa-solid fa-graduation-cap" style="color: #89919f;"></i>   Alumnos </a> 
            </div>
        </div>
    <?php  }  elseif ($user['id_rol'] === 3){ ?>
        <div>
            <div class=" flex justify-center text-[12px] text-white " >
                MENÚ ALUMNOS
            </div>

            <div class="flex flex-col m-3 text-[12px] text-white ">
               <a href="#"> <i class="fa-regular fa-file-lines" style="color: #89919f;"></i>   Ver Calificaciones </a> 
               <a href="#"> <i class="fa-solid fa-clipboard-user" style="color: #89919f;"></i>   Administra tus clases</a>
            </div>
        </div>
    <?php }  ?>  
    </div>

    <div class="flex flex-col h-screen w-full pl-20 lg:pl-40" >
    <header class="bg-white p-3">
        <div class="flex justify-between mx-5">
            <div>
                <i class="fa-solid fa-bars mr-7" style="color: #89919f;"></i> Home
            </div>


            <div class="relative inline-block text-left " id="userDropdown">
                <div onclick="toggleDropdown()" class="cursor-pointer flex items-center">
                    <p class="mx-5 text-[16px]" >   <?php echo $user['nombre'] . " " . $user['apellido'];  ?> </p>
                    <i class="fa-solid fa-chevron-down" style="color: #89919f;"></i>
                </div>
                <div id="dropdownContent" class="dropdown hidden mt-0 w-40 absolute right-0 ">
                    <div class="bg-white rounded-lg shadow-lg flex flex-col text-[14px]">
                        <a href="/src/views/Perfil.php" class="block px-4 py-2 mx-4 text-gray-800"> <i class="fa-solid fa-circle-user mr-3" style="color: #89919f;"></i>  Perfil</a>
                        <a href="/logout" class="block px-4 py-2 mx-4 text-gray-800"> <i class="fa-solid fa-door-open text-red-600 mr-3" style="color: #ed0202;"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdownContent');
            dropdown.classList.toggle('hidden');
        }
    </script>
        <!-- contenido de la tabla --> 
    <div class="bg-stone-100 flex-grow p-4" >
    
                <div class="flex flex-row justify-between m-10" >
                    <div>
                    <p>Lista de Maestros </p>
                    </div>
                    <div class="flex flex-row" >
                    <a href="/src/views/dashboard.php">Home</a> <p>/ Maestros</p> 
                    </div>
                </div>
            
        <div  class="w-[90%] bg-white m-4 " >
            <div>
                <div class="flex flex-row justify-between mx-5 p-3">
                    <div class="mx-6 my-4" >
                         <p>Información de Maestros</p>
                    </div>
                    <div class="mx-6 my-4">
                    <button type="button"  id="openModal" class="bg-cyan-600  text-white px-2 rounded " >  Agregar Maestro</button> 
                    </div>   
                </div>

                 <!-- codigo de modal de insertar alumno -->
                 <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                    <div class="modal-container bg-white w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3 2xl:w-1/2 mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
        
                            <div class="flex justify-between items-center pb-3 ">
                                <h1 class="text-3xl mb-6">Registrar Nuevo Maestro</h1>
                                <div id="closeModal" class="modal-close cursor-pointer z-50">
                                    &times;
                                </div>
                            </div>
                        <form action="/create_maestro" method="post"  class="w-[700px] flex flex-col rounded-md py-4 gap-5 bg-slate-200">
                       
                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" class="w-[80%]  ">
                            </div>

                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                            <label for="">Apellido:</label>
                            <input type="text" name="apellido" class="w-[80%]  ">
                            </div>
                        
                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                            <label for="">Correo:</label>
                            <input type="text" name="correo" class="w-[80%]  ">
                            </div>
                        

                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                                <label for="">Contraseña:</label>
                                <input type="password" name="password" class="w-[80%] ">
                            </div>

                    
                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                                <label for="">Dirección:</label>
                                <input type="text" name="direccion" class="w-[80%] " > </input>
                            </div>
                            
                            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                                <label for="">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" class="w-[80%] " > </input>
                            </div>

                            <div class="self-center">
                                <button type="submit" class="px-2 py-1 rounded-md text-white mb-6 inline-block hover:text-black bg-slate-500">Guardar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <script>
                    // Abre el modal al hacer clic en el enlace
                    document.getElementById('openModal').addEventListener('click', function () {
                        document.getElementById('myModal').classList.remove('hidden');
                    });

                    // Cierra el modal al hacer clic en la "x" o en el fondo oscuro
                    document.getElementById('closeModal').addEventListener('click', function () {
                        document.getElementById('myModal').classList.add('hidden');
                    });
                    document.querySelector('.modal-overlay').addEventListener('click', function () {
                        document.getElementById('myModal').classList.add('hidden');
                    });
                    </script>
                <hr>
                <div class="flex flex-row justify-between mx-5 p-3">
                    <div>
                        <p>Exportar</p>
                    </div>
                    <div>
                        <label for="">Search:</label>
                        <input type="text" class="border-2 border-slate-500 
                        "> </input>
                    </div>
                </div>

                <div class="w-[97%] h-[50%] m-3" >
                    <table class="  border-solid border-2 border-slate-500 ">
                    <thead>    
                        <tr class="table-auto border-2 border-slate-500 items-center text-[18px]"  >
                            <td class="w-64"> # </td>
                            <td class="w-96" > Nombre </td>
                            <td class="w-64" > Correo </td>
                            <td class="w-96"> Dirección </td>
                            <td class="w-64" > Fecha de Nacimiento </td>
                            <td class="w-64"> Clase Asignada </td>
                            <td class="w-64"> Acciones </td>
                        </tr>
                    </thead>    
                    <tbody>
                  
                    </tbody>
                    <?php
                        $contador = 1; 
                        foreach ($data as $maestro) { ?>
                        <tr>
                            <td><?php echo $contador; ?> </td>
                            <td><?php echo $maestro['nombre']; ?></td>
                            <td><?php echo $maestro['correo']; ?></td>
                            <td><?php echo $maestro['direccion']; ?></td>
                            <td><?php echo $maestro['fecha_nacimiento']; ?></td>
                            <td> <?php echo $maestro['nombre_materia']; ?></td>
<<<<<<< HEAD
                            <td>  <a href="/edit_maestro?id_maestro=<?= $maestro["id_usuario"] ?>"> <i class="fa-solid fa-pen-to-square" style="color: #50c9f2;"></i> </a>   
=======
                            <td>  <a href="#"> <i class="fa-solid fa-pen-to-square" style="color: #50c9f2;"></i> </a>   
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
                            <a href="/borrar_maestro?id_maestro=<?= $maestro["id_usuario"] ?>"><i class="fa-solid fa-trash-can" style="color: #f22c2c;"></i></a>
                            </td> <!-- Agrega las acciones que correspondan -->
                        </tr>
                        <?php  $contador++;  
                        } ?>


                    </table>
                </div>

            </div> 
        </div>       



        </div>
        <footer class="bg-white p-1 w-full" >
            <p> Copyright 2023 User-Manuel Donado. All rights reserved. </p>
        </footer> 
       
    </div  >
   

</body>
</html>