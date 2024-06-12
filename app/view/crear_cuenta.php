<?php
require_once 'config/Conexion.php';

    $conexion = new Conexion();
    $conn = $conexion->conectar();
    $query = "SELECT * FROM ttiposdoc";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    // Obtener todos los documento de la tabla ttiposdoc
    $documentos = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $conexion = new Conexion();
    $conn = $conexion->conectar();
    $query = "SELECT * FROM tgeneros";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    // Obtener todos los documento de la tabla ttiposdoc
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $conexion = new Conexion();
    $conn = $conexion->conectar();
    $query = "SELECT * FROM ciudad";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    // Obtener todos los documento de la tabla ttiposdoc
    $ciudades = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/cuenta.css">
</head>
<body>
    <div class="contendio">
        <form action="index.php?action=crear" method="POST">
            <label for="">Nombre completo</label>
            <br>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" require>
            <br>
            <select name="id_documento" id="documento">
                <option value="">Tipo de documento</option>
                <?php foreach ($documentos as $documento): ?>
                    <option value="<?php echo $documento['ID']; ?>"><?php echo $documento['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="">Documento</label>
             <br>
            <input type="text" name="documento" placeholder="" required>
            <br>
            <label for="">Direccion</label>
            <br>
            <input type="text" name="direccion" placeholder="" required>
            <br>
            <label for="">Telefono</label>
            <br>
            <input type="text" name="telefono" placeholder="" required>
            <br>
            <select name="IDgenero" id="documento">
                <option value="">Selecciona genero</option>
                <?php foreach ($generos as $genero): ?>
                    <option value="<?php echo $genero['ID']; ?>"><?php echo $genero['genero']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="estado" id="estado">
                <option>Estado de la persona</option>
                <option value="1">activo</option>
                <option value="0">Inactivo</option>
            </select>
            <br>
            <select name="id_ciudad" id="documento">
                <option value="">Selecciona ciudad</option>
                <?php foreach ($ciudades as $ciudad): ?>
                    <option value="<?php echo $ciudad['ID']; ?>"><?php echo $ciudad['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <br>

           
            <input type="submit" value="Siguiente" style="cursor: pointer;"> 

             </input>


        </form>

    </div>
    
</body>
</html>