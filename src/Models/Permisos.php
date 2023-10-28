<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Permiso {

    public function allPermisos(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.correo, us.estatus, r.nombre_rol FROM usuarios as us 
        INNER JOIN roles as r ON us.id_rol = r.id_rol 
        ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;   
    }


}
?>