<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Clases.php");



class ClaseController
{
    public function mostrarClases()
    {
        $clase = new Clase();
        $data = $clase->allClases();
        $materias = $clase->allMateriasDisponibles();
        $maestros = $clase->allMaestrosDisponibles();
        $notification = '';
        $tipo = '';
        // var_dump($data)
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
    }

    public function addClase($data)
    {
        $clase = new Clase();
        $newClase = $clase->createClase($data);
        $data = $clase->allClases();
        $materias = $clase->allMateriasDisponibles();
        $maestros = $clase->allMaestrosDisponibles();

        if ($newClase) {
            $notification = "Clase Creada Correctamente";
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
        } else {
            $notification = "Clase No se pudo Crear";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
        }
        
    }

    public function borrarClase($id){
        $dltClase = new Clase();
        $valida = $dltClase->validaClaseDelete($id);

        if (empty($valida)) {
            $dataDlt = $dltClase->deleteClases($id);
            $data = $dltClase->allClases();
            $materias = $dltClase->allMateriasDisponibles();
            $maestros = $dltClase->allMaestrosDisponibles();

            if ($dataDlt) {
                $notification = 'Clase Eliminada Correctamente';
                $tipo = 'C';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
            } else {
                $notification = "Clase No se pudo Eliminar";
                $tipo = 'I';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
            }   
        } else {
            $data = $dltClase->allClases();
            $materias = $dltClase->allMateriasDisponibles();
            $maestros = $dltClase->allMaestrosDisponibles();
            $notification = "La clase no se puede eliminar por que ya tiene alumnos inscritos";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php"; 
        }

 
    }

    public function modifyClase($request)
    {
        $clase = new Clase();
        $updateClase = $clase->updateClase($request);
        $data = $clase->allClases();
        $materias = $clase->allMateriasDisponibles();
        $maestros = $clase->allMaestrosDisponibles();

        if ($updateClase) {
            $notification = 'Clase Modificada Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
        } else {
            $notification ='Clase no se pudo Modificar';
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
        }
    }

    public function editClases($id)
    {
        $class = new Clase();
        $clase = $class->findClase($id);
        $materias = $class->allMateriasDisponibles();
        $maestros = $class->allMaestrosDisponiblesEdit($clase["id_maestro"]);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/update_clase.php ";
    }

    public function mostrarAlumnosClase()
    {
        $clase = new Clase();
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $data = $clase->allAlumnosClases($id);
        $materias = $clase->claseMaestro($id);
        $notification = '';
        $tipo = '';
        foreach ($materias as $mat) {
            $materia = $mat['nombre_materia'];
        }
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/maestro/view_maestro_alumno.php";
    }

}

?>