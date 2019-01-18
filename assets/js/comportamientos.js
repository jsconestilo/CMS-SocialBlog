$(document).ready(inicializar);

function inicializar(){
	//menu administrador de opciones de tabla
	$("#menuAdministrador a").click(function(event){
		var opcion = $(this).text().toLowerCase();
		switch(opcion){
			case "usuarios":
				$("#controles_administrativos div").load("usuarios/index.php #ctrl_usuarios");
				break;
			case "categorías":
				$("#controles_administrativos div").load("categorias/index.php #ctrl_categorias");
				break;
			case "publicaciones":
				$("#controles_administrativos div").load("publicaciones/index.php #ctrl_publicaciones");
				break;
		}
		event.preventDefault();
	});

/********************************************MODULO DE ADMINISTRACIÓN DE USUARIOS **********************************************/
	
	//mostrar formulario registro usuarios
	$("#ctrl_usuarios #nuevo_registro").live("click",function(event){
		$("#contenido_administrativo div").load("usuarios/new.php #nuevo_usuario");
		event.preventDefault();
	});
	//registrar usuarios
	$("#nuevo_usuario form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("usuarios/create.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("usuarios/index.php #ctrl_usuarios");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
	//editar usuarios
	$("#editar_usuario form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("usuarios/update.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("usuarios/index.php #ctrl_usuarios");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
	//bajas, consultas y eliminación de usuario
	$("#ctrl_usuarios article a").live("click",function(event){
		var opcion = $(this).text().toLowerCase();
		var usuario = $(this).attr("href");
		var datos = usuario.substring(usuario.indexOf("?")+1);
		switch(opcion){
			case "eliminar":
				var respuesta = confirm("¿Esta seguro que desea eliminar este usuario?");
				if(respuesta){
					$.post("usuarios/destroy.php", datos, function(data){
						alert(data);
						$("#controles_administrativos div").load("usuarios/index.php #ctrl_usuarios");
					});
				}
				break;
			case "editar":
				$("#contenido_administrativo div").load("usuarios/edit.php?"+datos+" #editar_usuario");
				break;
			case "mostrar":
				$("#contenido_administrativo div").load("usuarios/show.php?"+datos+" #mostrar_usuario");
				break;
		}
		event.preventDefault();
	});

/*******************************************************************************************************************************/

/********************************** MÓDULO ADMINISTRACIÓN DE CATEGORIÁS ********************************************************/

//mostrar formulario registro categorías
	$("#ctrl_categorias #nuevo_registro").live("click",function(event){
		$("#contenido_administrativo div").load("categorias/new.php #nueva_categoria");
		event.preventDefault();
	});
//registrar categorías
	$("#nueva_categoria form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("categorias/create.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("categorias/index.php #ctrl_categorias");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
//editar categorías
	$("#editar_categoria form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("categorias/update.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("categorias/index.php #ctrl_categorias");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
//Eliminar, Formulario Editar, mostrar categorías
	$("#ctrl_categorias article a").live("click",function(event){
		var opcion = $(this).text().toLowerCase();
		var categoria = $(this).attr("href");
		var datos = categoria.substring(categoria.indexOf("?")+1);
		switch(opcion){
			case "eliminar":
				var respuesta = confirm("¿Esta seguro que desea eliminar esta categoria?");
				if(respuesta){
					$.post("categorias/destroy.php", datos, function(data){
						alert(data);
						$("#controles_administrativos div").load("categorias/index.php #ctrl_categorias");
					});
				}
				break;
			case "editar":
				$("#contenido_administrativo div").load("categorias/edit.php?"+datos+" #editar_categoria");
				break;
			case "mostrar":
				$("#contenido_administrativo div").load("categorias/show.php?"+datos+" #mostrar_categoria");
				break;
		}
		event.preventDefault();
	});
/*******************************************************************************************************************************/

/********************************** MÓDULO ADMINISTRACIÓN DE PUBLICACIONES ********************************************************/

//mostrar formulario registro publicaciones
	$("#ctrl_publicaciones #nuevo_registro").live("click",function(event){
		$("#contenido_administrativo div").load("publicaciones/new.php #nueva_publicacion");
		event.preventDefault();
	});
//registrar categorías
	$("#nueva_publicacion form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("publicaciones/create.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("publicaciones/index.php #ctrl_publicaciones");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
//editar categorías
	$("#editar_publicacion form").live("submit",function(event){
		var datos = $(this).serialize();
		$.post("publicaciones/update.php", datos, function(data){
			alert(data);
			$("#controles_administrativos div").load("publicaciones/index.php #ctrl_publicaciones");
			$("#contenido_administrativo div").empty();
		});
		event.preventDefault();
	});
//Eliminar, Formulario Editar, mostrar categorías
	$("#ctrl_publicaciones article a").live("click",function(event){
		var opcion = $(this).text().toLowerCase();
		var publicacion = $(this).attr("href");
		var datos = publicacion.substring(publicacion.indexOf("?")+1);
		switch(opcion){
			case "eliminar":
				var respuesta = confirm("¿Esta seguro que desea eliminar esta publicación?");
				if(respuesta){
					$.post("publicaciones/destroy.php", datos, function(data){
						alert(data);
						$("#controles_administrativos div").load("publicaciones/index.php #ctrl_publicaciones");
					});
				}
				break;
			case "editar":
				$("#contenido_administrativo div").load("publicaciones/edit.php?"+datos+" #editar_publicacion");
				break;
			case "mostrar":
				$("#contenido_administrativo div").load("publicaciones/show.php?"+datos+" #mostrar_publicacion");
				break;
		}
		event.preventDefault();
	});
/*******************************************************************************************************************************/
}

function controlesAdministrativos(){

}