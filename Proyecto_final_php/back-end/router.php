<?php

	/*
		usando la funcion isset() Evaluo si existe el prametro
		usando la funcion Empty() Evaluo si el parametro esta vacio y es distinto de null
		Evaluamos != "" si esta vacio
	*/

	if(isset($_GET['r']) && !Empty($_GET['r']) && $_GET['r'] != ""){

		$ruta = $_GET['r'];

		if($ruta == "productos"){
			include("vistas/productos.php");
		}
		if($ruta == "cliente"){
			include("vistas/cliente.php");
		}	
		if($ruta == "marca"){
			include("vistas/marca.php");
		}
		if($ruta == "categoria"){
			include("vistas/categoria.php");
		}

	}else{

		echo("NO HAY PARAMETROS");
	}






?>