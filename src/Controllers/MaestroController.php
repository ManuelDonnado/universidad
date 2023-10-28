<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Maestros.php");


class MaestroController
{
    public function mostrarMaestros()
    {
        $maestro = new Maestro();
        $data = $maestro->allMaestros();
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
    }

    public function addMaestro($data)
    {
        $maestro = new Maestro();
        $newMaestro = $maestro->createMaestro($data);

        if ($newMaestro) {
            header("Location: /view_maestros");
        } else {
            header("Location: /index.php?success=0");
        }
    }   
}

?>