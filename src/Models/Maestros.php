<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Maestro {

    public function allMaestros(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.*, if(ma.nombre_materia IS NULL,'Sin Asignar', ma.nombre_materia) as nombre_materia FROM usuarios as us
                                    LEFT JOIN clases as cl ON us.id_usuario = cl.id_maestro
                                    LEFT JOIN materias as ma ON cl.id_materia = ma.id_materia
                                    WHERE id_rol = 2 ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    
    public function createMaestro($data)
    {
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
            $res = $connection->query("INSERT INTO usuarios(id_usuario, correo, password, nombre, apellido,direccion, fecha_nacimiento, estatus, id_rol) VALUES (NULL, '$correo', '$hash','$nombre', '$apellido', '$direccion','$fecha_nacimiento', 1,2)");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public static function findMaestro($id)
    {
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios WHERE id_usuario = '$id';");
        $data = $res->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function updateMaestro($data)
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
            $res = $connection->query("UPDATE usuarios  set  nombre = '$nombre', apellido = '$apellido', correo = '$correo', direccion = '$direccion', fecha_nacimiento = '$fecha_nacimiento'  where id_usuario = $id_usuario"); 
        }else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("UPDATE usuarios  set  nombre = '$nombre', apellido = '$apellido', correo = '$correo', password = '$hash', direccion = '$direccion', fecha_nacimiento = '$fecha_nacimiento'  where id_usuario = $id_usuario");  
        }  
        if ($res) {
            return true;
        } else {
            return false;
        }
    }




}
?>