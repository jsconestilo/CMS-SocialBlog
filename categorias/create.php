<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $nombre_categoria = (string) addslashes(trim($_POST["nombre_categoria"]));
        $consulta = "INSERT INTO categorias (nombre) VALUES (\"$nombre_categoria\")";
        if($resultado = $conexion->query($consulta)){
            echo "Categoría registrada satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al registrar la Categoria.";
            //echo "<a href=\"index.php\">Ver todas las categorías....</a>";
        }
        $conexion->close();
    }
?>