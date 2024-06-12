<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public/stylos_login.css">
</head>
<body>
    
    <form action="index.php?action=logiar" method="POST">
        <div class="container-form">
        <h2>Login</h2>
        <label for="username">Usuario:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
        <br>
        <a href="index.php?action=vista">crea tu cuenta de usuario</a>

        </div>
   
    </form>
</body>
</html>