<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
    header('Content-Type: text/html; charset=utf-8');
    include "../config/config.php";
    include "../config/conexion.php";
    $id = (integer) $_GET["id"];
    $consulta = "SELECT * FROM publicaciones WHERE id = $id";
    $resultado = $conexion->query($consulta);
    while($fila = $resultado->fetch_object()){
        $titulo_publicacion = htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8");
        $contenido_publicacion = htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8");
        $categoria_id = $fila->categoria_id;
    }
    $resultado->free();
    ?>
        <div id="editar_publicacion">
            <h2>Actualizar Publicación Registrada</h2>
            <form name="form_new" action="update.php" method="post">
                <input type="hidden" name="id_publicacion" value="<?php echo $id; ?>" />
                <label>Titulo Publicación: </label>
                <input type="text" name="titulo_publicacion" value="<?php echo $titulo_publicacion; ?>" placeholder="Titulo" required="true" />
                <br />
                <label>Contenido Publicación: </label>
                <textarea name="contenido_publicacion" required="true" placeholder="Contenido..."><?php echo $contenido_publicacion; ?></textarea>
                <br />
                <label>Categoría: </label>
                <select name="id_categoria">
                    <?php
                        $consulta = "SELECT *FROM categorias";
                        $resultado = $conexion->query($consulta);
                        while($fila = $resultado->fetch_object()){
                            if($fila->id == $categoria_id){
                                echo "<option value=\"$fila->id\" selected=\"selected\">".htmlentities(stripslashes($fila->nombre), ENT_QUOTES,"UTF-8")."</option>";
                            }else{
                                echo "<option value=\"$fila->id\">$fila->nombre</option>";
                            }
                        }
                        $resultado->free();
                        $conexion->close();
                    ?>
                </select>
                <input type="submit" value="Actualizar Publicación" name="btn_actualizar_publicacion" />
            </form>
        </div>
<?php
}
?>