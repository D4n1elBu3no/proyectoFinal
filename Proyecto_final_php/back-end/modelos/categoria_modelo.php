<?PHP

	require_once("generico_modelo.php");

	class categoria_modelo extends generico_modelo {

		protected $id_categoria;

		protected $nombre;

		public function constructor(){

			$this->id_categoria 		= $this->validarPost('id_categoria');
			$this->nombre 			= $this->validarPost('nombre');
	
		}

		public function obtenerIdCategoria(){
			return $this->id_categoria;
		}
		public function obtenerNombre(){
			return $this->nombre;
		}
        
        public function cargarCategoria ($id_categoria){

			$sql = "SELECT * FROM categoria WHERE id_categoria = :id_categoria; ";
			$arrayDatos = array("id_categoria"=>$id_categoria);
			$lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function ingresar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			$sqlInsert = "INSERT categoria SET
							id_categoria 		= :id_categoria,
							nombre			= :nombre,
							estado			= 1 ;";
	
			$arrayInsert = array(
					"id_categoria" 		=> $this->id_categoria,
					"nombre" 			=> $this->nombre
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingreso la categoria correctamente" );
			return $retorno;
	
		}

		public function guardar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			$sqlInsert = "UPDATE categoria SET
							nombre			= :nombre 
							WHERE id_categoria = :id_categoria;";
	
			$arrayInsert = array(
					"id_categoria" 		=> $this->id_categoria,
					"nombre" 			=> $this->nombre
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo la categoria correctamente" );
			return $retorno;
	
		}

		public function cargar($id_categoria){

			if($id_categoria == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id_categoria no puede ser vacio" );
				return $retorno;
			}
			$sql = "SELECT * FROM categoria WHERE id_categoria = :id_categoria";
			$arraySQL = array("id_categoria" => $id_categoria);
			$lista 	= $this->ejecutarConsulta($sql, $arraySQL);
	
			$this->id 		= $lista[0]['id_categoria'];
			$this->nombre 			= $lista[0]['nombre'];
		}

		public function borrar(){

			$sql = "UPDATE categoria SET estado = 0 WHERE id_categoria = :id_categoria";
			$arraySQL = array("id_categoria"=>$this->id_categoria);
			$this->persistirConsulta($sql, $arraySQL);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borro la categoria" );
			return $retorno;
	
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM categoria WHERE estado = 1 ";
			$arrayDatos = array();
	
			if(isset($filtros['pagina']) && $filtros['pagina'] != ""){
	
				$pagina = ($filtros['pagina'] - 1) * 10;
				$sql .= " ORDER BY id_categoria LIMIT ".$pagina.",10;";		
			
			}else{
	
				$sql .= " ORDER BY id_categoria LIMIT 0,10;";	
	
			}
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function totalRegistros(){

			$sql = "SELECT count(*) AS total FROM categoria";
			$arrayDatos = array();
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			$totalRegistros = $lista[0]['total'];		
			return $totalRegistros;
	
		}


	}


?>