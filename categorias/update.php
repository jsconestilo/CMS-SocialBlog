<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id_categoria = (integer) $_POST["id_categoria"];
        $nombre_categoria = (string) addslashes(trim($_POST["nombre_categoria"]));
        $consulta = "UPDATE categorias SET nombre = \"$nombre_categoria\" WHERE id = $id_categoria";
        if($resultado = $conexion->query($consulta)){
            echo "Categoría actualizada satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al actualizar la Categoria seleccionada.";
            //echo "<a href=\"index.php\">Ver todas las categorías....</a>";
        }
        $conexion->close();
    }
?>