<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Admin {


public static function updateUsuario($data)
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

    public function getInfoUsuario($id)
    {   
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.*, r.nombre_rol FROM usuarios as us 
                                   INNER JOIN roles as r ON us.id_rol = r.id_rol 
                                   WHERE us.id_usuario = '$id'");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

}
?>