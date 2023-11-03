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

                  <p><?php  if ($notification  != '') {
                    if ($tipo == "C") { ?>
                    <div class="bg-green-700 " >  <?php echo $notification  ?> </div>
                 <?php   } else { ?>
                    <div class="bg-red-600 " >  <?php echo $notification  ?> </div>
                <?php }
                } ; ?></p>
    
                <div class="flex flex-row justify-between m-10" >
                    <div>
                    <p>Lista de Permisos </p>
                    </div>
                    <div class="flex flex-row" >
                    <a href="/src/views/dashboard.php">Home</a> <p>/ Permisos</p> 
                    </div>
                </div>
            
        <div  class="w-[90%] bg-white m-4 " >
            <div>
                <div class="flex flex-row justify-between mx-5 p-3">
                    <div class="mx-6 my-4" >
                         <p>Información de Permisos</p>
                    </div>
                    <div class="mx-6 my-4">
                        <a href="#"></a>
                    </div>   
                </div>
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
                    <table class="table-auto border-2 border-slate-500  ">
                    <thead class=" " >    
                        <tr class="table-auto border-2 border-slate-500 items-center text-[18px]" >
                            <td class="w-64"  > # </td>
                            <td  class="w-96">Email / Usuario</td>
                            <td class="w-64" > Permiso </td>
                            <td  class="w-64"> Estado </td>
                            <td  class="w-64"> Acciones </td>
                        </tr>
                    </thead>    
                    <tbody>
                    <?php
                    $contador = 1; 
                    foreach ($data as $permisos) { ?>
                    <tr class="table-auto border-2 border-slate-500 items-center  " >
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $permisos['correo']; ?></td>
                        <td ><?php if ($permisos['nombre_rol'] == 'Administrador') { ?>
                            <span class="text-black bg-amber-400  rounded px-2" >Administrador</span>
                   <?php } else if ($permisos['nombre_rol'] == 'Maestro'){ ?>
                         <span class="text-white bg-cyan-600 rounded px-2  " >Maestro</span>
                   <?php  } else { ?>
                         <span class="text-white bg-slate-700 rounded px-2  " >Alumno</span>
                   <?php  } ?>
        </td>

                        <td ><?php if ($permisos['estatus'] == 1) { ?>
                            <span class="text-white bg-green-700  rounded px-2" >Activo</span>
                   <?php } else { ?>
                         <span class="text-white bg-red-600 rounded px-2  " >Inactivo</span>
                   <?php  } ?>
        </td>
                        <td> 
                            <a href="/edit_permiso?id_usuario=<?= $permisos["id_usuario"] ?>" class="px-2 rounded "> <i class="fa-solid fa-pen-to-square mx-3" style="color: #50c9f2;"></i> </a> </td>
                    </tr>
                <?php  $contador++;  
                } ?>
                  
                    </tbody> 


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