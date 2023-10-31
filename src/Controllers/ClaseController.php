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
}

?>