<?php
class UserController {
    public function autenticar() {
        // Si se envió el formulario de login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            if ($userModel->login($username, $password)) {
                require_once 'app/view/inicio.php';

                exit;
            } else {
      
                echo "<script>alert('Usuario o contraseña incorrectos');</script>";
               
                require_once 'app/view/login.php';
            }
        } 
        
    }
    public function View_crear(){
        require_once 'app/view/crear_cuenta.php';
    }

    public function asignar_usuario(){
        $userModel = new UserModel();
        $IDrol = $_POST['IDrol'];
        $id_persona = $userModel->getID(); // Obtener el ID máximo de tpersonas
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
    
        if($userModel->Crear_usuario($IDrol, $id_persona, $usuario, $contrasenia)){
            echo "<script>alert('Usuario registrado con éxito');</script>";
            require_once 'app/view/login.php';
        }
    }

    public function Crear_cuenta(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $nombre = $_POST['nombre'];
            $id_documento = $_POST['id_documento'];
            $documento= $_POST['documento'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $IDgenero = $_POST['IDgenero'];
            $estado = $_POST['estado'];
            $id_ciudad = $_POST['id_ciudad'];
            
            // Encriptar la contraseña
            //$password_hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $userModel = new UserModel();
            if ($userModel->Crear_cuenta($nombre,$id_documento,$documento,$direccion,$telefono,$IDgenero,$estado,$id_ciudad)) {
                // echo "<script>alert('usuario registrado con exito');</script>";
                require_once 'app/view/crear_usuario.php';
                
            }
            else{
                require_once 'app/view/crear_cuenta.php';
                
            }
                        
    }
    
}
  
}
