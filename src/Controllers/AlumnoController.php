<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Alumnos.php");


class AlumnoController
{
    public function mostrarAlumnos()
    {
        $alumno = new Alumno();
        $data = $alumno->allAlumnos();
        $notification = '';
        $tipo = '';
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }

    public function addAlumno($data)
    {
        $alumno = new Alumno();
        $newAlumno = $alumno->createAlumno($data);
<<<<<<< HEAD
        $data = $alumno->allAlumnos();

        if ($newAlumno) {
            $notification = "Alumno Creado Correctamente";
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
=======

        if ($newAlumno) {
            header("Location: /view_alumnos");
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
        } else {
            $notification = "Alumno No se pudo Crear";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        }
    }

    public function modifyAlumno($request)
    {
        $alumno = new Alumno();
        $updateAlumno = $alumno->updateAlumno($request);
<<<<<<< HEAD
        $data = $alumno->allAlumnos();

        if ($updateAlumno) {
            $notification = 'Alumno ' . $request['nombre'] . ' Modificado Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        } else {
            $notification ='Alumno ' . $request['nombre'] . 'no se pudo Modificar';
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
=======

        if ($updateAlumno) {
            header("Location: /alumnos");
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
        }
    }

    public function editAlumno($id)
    {
<<<<<<< HEAD
        $alu = new Alumno();
        $alumno = $alu->findAlumno($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/update_alumnos.php";
=======
        $alumno = new Alumno();
        $data = $alumno->allAlumnos();
        $infoAlumno = $alumno->findAlumno($id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
    }

    public function  vercalificacionesAlumnos()
    {
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $calificacion = new Alumno();
        $data = $calificacion->calificacionesAlumnos($id);
<<<<<<< HEAD
        $notification = '';
        $tipo = '';
=======
        // var_dump($data);
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_calificaciones.php";
    }

    public function verClasesAlumno(){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);
<<<<<<< HEAD
        $notification = '';
        $tipo = '';
=======

>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
    }

    public function borrarAlumno($id){
        $dltAlumno = new Alumno();
        $dataDlt = $dltAlumno->deleteUsuario($id);
        $data = $dltAlumno->allAlumnos();

<<<<<<< HEAD
        if ($dataDlt) {
            $notification = 'Alumno Eliminado Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        } else {
            $notification = "Alumno No se pudo Eliminar";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        }   
=======
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
    }

    public function agregarClases($idClase){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $addClase = $claseAlumno->agregarClaseAlumno($idClase,$id);
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);
<<<<<<< HEAD
        if ($addClase) {
            $notification = 'Clase Agregada Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } else {
            $notification = "Clase No se pudo Agregar";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        }     
=======

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
    }

    public function borrarClaseAlumno($id){
        session_start();
        $user = $_SESSION["user"];
        $idAlumno =  $user['id_usuario']; 
        $dltClaseAlumno = new Alumno();
        $dataDlt = $dltClaseAlumno->deleteClasesAlumnos($id);
        $data = $dltClaseAlumno->claseInscritaAlumno($idAlumno);
        $dataDis = $dltClaseAlumno->clasesDisponibles($idAlumno);
<<<<<<< HEAD
        if ($dataDlt) {
            $notification = 'Clase Eliminada Correctamente';
            $tipo = 'C';    
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } else {
            $notification = "Clase No se pudo Eliminar";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } 
=======

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
    }
}

?>