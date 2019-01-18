<?php
    session_start();
    //header("Content-Type: text/html; charset=utf-8");
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id = (integer) $_POST["id"];
        $consulta = "DELETE FROM usuarios WHERE id = $id";
        if($resultado = $conexion->query($consulta)){
            echo "Usuario borrado satisfactoriamente.";
        }else{
            echo "Error al borrar el Usuario seleccionado. Existen actualmente publicaciones relacionadas con el usuario que usted desea borrar.";
        }
        $conexion->close();
    }
?>