<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Materia {

    public function allMaterias(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM materias ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    
    }


    
    public function createMateria($data)
    {
        $nombre_materia = $data["nombre_materia"];
        
        try {
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("INSERT INTO materias(id_materia,  nombre_materia) VALUES (NULL, '$nombre_materia')");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteMateria($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("DELETE FROM materias WHERE id_materia = $id ");

        return true;
    }

}
?>