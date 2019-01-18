<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="nueva_publicacion">
        <h2>Registro de Nuevas Publicaciones</h2>
        <form name="form_new" action="create.php" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['idUsuarioRegistrado']; ?>" />
            <label>Titulo Publicación: </label>
            <input type="text" name="titulo_publicacion" placeholder="Titulo" required="true" />
            <label>Categoría: </label>
            <select name="id_categoria">
            <?php
                header('Content-Type: text/html; charset=utf-8');
                include "../config/config.php";
                include "../config/conexion.php";
                $consulta = "SELECT * FROM categorias";
                $resultado = $conexion->query($consulta);
                while($fila = $resultado->fetch_object()){
                    echo "<option value=\"$fila->id\">".htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8")."</option>";
                }
                $resultado->free();
                $conexion->close();
            ?>
            </select>
            <label>Contenido: </label>
            <textarea name="contenido_publicacion" placeholder="Contenido..." required="true"></textarea>
            <input type="submit" value="Registrar Publicación" name="btn_registrar_publicacion" />
        </form>
    </div>
<?php
}
?>