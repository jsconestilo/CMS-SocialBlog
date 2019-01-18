<?php
session_start();
if(!isset($_SESSION["idUsuarioRegistrado"])){
    header("location: index.php");
}else{
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
                <p>Bienvenido al Sistema: <?php echo $_SESSION["nombreUsuarioRegistrado"]; ?></p>
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
            </div>
        </header>
        <figure id="imgCabecera">
            <img src="assets/img/banner_web.png" alt="banner" />
        </figure>
        <nav id="menuAdministrador">
            <ul>
                <li><a href="home.php?pag=usuarios">USUARIOS</a></li>
                <li><a href="home.php?pag=categorias">CATEGORÍAS</a></li>
                <li><a href="home.php?pag=publicaciones">PUBLICACIONES</a></li>
            </ul>
        </nav>
        <section id="publicaciones">
            <div id="controles_administrativos">
                <h2>Controles Administrativos</h2>
                <div></div>
            </div>
            <div id="contenido_administrativo">
                <h2>Contenido Administrativo</h2>
                <div></div>
            </div>
            <?php
            /*
            Código reemplazado por interactividad Ajax mediante JQuery
            
                if(isset($_GET["pag"])){
                    $pagina_mostrada = $_GET["pag"];    
                    switch($pagina_mostrada){
                        case "usuarios":
                            @include "usuarios/index.php";
                            break;
                        case "categorias":
                            @include "categorias/index.php";
                            break;
                        case "publicaciones":
                            @include "publicaciones/index.php";
                            break;
                    }
                }
            */
            ?>
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
<?php
}
?>