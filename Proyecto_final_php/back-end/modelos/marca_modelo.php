<?PHP

	require_once("generico_modelo.php");

	class marca_modelo extends generico_modelo {

		protected $id_marca;

		protected $nombre;

		public function constructor(){

			$this->id_marca 		= $this->validarPost('id_marca');
			$this->nombre 			= $this->validarPost('nombre');
	
		}

		public function obtenerIdMarca(){
			return $this->id_marca;
		}
		public function obtenerNombre(){
			return $this->nombre;
		}
        
        public function cargarMarca ($id_marca){

			$sql = "SELECT * FROM marca WHERE id_marca = :id_marca; ";
			$arrayDatos = array("id_marca"=>$id_marca);
			$lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function ingresar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			$sqlInsert = "INSERT marca SET
							id_marca 		= :id_marca,
							nombre			= :nombre,
							estado			= 1 ;";
	
			$arrayInsert = array(
					"id_marca" 		=> $this->id_marca,
					"nombre" 			=> $this->nombre
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingreso la marca correctamente" );
			return $retorno;
	
		}

		public function guardar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			$sqlInsert = "UPDATE marca SET
							nombre			= :nombre 
							WHERE id_marca = :id_marca;";
	
			$arrayInsert = array(
					"id_marca" 		=> $this->id_marca,
					"nombre" 			=> $this->nombre
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo la marca correctamente" );
			return $retorno;
	
		}

		public function cargar($id_marca){

			if($id_marca == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El id_marca no puede ser vacio" );
				return $retorno;
			}
			$sql = "SELECT * FROM marca WHERE id_marca = :id_marca";
			$arraySQL = array("id_marca" => $id_marca);
			$lista 	= $this->ejecutarConsulta($sql, $arraySQL);
	
			$this->id 		= $lista[0]['id_marca'];
			$this->nombre 			= $lista[0]['nombre'];
		}

		public function borrar(){

			$sql = "UPDATE marca SET estado = 0 WHERE id_marca = :id_marca";
			$arraySQL = array("id_marca"=>$this->id_marca);
			$this->persistirConsulta($sql, $arraySQL);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borro la marca" );
			return $retorno;
	
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM marca WHERE estado = 1 ";
			$arrayDatos = array();
	
			if(isset($filtros['pagina']) && $filtros['pagina'] != ""){
	
				$pagina = ($filtros['pagina'] - 1) * 10;
				$sql .= " ORDER BY id_marca LIMIT ".$pagina.",10;";		
			
			}else{
	
				$sql .= " ORDER BY id_marca LIMIT 0,10;";	
	
			}
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function listarSelect(){

			$sql = "SELECT id_marca, nombre FROM marca WHERE estado = 1";
			$arrayDatos = array();
			$sql .= " ORDER BY id_marca";	
			
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function totalRegistros(){

			$sql = "SELECT count(*) AS total FROM marca";
			$arrayDatos = array();
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			$totalRegistros = $lista[0]['total'];		
			return $totalRegistros;
	
		}


	}


?>