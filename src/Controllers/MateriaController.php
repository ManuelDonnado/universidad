<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Materias.php");


class MateriaController
{
    public function mostrarMaterias()
    {
        $materia = new Materia();
        $data = $materia->allMaterias();
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
    }

    public function addMateria($data)
    {
        $materia= new Materia();
        $newMateria = $materia->createMateria($data);

        if ($newMateria) {
            header("Location: /view_materias");
        } else {
            header("Location: /index.php?success=0");
        }
    }

    public function borrarMateria($id){
        $dltMateria = new Materia();
        $dataDlt = $dltMateria->deleteMateria($id);
        $data = $dltMateria->allMaterias();

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
    }
   
}

?>