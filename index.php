<?php 
require_once(__DIR__ . "/src/Controllers/LoginController.php");
require_once(__DIR__ . "/src/Controllers/AlumnoController.php");

$fullUrl = $_SERVER["REQUEST_URI"];
$url = explode("/", $fullUrl);
//var_dump($url);

$controller = new LoginController();
$alumnoController = new AlumnoController();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($url[1]) {
        case "login":
            $controller->login($_POST);
            break;
        
        default:
        echo "no encontramos la url 1";
            break;
    }

}

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if($url[1] == "index.php"){
        $controller->index();
    } 

    if($url[2] === "dashboard"){

    }
    
    if($url[4] == "view_alumnos"){
        $alumnoController->MostrarAlumnos();
    } 

}


?>