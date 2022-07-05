<?php

	function persistirConsulta($sqlInsert){
		// String conexion a la base de datos
		include("configuracion/configuracion.php");

		$srtConexion 	= "mysql:".$DATABASE['host']."=localhost;dbname=".$DATABASE['database'];
		// Credenciales
		$usuario 		= $DATABASE['user'];
		$clave 			= $DATABASE['password'];
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_NATURAL,
			PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
		];
		$conexion 	= new PDO($srtConexion, $usuario, $clave, $options); 	
		$preparo 	= $conexion->prepare($sqlInsert);
		$respuesta	= $preparo->execute(array());	

	}

$arraySQL = array();

$arraySQL[] = "
		SET FOREIGN_KEY_CHECKS=0;
		DROP TABLE IF EXISTS usuario;
		DROP TABLE IF EXISTS productos;
		DROP TABLE IF EXISTS orden;
		DROP TABLE IF EXISTS marca;
		DROP TABLE IF EXISTS detalle_orden;
		DROP TABLE IF EXISTS cliente;
		DROP TABLE IF EXISTS categoria;
		SET FOREIGN_KEY_CHECKS=1;
";

$arraySQL[]= "CREATE TABLE 'marca'(
	'id_marca' int(5) AUTO_INCREMENT PRIMARY key,
	'nombre' varchar (50)
);";

$arraySQL[]= "CREATE TABLE 'categoria'(
	'id_categoria' int(5) AUTO_INCREMENT PRIMARY key,
	'nombre' varchar (50),
	'descripcion' text
);";

$arraySQL[]= "CREATE TABLE 'usuario'(
	'id' int(5) AUTO_INCREMENT PRIMARY key,
	'nombre' varchar(100),
	'mail' varchar (50),
	'clave' varchar(100),
	'estado' tinyint(1) DEFAULT NULL
);";

$arraySQL[]= "CREATE TABLE 'cliente'( 
	'documento' int	PRIMARY KEY,
	'nombre' varchar (100),
	'apellido' varchar (100),
	'direccion' text,
	'telefono' int,
	'mail' varchar (100),
	'clave' varchar(100),
	'estado' tinyint(1) DEFAULT NULL
);";

$arraySQL[]= "CREATE TABLE 'orden'(
	'id' int(5) AUTO_INCREMENT PRIMARY KEY,
	'fecha' date,
	'documento' int,
	'total' float (10,2),
	FOREIGN KEY ('documento') REFERENCES 'cliente'('documento')
);";

$arraySQL[]= "CREATE TABLE 'productos'(
	'id' int(5) AUTO_INCREMENT PRIMARY key,
	'nombre' varchar(200),
	'precio' float(10,2),
	'id_marca' int(5),
	'id_categoria' int(5),
	'estado' tinyint(1) DEFAULT NULL,
	FOREIGN KEY ('id_marca') REFERENCES 'marca' ('id_marca'),
	FOREIGN KEY ('id_categoria') REFERENCES 'categoria' ('id_categoria')
);";

$arraySQL[]= "CREATE TABLE 'detalle_orden'( 
	'id' int(5) AUTO_INCREMENT PRIMARY key,
	'id_orden' int(5),
	'id_producto' int(5),
	'cantidad' int(5),
	FOREIGN KEY ('id_orden') REFERENCES 'orden'('id')	
	FOREIGN KEY ('id_producto') REFERENCES 'productos'('id')
);";

$arraySQL[] = "
INSERT INTO usuario SET 
	nombre = 'admin',
	mail = 'admin@admin.com',
	clave = '21232f297a57a5a743894a0e4a801fc3',
	estado = 1;
";

?>