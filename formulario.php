<?php
    
    $error = '';
    //VALIDANDO NOMBRE
    if(empty($_POST["nombre"])){
        $error = "Ingresa un Nombre </br>";
    }else{
        $nombre = $_POST["nombre"];
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $nombre = trim($nombre);
        if($nombre==''){
            $nombre .= "El nombre está vacio</br>";
        }
    }
    //VALIDANDO EMAIL
    if(empty($_POST["email"])){
        $error .= "Ingresa un E-mail </br>";
    }else{
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "Ingresa un E-mail válido </br>";
        }else{            
            $email = filter_var($email,FILTER_SANITIZE_EMAIL);            
        }
    }
    //VALIDANDO MENSAJE
    if(empty($_POST["mensaje"])){
        $error .= "Ingresa un Mensaje </br>";
    }else{
        $mensaje = $_POST["mensaje"];
        $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
        $mensaje = trim($mensaje);
        if($mensaje==''){
            $mensaje .= "El mensaje está vacio</br>";
        }
    }
    
    //CUERPO DEL MENSAJE
    $cuerpo .= 'Nombre: ';
    $cuerpo .= $nombre;
    $cuerpo .= '\n';
    
    $cuerpo .= 'E-mail: ';
    $cuerpo .= $email;
    $cuerpo .= '\n';
    
    $cuerpo .= 'Mensaje: ';
    $cuerpo .= $mensaje;
    $cuerpo .= '\n';

    //DIRECCIÓN
    $enviarA = 'mi_correo@mi_correo.com'; //Remplazar por tu correo
    $asunto = 'Nuevo mensaje de mi sitio web';

    //ENVIAR CORREO
    if($error == ''){
        $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
        echo "exito";
    }else{
        echo $error;
    }
?>