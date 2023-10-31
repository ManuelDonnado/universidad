<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/Admin.php");

class AdminController{
    public function modifyUsuario($request)
    {   
        session_start();
        $user = $_SESSION["user"];
        $id =  $user['id_usuario']; 
        $admin = new Admin();
        $updateAdmin = $admin->updateUsuario($request);
        $_SESSION["user"] = $admin->getInfoUsuario($id);

        if ($updateAdmin) {
            header("Location: /src/views/Perfil.php ");
        }
    }

    public function editUsuario($id)
    {
        $alumno = new Alumno();
        $data = $alumno->allAlumnos();
        $infoAlumno = $alumno->findAlumno($id);

        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/admin/view_alumnos.php";
    }

}


?>