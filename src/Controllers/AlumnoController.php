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
        $Alumno = new Alumno();
        $newAlumno = $Alumno->createAlumno($data);

        if ($newAlumno) {
            header("Location: /alumnos");
        } else {
            header("Location: /index.php?success=0");
        }
    }
   
}

?>