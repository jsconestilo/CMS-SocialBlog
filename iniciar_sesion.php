<?php
if(isset($_POST["btn_login"])){
    include "config/conexion.php";
    $nombre_usuario = trim($_POST["nombre_usuario"]);
    $password_usuario = md5(trim($_POST["password_usuario"]));
    $consulta = "SELECT * FROM usuarios WHERE (nombre = \"$nombre_usuario\" OR email = \"$nombre_usuario\") AND password = \"$password_usuario\"";
    $resultado = $conexion->query($consulta);
    if($resultado->num_rows != 1 ){
        $resultado->free();
        $conexion->close();
        header("location: index.php");  //"Usuario no identificado correctamente"
    }else{
        while ($fila = $resultado->fetch_object()){
            $id_usuario = $fila->id;
            $nombre_usuario = $fila->nombre;
        }
        $resultado->free();
        $conexion->close();
        session_start();
        $_SESSION["idUsuarioRegistrado"] = $id_usuario;
        $_SESSION["nombreUsuarioRegistrado"] = $nombre_usuario;
        header("location: home.php");   //"Usuario identificado correctamente"
    }
}else{
?>
    <form name="frm_login" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <label for="nombre_usuario">Correo o Usuario</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de Usuario" required="true" />
        </div>
        <div>
            <label for="password_usuario">Contraseña</label>
            <input type="password" name="password_usuario" id="password_usuario" placeholder="Contraseña" required="true" />
        </div>
        <div>
            <input type="submit" name="btn_login" value="Iniciar Sesión" />
        </div>
    </form>
<?php
}
?>