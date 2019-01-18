<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="mostrar_categoria">
        <h2>Especificaciones de la Categoría Seleccionada</h2>
        <?php
            header('Content-Type: text/html; charset=utf-8');
            include "../config/config.php";
            include "../config/conexion.php";
            $id = (integer) $_GET["id"];
            $consulta = "SELECT nombre FROM categorias WHERE id = $id";
            $resultado = $conexion->query($consulta);
            while($fila = $resultado->fetch_object()){
                echo "Nombre Categoría: ".htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8")."<br />";
            }
            $resultado->free_result();
            $conexion->close();
        ?>
    </div>
<?php
}
?>