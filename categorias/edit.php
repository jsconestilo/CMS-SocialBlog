<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
    header('Content-Type: text/html; charset=utf-8');
    include "../config/config.php";
    include "../config/conexion.php";
    $id = (integer)$_GET["id"];
    $consulta = "SELECT * FROM categorias WHERE id = $id";
    $resultado = $conexion->query($consulta);
    while($fila = $resultado->fetch_object()){
        $nombre_categoria = htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8");
    }
    $resultado->free();
    $conexion->close();
    ?>
        <div id="editar_categoria">
            <h2>Actualizar Categoría Registrada</h2>
            <form name="form_new" action="update.php" method="post">
                <label>Nombre de la Categoría:</label>
                <input type="text" name="nombre_categoria" value="<?php echo $nombre_categoria; ?>" placeholder="Nombre" required="true" />
                <input type="hidden" name="id_categoria" value="<?php echo $id; ?>" />
                <input type="submit" value="Actualizar Categoría" name="btn_actualizar_categoria" />
            </form>
        </div>
<?php
}
?>