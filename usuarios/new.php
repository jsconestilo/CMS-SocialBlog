<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="nuevo_usuario">
        <h2>Registro de Nuevos Usuarios</h2>
        <form name="form_new" action="create.php" method="post">
            <label>Nombre del Usuario: </label>
            <input type="text" name="nombre_usuario" placeholder="Nombre" required="true" />
            <br />
            <label>Email: </label>
            <input type="email" name="email_usuario" placeholder="Email" required="true" />
            <br />
            <label>Contraseña: </label>
            <input type="password" name="password_usuario" required="true" />
            <br />
            <input type="submit" value="Registrar Usuario" name="btn_registrar_usuario" />
        </form>
    </div>
<?php
}
?>