<?php

require_once("generico_modelo.php");
require_once("productos_modelo.php");
require_once("cliente_modelo.php");

class orden_modelo extends generico_modelo {

    protected $id;

    protected $fecha;

	protected $documento;

    protected $total;

    public function constructor(){

        $this->id 		= $this->validarPost('id');
        $this->fecha 			= $this->validarPost('fecha');
        $this->$documento 		= $this->validarPost('documento');
        $this->total 		= $this->validarPost('total');
    }

    public function obtenerId(){
        return $this->id;
    }
    public function obtenerFecha(){
        return $this->fecha;
    }
    public function obtenerDocumento(){
        return $this->documento;
    }
    public function obtenerTotal(){
        return $this->total;
    }

    public function cargarOrden ($id){

        $sql = "SELECT * FROM orden WHERE id = :id; ";
        $arrayDatos = array("id"=>$id);
        $lista 		= $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;

    }

    public function listar($filtros = array()){

		$sql = "SELECT * FROM orden WHERE estado = 1 ";
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

		$sql = "SELECT count(*) AS total FROM orden";
		$arrayDatos = array();

		$lista 	= $this->ejecutarConsulta($sql, $arrayDatos);
		$totalRegistros = $lista[0]['total'];		
		return $totalRegistros;

	}

}


?>
