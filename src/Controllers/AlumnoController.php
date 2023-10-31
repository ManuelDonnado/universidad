<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Alumnos.php");


class AlumnoController
{
    public function mostrarAlumnos()
    {
        $alumno = new Alumno();
        $data = $alumno->allAlumnos();
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }

    public function addAlumno($data)
    {
        $alumno = new Alumno();
        $newAlumno = $alumno->createAlumno($data);

        if ($newAlumno) {
            header("Location: /view_alumnos");
        } else {
            header("Location: /index.php?success=0");
        }
    }

    public function modifyAlumno($request)
    {
        $alumno = new Alumno();
        $updateAlumno = $alumno->updateAlumno($request);

        if ($updateAlumno) {
            header("Location: /alumnos");
        }
    }

    public function editAlumno($id)
    {
        $alumno = new Alumno();
        $data = $alumno->allAlumnos();
        $infoAlumno = $alumno->findAlumno($id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }

    public function  vercalificacionesAlumnos()
    {
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $calificacion = new Alumno();
        $data = $calificacion->calificacionesAlumnos($id);
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_calificaciones.php";
    }

    public function verClasesAlumno(){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
    }

    public function borrarAlumno($id){
        $dltAlumno = new Alumno();
        $dataDlt = $dltAlumno->deleteUsuario($id);
        $data = $dltAlumno->allAlumnos();

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }

    public function agregarClases($idClase){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $addClase = $claseAlumno->agregarClaseAlumno($idClase,$id);
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
    }

    public function borrarClaseAlumno($id){
        session_start();
        $user = $_SESSION["user"];
        $idAlumno =  $user['id_usuario']; 
        $dltClaseAlumno = new Alumno();
        $dataDlt = $dltClaseAlumno->deleteClasesAlumnos($id);
        $data = $dltClaseAlumno->claseInscritaAlumno($idAlumno);
        $dataDis = $dltClaseAlumno->clasesDisponibles($idAlumno);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
    }
}

?>