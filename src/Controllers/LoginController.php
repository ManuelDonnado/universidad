<?php  
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/Models/usuarios.php");



class LoginController {
    public function index () {
        include $_SERVER["DOCUMENT_ROOT"] . "/src/views/login.php";
    }

    public function login ($request) {
        $LoginController = new Usuario();
        $login = $LoginController->getByEmail($request["correo"]);
        $passIngresada = $request["password"];
        $not = '';

        if ($login === false) {
            $not = "El correo y la contraseña son incorrectos";
        }   else {
            /*session_start();
                    $_SESSION["user"] = $login;
            header("Location: /src/views/dashboard.php");  */
            if (password_verify($passIngresada,$login["password"])) {
                if ($login["estatus"] === 1) {
                    session_start();
                    $_SESSION["user"] = $login;
                    header("Location: /src/views/dashboard.php");  
                } else{
                    $not = "Usuario Inactivo, valida tu información con el administrador";
                    header("Location: /index.php"); 
                }    
            } else{
                $not = "Contraseña incorrecta, valida tu información";
                header("Location: /index.php"); 
            }   
        }
    
    }

    public function logout () {
        session_start();

        session_destroy();
        header("location: /index.php");
    }
}

?>