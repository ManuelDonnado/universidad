<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Maestro {

    public function allMaestros(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios WHERE id_rol = 2 ");
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
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("INSERT INTO usuarios(id_usuario, correo, password, nombre, apellido,direccion, fecha_nacimiento, estatus, id_rol) VALUES (NULL, '$correo', '$password','$nombre', '$apellido', '$direccion','$fecha_nacimiento', 1,2)");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}
?>