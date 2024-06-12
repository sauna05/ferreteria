<?php
require_once 'app/model/UserModel.php';
require_once 'app/controller/UserController.php';
require_once 'config/Conexion.php';

$userController = new UserController();

// Verificar si se solicita alguna acción
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch($action) {
        case 'logiar':
            // Autenticar al usuario
            $userController->autenticar();
            break;

        case 'vista':
            // enviar al formulario de crear cuenta
            $userController->View_crear();
            break;


        case 'crear':
            // Crear cuenta de usuario
            $userController->Crear_cuenta();
            break;

        case 'asignar_usuario':
            // Crear cuenta de usuario
            $userController->asignar_usuario();
            break;
        
                
        default:
            // Manejar acción desconocida
            echo "Acción desconocida";
            break;
    }
} else {
    //por defecto se vera el login
   
    require_once 'app/view/login.php';
    
}
?>