<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id_usuario = (integer) $_POST["id_usuario"];
        $nombre_usuario = (string) trim($_POST["nombre_usuario"]);
        $email_usuario = (string) trim($_POST["email_usuario"]);
        $password_usuario = (string) trim($_POST["password_usuario"]);
        $consulta = "UPDATE usuarios SET nombre = \"$nombre_usuario\", email = \"$email_usuario\", password=MD5(\"$password_usuario\") WHERE id = $id_usuario";
        if($resultado = $conexion->query($consulta)){
            echo "Usuario actualizado satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al actualizar el Usuario seleccionado.";
            //echo "<a href=\"index.php\">Ver todos los usuarios....</a>";
        }
        $conexion->close();
    }
?>