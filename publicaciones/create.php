<?php
    session_start();
    if(!isset($_SESSION["idUsuarioRegistrado"])){
        header("location: ../index.php");
    }else{
        header('Content-Type: text/html; charset=utf-8');
        include "../config/config.php";
        include "../config/conexion.php";
        $id_usuario = (integer) $_POST["id_usuario"];
        $titulo_publicacion = (string) addslashes(trim($_POST["titulo_publicacion"]));
        $contenido_publicacion = (string) addslashes(trim($_POST["contenido_publicacion"]));
        $id_categoria = (integer) $_POST["id_categoria"];
        $consulta = "INSERT INTO publicaciones (categoria_id, usuario_id, titulo, contenido) VALUES ($id_categoria, $id_usuario,\"$titulo_publicacion\",\"$contenido_publicacion\")";
        if($resultado = $conexion->query($consulta)){
            echo "Publicación registrada satisfactoriamente.";
            //header("location:index.php");
        }else{
            echo "Error al registrar la Publicación.";
            //echo "<a href=\"index.php\">Ver todas las publicaciones....</a>";
        }
        $conexion->close();
    }
?>