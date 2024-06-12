<?php
require_once 'config/Conexion.php';
 //llnear rol
 $conexion = new Conexion();
 $conn = $conexion->conectar();
 $query = "SELECT * FROM troles";
 $stmt = $conn->prepare($query);
 $stmt->execute();
 // Obtener todos los documento de la tabla ttiposdoc
 $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="public/usuario.css">
</head>
<body>
    <form action="index.php?action=asignar_usuario" method="POST">
    <select name="IDrol" >
            <option value="">Asignar rol</option>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?php echo $rol['ID']; ?>"><?php echo $rol['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
             <label for="">Nombre Usuario</label>
             <br>
            <input type="text" name="usuario" placeholder="usuario" required>
            <br>
            <label for="">Contrasenia</label>
             <br>
            <input type="password" name="contrasenia" placeholder="Ingrese una contrasenia" required>
            <br>
            <input type="submit" value="Crear usuario">
            
    </form>
    
</body>
</html>