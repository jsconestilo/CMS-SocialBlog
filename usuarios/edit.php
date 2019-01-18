<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
    header('Content-Type: text/html; charset=utf-8');
    include "../config/config.php";
    include "../config/conexion.php";
    $id = (integer) $_GET["id"];
    $consulta = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexion->query($consulta);
    while($fila = $resultado->fetch_object()){
        $nombre_usuario = htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8");
        $email_usuario = $fila->email;
        $password_usuario = $fila->password;
    }
    $resultado->free();
    $conexion->close();
    ?>
        <div id="editar_usuario">
            <h2>Actualizar Usuario Registrado</h2>
            <form name="form_new" action="update.php" method="post">
                <input type="hidden" name="id_usuario" value="<?php echo $id; ?>" />
                <label>Nombre Usuario:</label>
                <input type="text" name="nombre_usuario" value="<?php echo $nombre_usuario; ?>" placeholder="Nombre" required="true" />
                <label>Email Usuario:</label>
                <input type="email" name="email_usuario" value="<?php echo $email_usuario; ?>" placeholder="Email" required="true" />
                <label>Password Usuario:</label>
                <input type="password" name="password_usuario" required="true" />
                <input type="submit" value="Actualizar Usuario" name="btn_actualizar_usuario" />
            </form>
        </div>
<?php
}
?>