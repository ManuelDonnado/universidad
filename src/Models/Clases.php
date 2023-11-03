<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DataBase.php");

class Clase {

    public function allClases(){
        $db = new Database();
        $connection = $db->connect();
        $totAsistencia = $connection->query("UPDATE  clases AS cl SET  cl.alumnos_inscritos = (SELECT COUNT(id_alumno) FROM clases_alumnos AS ca WHERE  cl.id_clase = ca.id_clase) ");

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

    public static function findClase($id)
    {
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT * FROM clases WHERE id_clase = '$id'  ;");
        $data = $res->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function updateClase($data)
    {
        $id_clase = $data["id_clase"];
        $id_materia = $data["id_materia"];
        $id_maestro = $data ["id_maestro"];
    
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("UPDATE clases  set  id_materia = '$id_materia', id_maestro = '$id_maestro'  where id_clase = $id_clase"); 
        
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function allMaestrosDisponiblesEdit($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT us.id_usuario, CONCAT ( us.nombre,' ', us.apellido) as maestro FROM usuarios as us
                                    WHERE id_rol = 2 AND ((us.id_usuario NOT IN (SELECT id_maestro FROM clases WHERE id_maestro NOT IN ('$id'))) OR (us.id_usuario = '$id')) ");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    public function allAlumnosClases($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT ca.*, ma.nombre_materia, CONCAT ( al.nombre,' ', al.apellido) as alumno FROM clases_alumnos as ca
                                   INNER JOIN usuarios as al ON al.id_usuario = ca.id_alumno
                                   INNER JOIN clases as cl ON cl.id_clase = ca.id_clase
                                   INNER JOIN materias as ma ON ma.id_materia = cl.id_materia
                                   INNER JOIN usuarios as us ON us.id_usuario = cl.id_maestro
                                   WHERE us.id_usuario = '$id'");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    
    }
    public function claseMaestro($id){
        $db = new Database();
        $connection = $db->connect();
        $res = $connection->query("SELECT ma.nombre_materia FROM clases as cl 
                                   INNER JOIN materias as ma ON ma.id_materia = cl.id_materia
                                   INNER JOIN usuarios as us ON us.id_usuario = cl.id_maestro
                                   WHERE us.id_usuario = '$id'");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    
    }

}
?>