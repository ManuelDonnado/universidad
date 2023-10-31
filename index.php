<?php 
require_once(__DIR__ . "/src/Controllers/LoginController.php");
require_once(__DIR__ . "/src/Controllers/AlumnoController.php");
require_once(__DIR__ . "/src/Controllers/PermisoController.php");
require_once(__DIR__ . "/src/Controllers/MaestroController.php");
require_once(__DIR__ . "/src/Controllers/MateriaController.php");
require_once(__DIR__ . "/src/Controllers/ClaseController.php");


$fullUrl = $_SERVER["REQUEST_URI"];
$url = explode("?", $fullUrl);

$loginController = new LoginController();
$alumnoController = new AlumnoController();
$permisoController = new PermisoController();
$maestroController = new MaestroController();
$materiaController = new MateriaController();
$claseController = new ClaseController();

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
        case "/create_materia":
            $materiaController->addMateria($_POST);
            break;
        case "/create_clase":
            $claseController->addClase($_POST);
            break;  
        case "/update_alumno":
            $alumnoController->modifyAlumno($_POST);
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
        case "/view_alumnos":
            $alumnoController->mostrarAlumnos();
            break;
        case "/view_permisos":
            $permisoController->mostrarPermisos();
            break;    
        case "/view_maestros":
            $maestroController->mostrarMaestros();
            break;   
        case "/view_materias":
            $materiaController->mostrarMaterias();
            break;   
        case "/view_clases":
            $claseController->mostrarClases();
            break;
        case "/edit_alumno":
            $alumnoController->editAlumno($_GET["id_alumno"]);
            break;

        case "/borrar_alumno":
            $alumnoController->borrarAlumno($_GET["id_alumno"]);
            break;  
        case "/borrar_maestro":
            $maestroController->borrarMaestro($_GET["id_maestro"]);
            break;  
        case "/borrar_materia":
            $materiaController->borrarMateria($_GET["id_materia"]);
            break; 
        case "/borrar_clase":
            $claseController->borrarClase($_GET["id_clase"]);
            break; 
        case "/borrar_clase_alumno":
            $alumnoController->borrarClaseAlumno($_GET["id_clase_alumno"]);
            break; 

        case "/view_calificaciones":
            $alumnoController->vercalificacionesAlumnos();
            break;

        case "/view_clases_alumno":
                $alumnoController->verClasesAlumno();
                break;    
        case "/agregar_clase":
            $alumnoController->agregarClases($_GET["id_clase"]);
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