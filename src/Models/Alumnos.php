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


}
?>