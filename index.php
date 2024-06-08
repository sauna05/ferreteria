<?php
session_start();
require_once 'config/Conexion.php';
require_once 'app/controller/Username_control.php';
require_once 'app/model/User.php';

$userModel = new User();
$index_contro= new Username_control($userModel);
$reuqest=$_SERVER['REQUEST_URI'];

switch($reuqest){
        case '/ferreteria/':
            if (!isset($_SESSION["usuario"])) {
            
                $index_contro->login();
                return;
            }

        case '/ferreteria/inicio':
            $index_contro->login();
            break;
        case '/ferreteria/Registrar_persona':
            $index_contro->Registrar_persona();
            break;
        


}








?>