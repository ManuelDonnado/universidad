<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Permiso {

    public function allPermisos(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.id_usuario, us.correo, us.estatus, r.nombre_rol FROM usuarios as us 
        INNER JOIN roles as r ON us.id_rol = r.id_rol 
        ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;   
    }


    public static function findPermiso($id)
    {
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM usuarios WHERE id_usuario = '$id' ;");
        $data = $res->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function updatePermiso($data)
    {
        $id_usuario = $data["id_usuario"];
        $correo = $data["correo"];
        $id_rol = $data ['id_rol'];
        $estatus = $data["estatus"];

      
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("UPDATE usuarios  set  correo = '$correo', id_rol = '$id_rol', estatus = '$estatus'  where id_usuario = $id_usuario"); 
            
            if ($res) {
                return true;
            } else {
                return false;
            }
    }

    public function allRoles(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM roles ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;   
    }
}?>