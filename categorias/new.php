<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: ../index.php");
}else{
?>
    <div id="nueva_categoria">
        <h2>Registro de Nuevas Categorías</h2>
        <form name="form_new" action="create.php" method="post">
            <label>Nombre de la Categoría:</label>
            <input type="text" name="nombre_categoria" placeholder="Nombre" required="true" />
            <input type="submit" value="Registrar Categoría" name="btn_registrar_categoria" />
        </form>
    </div>
<?php
}
?>