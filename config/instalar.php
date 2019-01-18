<?php
	include "config.php";
	date_default_timezone_set("America/Mexico_city");
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASE_DE_DATOS);
	@$conexion->query("SET NAMES UTF8");
	@$conexion->query("SET CHARACTER SET utf8");

	$nombreDeUsuario = trim($_POST["user_name"]);
	$emailDeUsuario = trim($_POST["email_user"]);
	$passwordDeUsuario = trim($_POST["password_user"]);

	$consulta = "CREATE TABLE IF NOT EXISTS categorias (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  nombre varchar(255) NOT NULL,
				  PRIMARY KEY (id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
	$resultado = $conexion->query($consulta);
	//$resultado->free();
	$consulta = "CREATE TABLE IF NOT EXISTS publicaciones (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  categoria_id int(11) NOT NULL,
				  usuario_id int(11) NOT NULL,
				  titulo varchar(255) NOT NULL,
				  contenido text NOT NULL,
				  PRIMARY KEY (id),
				  KEY categoria_id (categoria_id),
				  KEY usuario_id (usuario_id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
	$resultado = $conexion->query($consulta);
	//$resultado->free();
	$consulta = "CREATE TABLE IF NOT EXISTS usuarios (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  nombre varchar(255) NOT NULL,
				  email varchar(255) NOT NULL,
				  password varchar(255) NOT NULL,
				  PRIMARY KEY (id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
	$resultado = $conexion->query($consulta);
	//$resultado->free();
	$consulta = "ALTER TABLE publicaciones
  					ADD CONSTRAINT fk_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
  					ADD CONSTRAINT fk_categorias FOREIGN KEY (categoria_id) REFERENCES categorias (id);";
  	$resultado = $conexion->query($consulta);
	//$resultado->free();
	$consulta = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombreDeUsuario','$emailDeUsuario',MD5('$passwordDeUsuario'))";
	$resultado = $conexion->query($consulta);
	$conexion->close();
	header("location:../index.php");
?>