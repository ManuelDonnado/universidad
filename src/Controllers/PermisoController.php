<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Permisos.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Admin.php");

class PermisoController
{
    public function mostrarPermisos()
    {
        $permiso = new Permiso();
        $data = $permiso->allPermisos();
       // var_dump($data);
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_permisos.php";
    }

    public function modifyPermiso($request)
    {
        $permiso = new Permiso();
        $updatePermiso = $permiso->updatePermiso($request);
        $data = $permiso->allPermisos();

        if ($updatePermiso) {
            $notification = 'Usuario ' . $request['nombre'] . ' Modificado Correctamente';
            $tipo = 'C';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_permisos.php";
        } else {
            $notification ='Usuario ' . $request['nombre'] . 'no se pudo Modificar';
            $tipo = 'I';
            include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_permisos.php";
        }
    }

    public function editPermisos($id)
    {
        $per = new Permiso();
        $permiso = $per->findPermiso($id);
        $roles = $per->allRoles();
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/update_permisos.php ";
    }

   
}

?>