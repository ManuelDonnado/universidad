<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Clase {

    public function allClases(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT cl.*, ma.nombre_materia, CONCAT ( us.nombre,' ', us.apellido) as maestro FROM clases as cl
                                   INNER JOIN materias as ma ON cl.id_materia = ma.id_materia
                                   INNER JOIN usuarios as us ON cl.id_maestro = us.id_usuario");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    
    }

    public function allMateriasDisponibles(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM materias ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function allMaestrosDisponibles(){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.id_usuario, CONCAT ( us.nombre,' ', us.apellido) as maestro FROM usuarios as us
                                    WHERE id_rol = 2 AND us.id_usuario NOT IN (SELECT id_maestro FROM clases) ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    
    public function createClase($data)
    {
        $id_materia = $data["id_materia"];
        $id_maestro = $data["id_maestro"];
        
        // $alumnos_inscriptos 
        

        try {
            $db = new Database();
            $connection = $db->connect();
            $res = $connection->query("INSERT INTO clases(id_clase, id_materia, id_maestro, alumnos_inscritos) VALUES (NULL, '$id_materia', '$id_maestro', 0)");

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteClases($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("DELETE FROM clases WHERE id_clase = '$id' ");

        return true;
    }
}
?>