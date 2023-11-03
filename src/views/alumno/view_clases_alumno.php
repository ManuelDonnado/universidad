<?php
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
    <div class="bg-slate-700 h-screen w-20 lg:w-40 fixed">
        <div class="flex justify-between border-b-white">
            <div>
                <img class="bg-white rounded-full h-10 w-10 m-4 " src="/src/images/inicio.png" alt="">
            </div>
            <div>
                <h3 class="text-white text-[14px] m-4 my-6">Universidad </h3>
            </div>
        </div>
        <hr>
        <div>
            <h2 class="text-white mx-4 text-[12px] m-2"> <?php echo $user['nombre_rol'];  ?> </h2>
            <h3 class="text-white mx-4 text-[12px] m-2"> <?php echo $user['nombre'] . " " . $user['apellido'];  ?> </h3>
        </div>
        <hr>
        <?php

        //echo "prueba de vista";
        //var_dump($user);
        if ($user['id_rol'] === 1) { ?>
            <div>
                <div class=" flex justify-center text-[12px] text-white  m-3 my-6">
                    MENÚ ADMINISTRACION
                </div>

                <div class="flex flex-col m-3 text-[12px] text-white ">
                    <a href="/view_permisos"> <i class="fa-solid fa-user-gear" style="color: #89919f;"></i> Permisos </a>
                    <a href="/view_maestros"> <i class="fa-solid fa-chalkboard-user" style="color: #89919f;"></i> Maestros</a>
                    <a href="/view_alumnos"> <i class="fa-solid fa-graduation-cap" style="color: #89919f;"></i> Alumnos </a>
                    <a href="/view_materias"> <i class="fa-solid fa-book" style="color: #89919f;"></i> Materias</a>
                    <a href="/view_clases"> <i class="fa-solid fa-clipboard-user" style="color: #89919f;"></i> Clases </a>
                </div>
            </div>
        <?php  } elseif ($user['id_rol'] === 2) { ?>
            <div>
                <div class=" flex justify-center text-[12px] text-white ">
                    MENÚ MAESTRO
                </div>

                <div class="flex flex-col m-3 text-[12px] text-white ">
                    <a href="/view_maestro_alumno"><i class="fa-solid fa-graduation-cap" style="color: #89919f;"></i> Alumnos </a>
                </div>
            </div>
        <?php  } elseif ($user['id_rol'] === 3) { ?>
            <div>
                <div class=" flex justify-center text-[12px] text-white ">
                    MENÚ ALUMNOS
                </div>

                <div class="flex flex-col m-3 text-[12px] text-white ">
                    <a href="/view_calificaciones"> <i class="fa-regular fa-file-lines" style="color: #89919f;"></i> Ver Calificaciones </a>
                    <a href="/view_clases_alumno"> <i class="fa-solid fa-clipboard-user" style="color: #89919f;"></i> Administra tus clases</a>
                </div>
            </div>
        <?php }  ?>
    </div>

    <div class="flex flex-col h-screen w-full pl-20 lg:pl-40">
        <header class="bg-white p-3">
            <div class="flex justify-between mx-5">
                <div>
                    <i class="fa-solid fa-bars mr-7" style="color: #89919f;"></i> Home
                </div>


                <div class="relative inline-block text-left " id="userDropdown">
                    <div onclick="toggleDropdown()" class="cursor-pointer flex items-center">
                        <p class="mx-5 text-[16px]"> <?php echo $user['nombre'] . " " . $user['apellido'];  ?> </p>
                        <i class="fa-solid fa-chevron-down" style="color: #89919f;"></i>
                    </div>
                    <div id="dropdownContent" class="dropdown hidden mt-0 w-40 absolute right-0 ">
                        <div class="bg-white rounded-lg shadow-lg flex flex-col text-[14px]">
                            <a href="/src/views/Perfil.php" class="block px-4 py-2 mx-4 text-gray-800"> <i class="fa-solid fa-circle-user mr-3" style="color: #89919f;"></i> Perfil</a>
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


        <div class="bg-stone-100 flex-grow p-4">

            <div class="flex flex-row justify-between m-10">
                <div>
                    <p>Esquema de clases</p>
                </div>
                <div class="flex flex-row">
                <a href="/src/views/dashboard.php">Home</a>
                    <p>/ Clases</p>
                </div>
            </div>

         <div class="flex flex-row justify-beetween " >
            <div class="w-[50%] bg-white m-10 p-10 ">
                <div>
                    <div class="flex flex-row justify-between mx-5 p-3">
                        <div class="mx-6 my-4">
                            <p>Tus Materias Inscritas</p>
                        </div>
                        <div class="mx-6 my-4">

                        </div>
                    </div>

                    <hr>
                    <div class="flex flex-row justify-between mx-5 p-3">
                        <div>
                           
                        </div>
                        <div>
                           
                        </div>
                    </div>

                    <div class="w-[90%] h-[80%]">
                        <table class="table-auto border-2 border-slate-500  m-10 ">
                            <thead>
                                <tr class="table-auto border-2 border-slate-500 items-center text-[18px]" >
                                    <td class="w-64" > # </td>
                                    <td class="w-64" > Materia </td>
                                    <td class="w-64" > Maestro </td>
                                    <td class="w-64" > Darse de Baja </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($data as $clases) { ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $clases['nombre_materia']; ?></td>
                                        <td><?php echo $clases['maestro']; ?></td>
                                        <td><a href="/borrar_clase_alumno?id_clase_alumno=<?= $clases["id_clase_alumno"] ?>"><i class="fa-solid fa-trash-can" style="color: #f22c2c;"></i></a> </td>
                                    </tr>
                                <?php $contador++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
            <div class="w-[50%] bg-white m-10 p-10 ">
                <div>
                    <div class="flex flex-row justify-between mx-5 p-3">
                        <div class="mx-6 my-4">
                            <p>Materias para Inscribir</p>
                        </div>
                        <div class="mx-6 my-4">

                        </div>
                    </div>

                    <hr>
                    <div class="flex flex-row justify-between mx-5 p-3">
                        <div>
                           
                        </div>
                        <div>
                        
                        </div>
                    </div>

                    <div class="w-[80%] h-[50%]">
                        <table class="table-auto border-2 border-slate-500  m-10 ">
                            <thead>
                                <tr class="table-auto border-2 border-slate-500 items-center text-[18px]" >
                                    <td  class="w-64" > # </td>
                                    <td  class="w-64" > Materia </td>
                                    <td  class="w-64" > Maestro </td>
                                    <td  class="w-64" > Incribirse </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($dataDis as $clasesDis) { ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $clasesDis['nombre_materia']; ?></td>
                                        <td><?php echo $clasesDis['maestro']; ?></td>
                                        <td> <a href="/agregar_clase?id_clase=<?= $clasesDis["id_clase"] ?>"> <i class="fa-solid fa-circle-plus" style="color: #0f62f0;"></i></a> </td>
                                    </tr>
                                <?php $contador++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>








        </div>
        <footer class="bg-white p-1 w-full">
            <p> Copyright 2023 User-Manuel Donado. All rights reserved. </p>
        </footer>

    </div>


</body>

</html>