<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Alumnos.php");


class AlumnoController
{
    public function MostrarAlumnos()
    {
        $Alumno = new Alumno();
        $data = $Alumno->allAlumnos();
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }
   
}

?>