<?PHP

	require_once("generico_modelo.php");

	class cliente_modelo extends generico_modelo {

		protected $documento;

		protected $nombre;

		protected $apellido;

		protected $direccion;

		protected $telefono;

		protected $mail;

		protected $clave;

		public function constructor(){

			$this->documento 		= $this->validarPost('documento');
			$this->nombre 			= $this->validarPost('nombre');
			$this->apellido 		= $this->validarPost('apellido');
			$this->direccion 		= $this->validarPost('direccion');
			$this->telefono 		= $this->validarPost('telefono');
			$this->mail 			= $this->validarPost('mail');
	
		}

		public function obtenerDocumento(){
			return $this->documento;
		}
		public function obtenerNombre(){
			return $this->nombre;
		}
		public function obtenerApellido(){
			return $this->apellido;
		}
		public function obtenerDireccion(){
			return $this->direccion;
		}
		public function obtenerTelefono(){
			return $this->telefono;
		}
		public function obtenerMail(){
			return $this->mail;
		}

		public function cargarCliente ($documento){

			$sql = "SELECT * FROM cliente WHERE documento = :documento; ";
			$arrayDatos = array("documento"=>$documento);
			$lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function ingresar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			if($this->apellido == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El apellido no puede ser vacio" );
				return $retorno;
			}
			$sqlInsert = "INSERT cliente SET
							documento 		= :documento,
							nombre			= :nombre,
							apellido		= :apellido,
							direccion 		= :direccion,
							telefono 		= :telefono,
							mail 			= :mail,
							clave 			= :clave,
							estado			= 1 ;";
	
			$arrayInsert = array(
					"documento" 		=> $this->documento,
					"nombre" 			=> $this->nombre,
					"apellido" 			=> $this->apellido,
					"direccion"		 	=> $this->direccion,
					"telefono" 			=> $this->telefono,
					"mail" 				=> $this->mail,
					"clave" 			=> $this->clave
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se ingreso el cliente correctamente" );
			return $retorno;
	
		}

		public function guardar(){

			if($this->nombre == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
				return $retorno;
			}
			if($this->apellido == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El apellido no puede ser vacio" );
				return $retorno;
			}
	
			$sqlInsert = "UPDATE cliente SET
							nombre			= :nombre,
							apellido		= :apellido,
							direccion	 	= :direccion,
							telefono		= :telefono 
							WHERE documento = :documento;";
	
			$arrayInsert = array(
					"documento" 		=> $this->documento,
					"nombre" 			=> $this->nombre,
					"apellido" 			=> $this->apellido,
					"direccion" 		=> $this->direccion,
					"telefono" 			=> $this->telefono
				);
			$this->persistirConsulta($sqlInsert, $arrayInsert);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el cliente correctamente" );
			return $retorno;
	
		}

		public function cargar($documento){

			if($documento == ""){
				$retorno = array("estado"=>"Error", "mensaje"=>"El documento no puede ser vacio" );
				return $retorno;
			}
			$sql = "SELECT * FROM cliente WHERE documento = :documento";
			$arraySQL = array("documento" => $documento);
			$lista 	= $this->ejecutarConsulta($sql, $arraySQL);
	
			$this->documento 		= $lista[0]['documento'];
			$this->nombre 			= $lista[0]['nombre'];
			$this->apellido 		= $lista[0]['apellido'];
			$this->direccion 	= $lista[0]['direccion'];
			$this->telefono 	= $lista[0]['telefono'];
	
		}

		public function borrar(){

			//$sql = "DELETE FROM alumnos WHERE documento = :documento";
			$sql = "UPDATE cliente SET estado = 0 WHERE documento = :documento";
			$arraySQL = array("documento"=>$this->documento);
			$this->persistirConsulta($sql, $arraySQL);
			$retorno = array("estado"=>"Ok", "mensaje"=>"Se borro el cliente" );
			return $retorno;
	
		}

		public function listar($filtros = array()){

			$sql = "SELECT * FROM cliente WHERE estado = 1 ";
			$arrayDatos = array();
	
			if(isset($filtros['pagina']) && $filtros['pagina'] != ""){
	
				$pagina = ($filtros['pagina'] - 1) * 10;
				$sql .= " ORDER BY documento LIMIT ".$pagina.",10;";		
			
			}else{
	
				$sql .= " ORDER BY documento LIMIT 0,10;";	
	
			}
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			return $lista;
	
		}

		public function totalRegistros(){

			$sql = "SELECT count(*) AS total FROM cliente";
			$arrayDatos = array();
	
			$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
			$totalRegistros = $lista[0]['total'];		
			return $totalRegistros;
	
		}


	}


?>