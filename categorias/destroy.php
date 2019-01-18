<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id = (integer)$_POST["id"];
        $consulta = "DELETE FROM categorias WHERE id = $id";
        if($resultado = $conexion->query($consulta)){
            echo "Categoría borrada satisfactoriamente.";
        }else{
            echo "Error al borrar la Categoria seleccionada. Existen actualmente publicaciones relacionadas con la categoría que usted desea borrar.";
        }
        $conexion->close();
    }
?>