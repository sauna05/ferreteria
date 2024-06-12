<?php

require_once 'config/Conexion.php';

class UserModel{

    public function Crear_cuenta($nombre, $id_documento, $documento, $direccion, $telefono, $id_genero, $estado, $id_ciudad) {
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $sql_insert = 'INSERT INTO tpersonas (nombre, id_documento, documento, direccion, telefono, IDgenero, estado, id_ciudad) 
        VALUES (:nombre, :id_documento, :documento, :direccion, :telefono, :IDgenero, :estado, :id_ciudad)';
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_documento', $id_documento, PDO::PARAM_INT);
        $stmt->bindParam(':documento', $documento);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':IDgenero', $id_genero, PDO::PARAM_INT);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }
    public function login($username, $password) {
        $conexion = new Conexion();
        $conn = $conexion->conectar();

        $query = "SELECT * FROM ttrabajadores WHERE usuario = :usuario AND contrasenia = :contrasenia";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':usuario', $username);
        $stmt->bindParam(':contrasenia', $password);
        $stmt->execute();
        $credenciales=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $credenciales;

    }

    public function Crear_usuario($IDrol,$IDpersona,$usuario,$contrasenia){
           $conexion = new Conexion();
           $conn=$conexion->conectar();
           $insert_usuario="INSERT INTO ttrabajadores (IDrol,IDpersona,usuario,contrasenia) 
           VALUES(:IDrol,:IDpersona,:usuario,:contrasenia)";
           $stm=$conn->prepare($insert_usuario);
           $stm->bindParam(':IDrol',$IDrol, PDO::PARAM_INT);
           $stm->bindParam(':IDpersona',$IDpersona);
           $stm->bindParam(':usuario',$usuario);
           $stm->bindParam(':contrasenia',$contrasenia);
           $stm->execute();

           return true;
    }    
    
    public function getID(){
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $sqlID = "SELECT MAX(id) AS max_id FROM tpersonas";
        $stm = $conn->prepare($sqlID);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result['max_id']; // Devuelve el valor del ID máximo
    }

    

    
    
}