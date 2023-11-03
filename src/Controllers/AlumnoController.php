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
        $data = $alumno->allAlumnos();

        if ($newAlumno) {
            $notification = "Alumno Creado Correctamente";
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
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
        $data = $alumno->allAlumnos();

        if ($updateAlumno) {
            $notification = 'Alumno ' . $request['nombre'] . ' Modificado Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        } else {
            $notification ='Alumno ' . $request['nombre'] . 'no se pudo Modificar';
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
        }
    }

    public function editAlumno($id)
    {
        $alu = new Alumno();
        $alumno = $alu->findAlumno($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/update_alumnos.php";
    }

    public function  vercalificacionesAlumnos()
    {
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $calificacion = new Alumno();
        $data = $calificacion->calificacionesAlumnos($id);
        $notification = '';
        $tipo = '';
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_calificaciones.php";
    }

    public function verClasesAlumno(){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);
        $notification = '';
        $tipo = '';
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
    }

    public function borrarAlumno($id){
        $dltAlumno = new Alumno();
        $valida = $dltAlumno->validaUsuarioDelete($id);
        
        if (empty($valida)) {
            $dataDlt = $dltAlumno->deleteUsuario($id);
            $data = $dltAlumno->allAlumnos();

            if ($dataDlt) {
                $notification = 'Alumno Eliminado Correctamente';
                $tipo = 'C';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
            } else {
                $notification = "Alumno No se pudo Eliminar";
                $tipo = 'I';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
            }   
        } else {
            $data = $dltAlumno->allAlumnos();
            $notification = "El alumno no se puede eliminar por que ya tiene clases asignadas";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php"; 
        }
    }

    public function agregarClases($idClase){
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $claseAlumno = new Alumno();
        $addClase = $claseAlumno->agregarClaseAlumno($idClase,$id);
        $data = $claseAlumno->claseInscritaAlumno($id);
        $dataDis = $claseAlumno->clasesDisponibles($id);
        if ($addClase) {
            $notification = 'Clase Agregada Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } else {
            $notification = "Clase No se pudo Agregar";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        }     
    }

    public function borrarClaseAlumno($id){
        session_start();
        $user = $_SESSION["user"];
        $idAlumno =  $user['id_usuario']; 
        $dltClaseAlumno = new Alumno();
        $dataDlt = $dltClaseAlumno->deleteClasesAlumnos($id);
        $data = $dltClaseAlumno->claseInscritaAlumno($idAlumno);
        $dataDis = $dltClaseAlumno->clasesDisponibles($idAlumno);
        if ($dataDlt) {
            $notification = 'Clase Eliminada Correctamente';
            $tipo = 'C';    
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } else {
            $notification = "Clase No se pudo Eliminar";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/alumno/view_clases_alumno.php";
        } 
    }
}

?>