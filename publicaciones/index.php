<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="ctrl_publicaciones">
        <h2>Administración de Publicaciones</h2>
        <a id="nuevo_registro" href="new.php">Crear nueva publicación</a>
        <?php
            header('Content-Type: text/html; charset=utf-8');
            include "../config/config.php";
            include "../config/conexion.php";
            $consulta = "SELECT id, titulo FROM publicaciones";
            $resultado = $conexion->query($consulta);
            while($fila = $resultado->fetch_object()){
                echo "<article>";
                    echo "<h3>".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."</h3>";
                    echo "<p class=\"menu_edicion\"><a href=\"edit.php?id=$fila->id\">Editar</a>";
                    echo "<a href=\"publicaciones/destroy.php?id=$fila->id\">Eliminar</a>";
                    echo "<a href=\"show.php?id=$fila->id\">Mostrar</a></p>";
                echo "<article>";
            }
            $resultado->free_result();
            $conexion->close();
        ?>
    </div>
<?php
}
?>