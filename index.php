<?php 
require_once(__DIR__ . "/src/Controllers/LoginController.php");
require_once(__DIR__ . "/src/Controllers/AlumnoController.php");
require_once(__DIR__ . "/src/Controllers/PermisoController.php");
require_once(__DIR__ . "/src/Controllers/MaestroController.php");

$fullUrl = $_SERVER["REQUEST_URI"];
$url = explode("?", $fullUrl);

$loginController = new LoginController();
$alumnoController = new AlumnoController();
$permisoController = new PermisoController();
$maestroController = new MaestroController();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($url[0]) {
        case "/login":
            $loginController->login($_POST);
            break;
        case "/create_alumno":
            $alumnoController->addAlumno($_POST);
            break;
        case "/create_maestro":
            $maestroController->addMaestro($_POST);
            break;
           
        default:
        echo "no encontramos la url 1";
            break;
    }

}

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    switch ($url[0]) {
        case "/index.php":
            $loginController->index();
            break;
        case "/alumnos":
            $alumnoController->mostrarAlumnos();
            break;
        case "/view_permisos":
            $permisoController->mostrarPermisos();
            break;    
        case "/view_maestros":
            $maestroController->mostrarMaestros();
            break;    
    



            case "/logout":
                $loginController->logout();
                break;        
           
        default:
        echo "no encontramos la url 2";
            break;
    }
    
    if($url[0] === "/dashboard"){

    }
    
  
}
?>