<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Materias.php");


class MateriaController
{
    public function mostrarMaterias()
    {
        $materia = new Materia();
        $data = $materia->allMaterias();
        $notification = '';
        $tipo = '';
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
    }

    public function addMateria($data)
    {
        $materia= new Materia();
        $newMateria = $materia->createMateria($data);
        $data = $materia->allMaterias();

        if ($newMateria) {
            $notification = "Materia Creada Correctamente";
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
        } else {
            $notification = "Materia No se pudo Crear";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
        }
    }

    public function borrarMateria($id){
        $dltMateria = new Materia();
        $valida = $dltMateria->validaMateriaDelete($id);

        if (empty($valida)) {
            $dataDlt = $dltMateria->deleteMateria($id);
            $data = $dltMateria->allMaterias();
            if ($dataDlt) {
                $notification = 'Materia Eliminada Correctamente';
                $tipo = 'C';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
            } else {
                $notification = "Materia No se pudo Eliminar";
                $tipo = 'I';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php";
            }   
        } else {
            $data = $dltMateria->allMaterias();
            $notification = "La materia no se puede eliminar por que ya esta asignada a una clase.";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_materias.php"; 
        }
    }


}

?>