<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $nombre_usuario = (string) trim($_POST["nombre_usuario"]);
        $email_usuario = (string) trim($_POST["email_usuario"]);
        $password_usuario = (string) trim($_POST["password_usuario"]);
        $consulta = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre_usuario','$email_usuario',MD5('$password_usuario'))";
        if($resultado = $conexion->query($consulta)){
            echo "Usuario registrado satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al registrar el usuario.<br />";
            //echo "<a href=\"index.php\">Ver todos los usuarios....</a>";
        }
        $conexion->close();
    }
?>