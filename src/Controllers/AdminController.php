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
        header("Location: /src/views/Perfil.php ");
    }

 

}


?>