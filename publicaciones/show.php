<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="mostrar_publicacion">
        <h2>Especificaciones de la Publicación Seleccionada</h2>
        <?php
            header('Content-Type: text/html; charset=utf-8');
            include "../config/config.php";
            include "../config/conexion.php";
            $id = (integer) $_GET["id"];
            $consulta = "SELECT titulo, contenido FROM publicaciones WHERE id = $id";
            $resultado = $conexion->query($consulta);
            while($fila = $resultado->fetch_object()){
                echo "Titulo Publicación: ".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."<br />";
                echo "Contenido: <br />".htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8")."<br />";
            }
            $resultado->free_result();
            $conexion->close();
        ?>
    </div>
<?php
}
?>