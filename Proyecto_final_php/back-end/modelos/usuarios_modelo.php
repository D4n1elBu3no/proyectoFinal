<?PHP
    require_once("generico_modelo.php");

    class usuarios_modelo extends generico_modelo{

        protected $id;

        protected $nombre;

        protected $mail;

        protected $clave;

        public function constructor(){
            $this->id 				= $this->validarPost('id');
            $this->nombre 			= $this->validarPost('nombre');
            $this->mail 			= $this->validarPost('mail');
            $this->clave 			= $this->validarPost('clave');
        }

        public function obtenerId(){
            return $this->id;
        }
        public function obtenerNombre(){
            return $this->nombre;
        }
        public function obtenerMail(){
            return $this->mail;
        }

        public function cargarUsuario($idRegistro){

            $sql = "SELECT * FROM usuario WHERE id = :idRegistro; ";
            $arrayDatos = array("idRegistro"=>$idRegistro);
            $lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
            return $lista;
    
        }
    
        public function validarLogin($nombre, $clave){
    
            $sql = "SELECT * FROM usuario WHERE nombre = :nombre AND clave = :clave; ";
            $arrayDatos = array("nombre"=>$nombre, "clave"=>md5($clave));
            $lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
            return $lista;
    
        }
    
    
        public function ingresar(){
    
            if($this->nombre == ""){
                $retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
                return $retorno;
            }
    
            $sqlInsert = "INSERT usuario SET
                            nombre	= :nombre,
                            mail	= :mail,
                            clave 	= :clave,
                            estado	= 1 ;";
    
            $arrayInsert = array(
                    "nombre" 	=> $this->nombre,
                    "mail" 		=> $this->mail,
                    "clave" 	=> $this->clave
            );
            $this->persistirConsulta($sqlInsert, $arrayInsert);
            $retorno = array("estado"=>"Ok", "mensaje"=>"Se ingreso el usuario correctamente" );
            return $retorno;
        }
    
    
    
    
        public function guardar(){
    
            if($this->nombre == ""){
                $retorno = array("estado"=>"Error", "mensaje"=>"El nombre no puede ser vacio" );
                return $retorno;
            }
            
            $sqlInsert = "UPDATE usuario SET
                            nombre	= :nombre,
                            mail	= :mail,
                            WHERE id = :id;";
    
            $arrayInsert = array(
                    "id" 		=> $this->id,
                    "nombre" 	=> $this->nombre,
                    "mail" 		=> $this->mail
                );
            $this->persistirConsulta($sqlInsert, $arrayInsert);
            $retorno = array("estado"=>"Ok", "mensaje"=>"Se guardo el usuario  correctamente" );
            return $retorno;
    
        }
    
        public function cargar($id){
    
            if($id == ""){
                $retorno = array("estado"=>"Error", "mensaje"=>"El id no puede ser vacio" );
                return $retorno;
            }
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $arraySQL = array("id" => $id);
            $lista 	= $this->ejecutarConsulta($sql, $arraySQL);
    
            $this->id 		= $lista[0]['id'];
            $this->nombre 	= $lista[0]['nombre'];
            $this->mail 	= $lista[0]['mail'];
    
        }
    
        public function borrar(){
    
            $sql = "UPDATE usuario SET estado = 0 WHERE id = :id";
            $arraySQL = array("id"=>$this->id);
            $this->persistirConsulta($sql, $arraySQL);
            $retorno = array("estado"=>"Ok", "mensaje"=>"Se borro el Usuario" );
            return $retorno;
    
        }
    
    
    
    
        public function listar($filtros = array()){
    
            $sql = "SELECT * FROM cliente WHERE estado = 1 ";
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
    
            $sql = "SELECT count(*) AS total FROM cliente";
            $arrayDatos = array();
    
            $lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
            $totalRegistros = $lista[0]['total'];		
            return $totalRegistros;
    
        }
    
    }

?>
