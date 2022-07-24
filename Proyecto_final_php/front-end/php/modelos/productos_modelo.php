<?php

require_once("generico_modelo.php");

class productos_modelo extends generico_modelo {

	protected $id;

	protected $nombre;

	protected $precio;

	protected $id_marca;

	protected $id_categoria;

	
	public function constructor(){

		$this->id 		= $this->validarPost('id');
		$this->nombre 			= $this->validarPost('nombre');
		$this->precio 		= $this->validarPost('precio');
		$this->id_marca 	= $this->validarPost('id_marca');
		$this->id_categoria 	= $this->validarPost('id_categoria');

	}

	public function obtenerId(){
		return $this->id;
	}
	public function obtenerNombre(){
		return $this->nombre;
	}
	public function obtenerPrecio(){
		return $this->precio;
	}
	public function obtenerMarca(){
		return $this->id_marca;
	}
	public function obtenerCategoria(){
		return $this->id_categoria;
	}

	public function cargarProducto($id){

		$sql = "SELECT * FROM productos WHERE id = :id; ";
		$arrayDatos = array("id"=>$id);
		$lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
		return $lista;

	}

	public function ingresar(){

		if($this->nombre == ""){
			$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
			return $retorno;
		}
		if($this->precio == ""){
			$retorno = array("estado"=>"Error", "mensaje"=>"El precio no puede ser vacio" );
			return $retorno;
		}
		$sqlInsert = "INSERT productos SET
						id 		= :id,
						nombre			= :nombre,
						precio		= :precio,
						id_marca 	= :id_marca,
						id_categoria = :id_categoria,
						estado			= 1 ;";

		$arrayInsert = array(
				"id" 		=> $this->id,
				"nombre" 			=> $this->nombre,
				"precio" 		=> $this->precio,
				"id_marca" 	=> $this->id_marca,
				"id_categoria" 	=> $this->id_categoria
			);
		$this->persistirConsulta($sqlInsert, $arrayInsert);
		$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingreso el producto correctamente" );
		return $retorno;

	}

	public function guardar(){

		if($this->nombre == ""){
			$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
			return $retorno;
		}
		if($this->precio == ""){
			$retorno = array("estado"=>"Error", "mensaje"=>"El precio no puede ser vacio" );
			return $retorno;
		}
		$sqlUpdate = "UPDATE productos SET
						nombre			= :nombre,
						precio		= :precio,
						id_marca 	= :id_marca,
						id_categoria = :id_categoria 
						WHERE id = :id;";

		$arrayUpdate = array(
				"id" 		=> $this->id,
				"nombre" 			=> $this->nombre,
				"precio" 		=> $this->precio,
				"id_marca" 	=> $this->id_marca,
				"id_categoria" 	=> $this->id_categoria
			);
		$this->persistirConsulta($sqlUpdate, $arrayUpdate);
		$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el producto correctamente" );
		return $retorno;

	}

	public function cargar($id){

		if($id == ""){
			$retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio" );
			return $retorno;
		}
		$sql = "SELECT * FROM productos WHERE id = :id";
		$arraySQL = array("id" => $id);
		$lista 	= $this->ejecutarConsulta($sql, $arraySQL);

		$this->id 		= $lista[0]['id'];
		$this->nombre 			= $lista[0]['nombre'];
		$this->precio 		= $lista[0]['precio'];
		$this->id_marca 	= $lista[0]['id_marca'];
		$this->id_categoria 	= $lista[0]['id_categoria'];

	}

	public function borrar(){

		//$sql = "DELETE FROM productos WHERE id = :id";
		$sql = "UPDATE productos SET estado = 0 WHERE id = :id";
		$arraySQL = array("id"=>$this->id);
		$this->persistirConsulta($sql, $arraySQL);
		$retorno = array("estado"=>"Ok", "mensaje"=>"Se borro el producto" );
		return $retorno;

	}


	public function listar($filtros = array()){

		$sql = "SELECT 
						p.id,
						p.nombre,
						p.precio,
						p.id_marca,
						m.nombre as nombreMarca,
						p.id_categoria,
						p.imagen,
						c.nombre as nombreCategoria
					
					from productos p
					inner join marca m on m.id_marca = p.id_marca
					inner join categoria c on c.id_categoria = p.id_categoria
						WHERE p.estado != 0 ";
		$arrayDatos = array();

		if(isset($filtros['pagina']) && $filtros['pagina'] != ""){

			$pagina = ($filtros['pagina'] - 1) * 10;
			$sql .= " ORDER BY id LIMIT ".$pagina.",10;";		
		
		}else{

			$sql .= " ORDER BY id LIMIT 0,10;";	

		}

		$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
		return $lista;

	}

	public function totalRegistros(){

		$sql = "SELECT count(*) AS total FROM productos";
		$arrayDatos = array();

		$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
		$totalRegistros = $lista[0]['total'];		
		return $totalRegistros;

	}


}


?>