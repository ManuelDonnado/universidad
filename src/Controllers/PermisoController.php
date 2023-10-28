<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Permisos.php");


class PermisoController
{
    public function mostrarPermisos()
    {
        $permiso = new Permiso();
        $data = $permiso->allPermisos();
       // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_permisos.php";
    }

   
}

?>