<?php 
session_start();

$id_usuario=$_SESSION['usuarioID'];
echo $id_usuario;

echo 'hola Bienvenido lograste iniciar sesion';


?>