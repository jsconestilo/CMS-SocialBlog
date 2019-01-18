<?php
    header('Content-Type: text/html; charset=utf-8');
    include "config/config.php";
    include "config/conexion.php";
?>
<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="El Blog Oficial del Centro de Bachillerato José Vasconcelos SC. Clave 60, es un punto de encuentro para que tanto alumnos, catedráticos y personal administrativo de la comunidad compartan experiencias y convivan en un ambiente virtual."  />
        <title>Blog Oficial del Centro de Bachillerato José Vasconcelos</title>
        <link href="assets/css/estilos.css" rel="stylesheet" />
        <script src="assets/lib/jquery.js"></script>
        <script src="assets/lib/modernizr.js"></script>
        <script src="assets/js/comportamientos.js"></script>    
    </head>
    <body>
         <header>
            <div id="logotipo">
                <h1>El Blog del Informático</h1>
                <h2>Innovando el diseño y desarrollo Web...</h2>
            </div>
            <div id="loggin">
                <?php include "iniciar_sesion.php"; ?>
            </div>
        </header>
        <figure id="imgCabecera">
            <img src="assets/img/banner_web.png" alt="banner" />
        </figure>
        <nav id="menuCategorias">
            <ul>
                <?php
                    //include "config/conexion.php";
                    $consulta = "SELECT * FROM categorias";
                    $resultado = $conexion->query($consulta);
                    while($fila = $resultado->fetch_object()){
                        $nombreCategoria = htmlentities(stripslashes($fila->nombre), ENT_QUOTES, "UTF-8");
                        echo "<li><a href=\"index.php?id=$fila->id\">$nombreCategoria</a></li>";
                    }
                    $resultado->free();
                ?>
            </ul>
            <form name="frm_buscador" action="index.php" method="get" enctype="application/x-www-form-urlencoded">
                <label for="titulo_publicacion">Buscar Publicación: </label>
                <input type="text" name="titulo_publicacion" id="titulo_publicacion" required="true" />
                <input type="submit" name="btn_buscador" value="Ir" />
            </form>
        </nav>
        <section id="publicaciones">
            <?php
                //include "config/conexion.php";
                $id = (integer) $_GET["id"];
                $consulta = "SELECT titulo, contenido FROM publicaciones WHERE id = $id";
                $resultado = $conexion->query($consulta);
                while($fila = $resultado->fetch_object()){
                    echo "<article>";
                        echo "<h2>Usted está leyendo: <span>".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."</span></h2>";
                        echo "<p id=\"completo\">".htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8")."</p>";
                    echo "<article>";
                }
                $resultado->free_result();
                $conexion->close();
            ?>
            <a href="index.php">Regresar a página principal</a>
        </section>
        <footer>
            <div>
                El blog del Informático &copy; 2013. Todos los derechos reservados.<br />
                Calle de la Palma # 8, Colonia San Miguel Almaya,<br />
                Capulhuac, Estado de México, México.
            </div>
            <div>
                Desarrollador: Lic. En I.A. Alejandro González Reyes<br />
                Maestría en Comunicación con Medios Virtuales<br />
                Email: lia_alexgonzalez@hotmail.com<br />
            </div>
        </footer>
    </body>
</html>