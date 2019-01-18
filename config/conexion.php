<?php
	date_default_timezone_set("America/Mexico_city");
	@$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BASE_DE_DATOS);
	@$conexion->query("SET NAMES UTF8");
	@$conexion->query("SET CHARACTER SET utf8");
?>