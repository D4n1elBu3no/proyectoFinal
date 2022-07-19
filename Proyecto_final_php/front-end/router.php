<?php

	/*
		usando la funcion isset() Evaluo si existe el prametro
		usando la funcion Empty() Evaluo si el parametro esta vacio y es distinto de null
		Evaluamos != "" si esta vacio
	*/

	if(isset($_GET['r']) && !Empty($_GET['r']) && $_GET['r'] != ""){

		$ruta = $_GET['r'];

		if($ruta == "cuidados-piel"){
			include("php/vistas/cuidados-piel.php");
		}
		if($ruta == "maquillaje"){
			include("php/vistas/maquillaje.php");
		}	
		if($ruta == "contactenos"){
			include("php/vistas/contactenos.php");
		}
		if($ruta == "perfumeria"){
			include("php/vistas/perfumeria.php");
		}
		if($ruta == "unias"){
			include("php/vistas/unias.php");
		}
		if($ruta == "productos"){
			include("php/vistas/productos.php");
		}

	}else{

		// echo("NO HAY PARAMETROS");
	}






?>