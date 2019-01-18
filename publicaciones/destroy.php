<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id = (integer)$_POST["id"];
        $consulta = "DELETE FROM publicaciones WHERE id = $id";
        if($resultado = $conexion->query($consulta)){
            echo "Publicación borrada satisfactoriamente.";
            //header("location: ../home.php?pag=publicaciones");
        }else{
            echo "Error al borrar la Publicación seleccionada.";
            //header("location: ../home.php?pag=publicaciones");
        }
        $conexion->close();
    }
?>