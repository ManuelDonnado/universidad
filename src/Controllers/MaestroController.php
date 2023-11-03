<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Maestros.php");


class MaestroController
{
    public function mostrarMaestros()
    {
        $maestro = new Maestro();
        $data = $maestro->allMaestros();
        $notification = '';
        $tipo = '';
        // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
    }

    public function addMaestro($data)
    {
        $maestro = new Maestro();
        $newMaestro = $maestro->createMaestro($data);
        $data = $maestro->allMaestros();

        if ($newMaestro) {
            $notification = "Maestro Creado Correctamente";
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
        } else {
            $notification = "Maestro No se pudo Crear";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
        }
        
    }  
    
    public function borrarMaestro($id){
        $dltMaestro = new Alumno();
        $maestro = new Maestro();
        $valida = $dltMaestro->validaMaestroDelete($id);
        
        if (empty($valida)) {
            $dataDlt = $dltMaestro->deleteUsuario($id);
            $data = $maestro->allMaestros();
                
            if ($dataDlt) {
                $notification = 'Maestro Eliminado Correctamente';
                $tipo = 'C';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
            } else {
                $notification = "Maestro No se pudo Eliminar";
                $tipo = 'I';
                include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
            }   
        } else {
            $data = $maestro->allMaestros();
            $notification = "El Maestro no se puede eliminar por que ya tiene una clase asignada";
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php"; 
        }    

            
    }

    public function modifyMaestro($request)
    {
        $maestro = new Maestro();
        $updateMaestro = $maestro->updateMaestro($request);
        $data = $maestro->allMaestros();

        if ($updateMaestro) {
            $notification = 'Maestro ' . $request['nombre'] . ' Modificado Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
        } else {
            $notification ='Maestro ' . $request['nombre'] . 'no se pudo Modificar';
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_maestros.php";
        }
    }

    public function editMaestro($id)
    {
        $maestro = new Maestro();
        $maestroInfo = $maestro->findMaestro($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/update_maestros.php";
    }

}

?>