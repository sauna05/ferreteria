
<?php

class Username_control
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $verificar = $this->userModel->verificar($usuario, $contrasena);
            if (count($verificar) > 0) {
                if (password_verify($_POST["contrasena"], $verificar["contrasena"])) {
                    $_SESSION['usuario'] = $verificar;
                    header('Location: inicio');
                } else {
                    $error = 'Datos incorrectos';
                    require 'app/view/login.php';
                }
            } elseif (count($verificar) == 0) {
                $error = 'Usuario no encontrado <br> Registrate para poder acceder <a href="Registrar_persona">Registrarse</a>';
                require 'app/view/login.php';
            }
        } else {
            require 'app/view/login.php';
        }
    }

    public function Registrar_persona()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los valores del formulario
        $nombre = $_POST['nombre'];
        $documento = $_POST['documento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $id_documento = $_POST['id_documento'];
        $id_ciudad = $_POST['id_ciudad'];
        $idgenero = $_POST['idgenero'];
        $estado = $_POST['estado'];
       
        
    } else {
        // Si el método de solicitud no es POST, puedes redirigir o mostrar un mensaje de error.
        echo "Error: El formulario debe ser enviado por POST.";
    }
}
}

?>

