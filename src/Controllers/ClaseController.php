<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Clases.php");


<<<<<<< HEAD

=======
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
class ClaseController
{
    public function mostrarClases()
    {
        $clase = new Clase();
        $data = $clase->allClases();
        $materias = $clase->allMateriasDisponibles();
        $maestros = $clase->allMaestrosDisponibles();
        // var_dump($data)
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
    }

    public function addClase($data)
    {
        $clase = new Clase();
        $newClase = $clase->createClase($data);

        if ($newClase) {
            header("Location: /view_clases");
        } else {
            header("Location: /index.php?success=0");
        }
    }

    public function borrarClase($id){
        $dltClase = new Clase();
        $dataDlt = $dltClase->deleteClases($id);
        $data = $dltClase->allClases();

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_clases.php";
    }
<<<<<<< HEAD

    public function modifyClase($request)
    {
        $clase = new Clase();
        $updateClase = $clase->updateClase($request);
        $data = $clase->allClases();

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
        foreach ($materias as $mat) {
            $materia = $mat['nombre_materia'];
        }
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/maestro/view_maestro_alumno.php";
    }

=======
>>>>>>> 01cc5dd11aa061f77f7cf6876e26fb43327ce472
}

?>