<?php  
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/usuarios.php");



class LoginController {
    public function index () {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php";
    }

    public function login ($request) {
        $LoginController = new Usuario();
        $login = $LoginController->getByEmail($request["correo"],$request["password"]);

        if ($login === false) {
            echo "el correo y la contraseña son incorrectos";
            # code...
        }   else {
            if ($login["estatus"] === 1) {
                session_start();
                $_SESSION["user"] = $login;
                header("Location: /src/views/dashboard.php");  
            } else{
                echo "Usuario Inactivo, valida tu información con el administrador";
            }    
        }
    
    }


}

?>