<?php 
class Conexion{
    public $url='mysql:host=localhost;dbname=db_ferreteria';
    public $usuario='root';
    public $contrasenia='';
    public $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO($this->url,$this->usuario,$this->contrasenia);
            echo" se conecto al baase de datos";
        }catch(PDOException $ex){
           echo $ex->getMessage();
        }
    }
}
