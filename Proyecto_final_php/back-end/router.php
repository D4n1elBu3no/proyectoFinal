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
		/*if($ruta == "usurios"){
			include("vistas/usurios.php");
		}	
		if($ruta == "cursos"){
			include("vistas/cursos.php");
		}
		if($ruta == "tiposCursos"){
			include("vistas/tiposCursos.php");
		}*/

	}else{

		echo("NO HAY PARAMETROS");
	}






?>