<?php
    header('Content-Type: text/html; charset=utf-8');
    include "config/config.php";
    include "config/conexion.php";
    if($conexion->connect_errno){
        if($conexion->connect_errno == 2002){
            die("<h1>No se encuentra el servidor.</h1>");
        }else if($conexion->connect_errno == 1044){
            die("<h1>No se localiza el usuario registrado en el SGBD.</h1>");
        }else if($conexion->connect_errno == 1045){
            die("<h1>Error en la contraseña de acceso al SGBD.</h1>");
        }else if($conexion->connect_errno == 1049){
            die("<h1>No se encuentra la base de datos.</h1>");
        }
    }else{
        $consulta = "SELECT COUNT(*) AS reg_user FROM usuarios";
        $resultado = $conexion->query($consulta);
        /*while($fila = $resultado->fetch_object()){
            $num_usuarios = $fila->reg_user;
        }*/
        if(!$resultado){
            // no existe configuración de usuario y creación de tablas en la DB. Por tanto coloca la interfaz de instalación
            ?>
            <!DOCTYPE html>
            <html lang="es-MX">
                <head>
                    <meta charset="UTF-8" />
                    <meta name="description" content="El Blog Oficial del Centro de Bachillerato José Vasconcelos SC. Clave 60, es un punto de encuentro para que tanto alumnos, catedráticos y personal administrativo de la comunidad compartan experiencias y convivan en un ambiente virtual."  />
                    <title>Blog Oficial del Centro de Bachillerato José Vasconcelos</title>
                    <link rel="stylesheet" href="assets/css/estilos.css" />
                    <script src="assets/lib/jquery.js"></script>
                    <script src="assets/lib/modernizr.js"></script>
                    <script src="assets/js/comportamientos.js"></script>    
                </head>
                <body>
                    <header>
                        <div id="logotipo">
                            <h1>CMS Social Blog</h1>
                            <h2>Bienvenido al Asistente de Instalación...</h2>
                        </div>
                        <div id="loggin">
                            <p>Versión 1.0</p>
                            <p>Compilación: 19-10-2013</p>
                        </div>
                    </header>
                    <figure id="imgCabecera">
                        <img src="assets/img/banner_web.png" alt="banner" />
                    </figure>
                    <section id="publicaciones">
                        <div id="nueva_instalacion">
                            <h2>Haga Clic en Siguiente para instalar CMS Social Blog:</h2>
                            <p>CMS Social Blog es el sistema de bitácoras preferido por las instituciones educativas de habla hispana. Gracias a su sencilla instalación e interfaz de usuario amigable, usted puede hacer de CMS Social Blog un sitio Weblog al estilo Wordpress.</p><br />
                            <form name="form_instalador" action="config/instalar.php" method="post">
                                <label for="user_name">Nombre de Usuario: </label>
                                <input type="text" name="user_name" required="true">
                                <label for="email_user">Correo Electrónico: </label>
                                <input type="email" name="email_user" required="true">
                                <label for="password_user">Contraseña: </label>
                                <input type="password" name="password_user" required="true">
                                <br />
                                <input type="submit" name="btn_instalador" value="Siguiente" />
                            </form>
                        </div>
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
        }else{
            // todo es correcto y muestra el index normal
            ?>
            <!DOCTYPE html>
            <html lang="es-MX">
                <head>
                    <meta charset="UTF-8" />
                    <meta name="description" content="El Blog Oficial del Centro de Bachillerato José Vasconcelos SC. Clave 60, es un punto de encuentro para que tanto alumnos, catedráticos y personal administrativo de la comunidad compartan experiencias y convivan en un ambiente virtual."  />
                    <title>Blog Oficial del Centro de Bachillerato José Vasconcelos</title>
                    <link rel="stylesheet" href="assets/css/estilos.css" />
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
                                    $nombreCategoria = htmlentities(stripslashes($fila->nombre),ENT_QUOTES, "UTF-8");
                                    echo "<li><a href=\"index.php?id=$fila->id\">$nombreCategoria</a></li>";
                                }
                                $resultado->free();
                            ?>
                        </ul>
                        <form name="frm_buscador" action="<?php $_SERVER["PHP_SELF"]; ?>" method="get" enctype="application/x-www-form-urlencoded">
                            <label for="titulo_publicacion">Buscar Publicación: </label>
                            <input type="text" name="titulo_publicacion" id="titulo_publicacion" required="true" />
                            <input type="submit" name="btn_buscador" value="Ir" />
                        </form>
                    </nav>
                    <section id="publicaciones">
                        <?php
                            //include "config/conexion.php";
                            if(!isset($_GET["btn_buscador"]) && (!isset($_GET["id"]))){
                                echo "<h2>Publicaciones recientes:</h2>";
                                $consulta = "SELECT id, titulo, contenido FROM publicaciones";
                                $resultado = $conexion->query($consulta);
                                while($fila = $resultado->fetch_object()){
                                    echo "<article>";
                                        echo "<h3>".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."</h3>";
                                        echo "<p>".substr(htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8"), 0, 330)."... ";
                                        echo "[<a href=\"publicacion.php?id=$fila->id\">Ver publicación completa</a>]</p>";
                                    echo "</article>";
                                }
                                $resultado->free_result();
                            }else if(isset($_GET["btn_buscador"])){
                                echo "<h2>Publicaciones encontradas:</h2>";
                                $titulo_publicacion = addslashes(trim($_GET["titulo_publicacion"]));
                                $consulta = "SELECT id, titulo, contenido FROM publicaciones WHERE titulo LIKE \"%$titulo_publicacion%\"";
                                $resultado = $conexion->query($consulta);
                                while($fila = $resultado->fetch_object()){
                                    echo "<article>";
                                        echo "<h3>".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."</h3>";
                                        echo "<p>".substr(htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8"), 0, 330)."... ";
                                        echo "[<a href=\"publicacion.php?id=$fila->id\">Ver publicación completa</a>]</p>";
                                    echo "</article>";
                                }
                                $resultado->free_result();
                            }else{
                                echo "<h2>Publicaciones ralacionadas con la categoría:</h2>";
                                $id_categoria = (integer) $_GET["id"];
                                $consulta = "SELECT id, titulo, contenido FROM publicaciones WHERE categoria_id = $id_categoria";
                                $resultado = $conexion->query($consulta);
                                while($fila = $resultado->fetch_object()){
                                    echo "<article>";
                                        echo "<h3>".htmlentities(stripslashes($fila->titulo), ENT_QUOTES, "UTF-8")."</h3>";
                                        echo "<p>".substr(htmlentities(stripslashes($fila->contenido), ENT_QUOTES, "UTF-8"), 0, 330)."... ";
                                        echo "[<a href=\"publicacion.php?id=$fila->id\">Ver publicación completa</a>]</p>";
                                    echo "</article>";
                                }
                                $resultado->free_result();
                            }
                            $conexion->close();
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
    }
?>
