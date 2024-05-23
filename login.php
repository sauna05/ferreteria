<?php 
session_start();
require 'conexion.php';
class login{
    public static function autenticar($email,$contrasena){
        try{
            $conexion = new Conexion();
            $consulta='SELECT id from usuarios where email = :email and contrasenia=:contrasenia';
            $stm=$conexion->conexion->prepare($consulta);
            $stm->bindParam(':email',$email);
            $stm->bindParam(':contrasenia',$contrasena);
            $stm->execute();
            if($verificar_usuario = $stm->fetch(PDO::FETCH_ASSOC)){
                //almacenar en una variable sesion el id del usuario
                 $_SESSION['id_usuario']=$verificar_usuario['id'];
            }
            return true;

        }catch(PDOException $ex){
            echo $ex->getMessage();
            return false;
        }
         

    }
}

//traer los datos del formulario mediante la solicitud del cliente al servidor mediante el metodo post

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $contrasenia=$_POST['contrasenia'];
    if(login::autenticar($email,$contrasenia)){
        header('location:principal.php');
        exit;
    }
    else{
        echo 'error en las credenciales';

    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de sesion</title>
    <link rel="stylesheet" href="login_styles.css">
</head>
<body>
    <div class="login">
        <form action="" method="post">
          <div class="user">
            <label for=""> Email </label>
            <input type="email" name="email" placeholder="su email " require>
          </div>
          <div class="pass">
            <label for="">Contraseña </label>
            <input name="contrasenia" type="password" placeholder="su contraseña" require>
            <input type="submit" value="Iniciar sesion">

          </div>
        </form>

    </div>
</body>
</html>