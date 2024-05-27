<?php 
require 'conexion.php';
class Model_producto{
    public $nombre;
    public $descripcion;
    public $precio;
    public $cantidadinventario;
    public $estado_id;
    public $categoria_id;

    public static function agregar_producto($nombre,$descripcion,$precio,$cantidadinventario,$estado_id,$categoria_id){
        try{

            $conexion = new Conexion();
            $sql_insert='INSERT INTO productos (nombre,descripcion,precio,cantidadinventario,EstadoId,categoriaId)
            VALUES(:nombre,:descripcion,:precio,:cantidadinventario,:EstadoId,:categoriaId)';
            $stm=$conexion->conexion->prepare($sql_insert);
            $stm->bindParam(':nombre',$nombre);
            $stm->bindParam(':descripcion',$descripcion);
            $stm->bindParam(':precio',$precio);
            $stm->bindParam(':cantidadinvetario',$cantidadinventario);
            $stm->bindParam(':EstadoId',$estado_id);
            $stm->bindParam(':categoriaId',$categoria_id);
            $stm->execute();

        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

}

//agregar controlador 
//traer los valores del formulario
if(!isset($_SERVER['REQUEST_METHOD'])=='post')
   $nombre=$_POST['nombre'];
   $descripcion=$_POST['descripcion'];
   $precio=$_POST[''];
   $cantidadinventario=$_POST[''];
   $estado_id=$_POST[''];
   $categoria_id=$_POST[''];
  //agregar los productos ala base de datos
   Model_producto::agregar_producto($nombre,$descripcion,$precio,$cantidadinventario,$estado_id,$categoria_id);
   header('location:');
   exit;

?>