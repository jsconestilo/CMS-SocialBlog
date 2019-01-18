<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id_publicacion = (integer) $_POST["id_publicacion"];
        $titulo_publicacion = (string) addslashes(trim($_POST["titulo_publicacion"]));
        $contenido_publicacion = (string) addslashes(trim($_POST["contenido_publicacion"]));
        $categoria_id = (integer) $_POST["id_categoria"];
        $consulta = "UPDATE publicaciones SET titulo = \"$titulo_publicacion\", contenido = \"$contenido_publicacion\", categoria_id = $categoria_id WHERE id = $id_publicacion";
        if($resultado = $conexion->query($consulta)){
            echo "Publicación actualizada satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al actualizar la Publicación seleccionada.";
            //echo "<a href=\"index.php\">Ver todas las publicaciones....</a>";
        }
        $conexion->close();
    }
?>