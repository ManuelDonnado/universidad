<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Alumno {

    public function allAlumnos(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios WHERE id_rol = 3 ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    
    }


    
    public function createAlumno($data)
    {
        $matricula = $data["matricula"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $password = $data ['password'];
        $direccion = $data["direccion"];
        $fecha_nacimiento = $data["fecha_nacimiento"];
        

        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("INSERT INTO usuarios(id_usuario, matricula, correo, password, nombre, apellido,direccion, fecha_nacimiento, estatus, id_rol) VALUES (NULL, '$matricula', '$correo', '$hash','$nombre', '$apellido', '$direccion','$fecha_nacimiento', 1,3)");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function updateAlumno($data)
    {
        $id_usuario = $data["id_usuario"];
        $nombre = $data["nombre"];
        $apellido = $data["apellido"];
        $correo = $data["correo"];
        $password = $data ['password'];
        $direccion = $data["direccion"];
        $fecha_nacimiento = $data["fecha_nacimiento"];

        if(empty($password)){
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("UPDATE usuarios  set nombre = '$nombre', apellido = '$apellido', correo = '$correo', direccion = '$direccion', fecha_nacimiento = '$fecha_nacimiento'  where id_usuario = $id_usuario"); 
        }else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("UPDATE usuarios  set nombre = '$nombre', apellido = '$apellido', correo = '$correo', password = '$hash', direccion = '$direccion', fecha_nacimiento = '$fecha_nacimiento'  where id_usuario = $id_usuario");  
        }  
        if ($res) {
            return true;
        }
    }

    public static function findAlumno($id)
    {
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios WHERE id_usuario = '$id';");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }


    public function calificacionesAlumnos($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT ca.comentarios,  if(ca.calificacion IS NULL,'Sin Asignar', ca.calificacion) as calificacion, ma.nombre_materia, CONCAT( us.nombre, ' ', us.apellido) as maestro    
        FROM clases_alumnos as ca 
        INNER JOIN clases as cl ON ca.id_clase = cl.id_clase
        INNER JOIN materias as ma ON cl.id_materia = ma.id_materia
        INNER JOIN usuarios as us ON cl.id_maestro = us.id_usuario
        WHERE ca.id_alumno = '$id' ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    
    }

    public function claseInscritaAlumno($id) {
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query(" SELECT ca.id_clase_alumno, ma.nombre_materia, CONCAT( us2.nombre, ' ', us2.apellido) AS maestro
        FROM clases_alumnos AS  ca
        INNER JOIN usuarios AS us ON ca.id_alumno = us.id_usuario
        INNER JOIN clases AS cl ON ca.id_clase = cl.id_clase
        INNER JOIN materias AS ma ON cl.id_materia = ma.id_materia
        INNER JOIN usuarios AS us2 ON cl.id_maestro = us2.id_usuario
        WHERE ca.id_alumno = '$id' ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function clasesDisponibles($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query(" SELECT cl.id_clase, ma.nombre_materia, CONCAT( us2.nombre, ' ', us2.apellido) AS maestro
        FROM clases AS cl 
        INNER JOIN materias AS ma ON cl.id_materia = ma.id_materia
        INNER JOIN usuarios AS us2 ON cl.id_maestro = us2.id_usuario
        WHERE ma.id_materia NOT IN (SELECT cl2.id_materia FROM clases_alumnos AS ca 
        INNER JOIN clases AS cl2 ON ca.id_clase = cl2.id_clase
        WHERE ca.id_alumno = '$id') ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }

    public function deleteUsuario($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("DELETE FROM usuarios WHERE id_usuario = $id ");

        return true;
    }

    public function agregarClaseAlumno($idClase, $id)
    {
        try {
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("INSERT INTO clases_alumnos(id_clase, id_alumno) VALUES ( '$idClase', '$id')");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteClasesAlumnos($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("DELETE FROM clases_alumnos WHERE id_clase_alumno = '$id' ");

        return true;
    }

}
?>