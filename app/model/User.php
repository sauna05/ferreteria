<?php
class User
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->db = $conexion->getDb();
    }

    public function getusuarios()
    {
       $query = "SELECT * FROM ttrabajadores";
         $result = $this->db->query($query);
         return $result->fetchAll(PDO::FETCH_ASSOC);
     }

     public function verificar($usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM ttrabajadores WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    public function Registrar_persona($nombre,$id_documento,$documento,$direccion,$telefono,$idgenero,$id_ciudad,$estado){
        $stmt=$this->db->prepare("INSERT INTO tpersonas
         (:nombre,:id_documento,:documento,:direccion,:telefono,:idgenero,:id_ciudad,:estado)
          values(nombre,id_documento,documento,direccion,telefono,idgenero,id_ciudad,estado)");
          $stmt->bindParam(':nombre',$nombre);
          $stmt->bindParam(':id_documento',$id_documento);
          $stmt->bindParam(':documento',$documento);
          $stmt->bindParam(':direccion',$direccion);
          $stmt->bindParam(':telefono',$telefono);
          $stmt->bindParam(':idgenero',$idgenero);
          $stmt->bindParam(':id_ciudad',$id_ciudad);
          $stmt->bindParam(':estado',$estado);
          $stmt->execute();
          $personas=$stmt->fetch(PDO::FETCH_ASSOC);
          return $personas;

    }

    // public function Verificar_usuario($nombre_usuario, $contrasena)
    // {
    //     $consulta = "SELECT * FROM personas WHERE nombre_usuario = :nombre_usuario AND contrasena = :contrasena";
    //     $stmt = $this->db->prepare($consulta);
    //     $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    //     $stmt->bindParam(':contrasena', $contrasena);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
}