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

    public function addAlumno($data)
    {
        $Alumno = new Alumno();
        $newAlumno = $Alumno->createAlumno($data);

        if ($newAlumno) {
            header("Location: /index.php?success=1");
        } else {
            header("Location: /index.php?success=0");
        }
    }
   
}

?>