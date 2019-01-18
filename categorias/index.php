<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="ctrl_categorias">
        <h2>Administración de Categorías</h2>
        <a id="nuevo_registro" href="new.php">Crear nueva categoría</a>
        <?php
            header('Content-Type: text/html; charset=utf-8');
            include "../config/config.php";
            include "../config/conexion.php";
            $consulta = "SELECT * FROM categorias";
            $resultado = $conexion->query($consulta);
            while($fila = $resultado->fetch_object()){
                echo "<article>";
                    echo "<h3>".htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8")."</h3>";
                    echo "<p class=\"menu_edicion\"><a href=\"edit.php?id=$fila->id\">Editar</a>";
                    echo "<a href=\"destroy.php?id=$fila->id\">Eliminar</a>";
                    echo "<a href=\"show.php?id=$fila->id\">Mostrar</a></p>";
                echo "</article>";
            }
            $resultado->free_result();
            $conexion->close();
        ?>
    </div>
<?php
}
?>