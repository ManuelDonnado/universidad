<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Usuario {

    public function all(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }

    public function getByEmail($correo, $password)
    {   
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.*, r.nombre_rol FROM usuarios as us 
                                   INNER JOIN roles as r ON us.id_rol = r.id_rol 
                                   WHERE us.correo = '$correo'");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    


}
?>