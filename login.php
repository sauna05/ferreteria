<?php 
session_start();
require 'conexion.php';
class login{
    public static function autenticar($email,$contrasenia){
        try{
            $conexion = new Conexion();
            $consulta='SELECT usuarioID from usuarios where email = :email and contrasenia=:contrasenia';
            $stm=$conexion->conexion->prepare($consulta);
            $stm->bindParam(':email',$email);
            $stm->bindParam(':contrasenia',$contrasenia);
            $stm->execute();
            $usuario=$stm->fetch(PDO::FETCH_ASSOC);
            if($usuario){
                $_SESSION['usuarioID']=$usuario['usuarioID'];
            }
            return true;
        }catch(PDOException $ex){
            
            echo $ex->getMessage();
        }
         
    }
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $correo=$_POST['email'];
    $contrasena=$_POST['contrasenia'];
    if(login::autenticar($correo,$contrasena)){
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
<body>
    <div class="login-container">
        <form method="post" class="login-form">
            <h2>Iniciar Sesión</h2>
            <label >Email:</label>
            <input type="text" name="email" placeholder="ingrese su email" required>
            <label for="password">Contraseña:</label>
            <input  type="password" placeholder="Ingrese su contraseña"  name="contrasenia" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</body>
</html>