<?php

require_once("php/modelos/generico_modelo.php");

class detalle_modelo extends generico_modelo {

	protected $idDetalle;

    protected $idOrden;

    protected $idProducto;

    Protected $cantidad;

    public function constructor(){

		$this->idDetalle 		= $this->validarPost('id');
		$this->idOrden 			= $this->validarPost('id_orden');
		$this->idProducto 		= $this->validarPost('id_producto');
		$this->cantidad 	= $this->validarPost('cantidad');

	}

    public function cargarLineas($idDetalle){
        $sqlInsert = "INSERT detalle_orden SET
						id              = :id,
						id_orden	    = :idOrden,
						id_producto		= :idProducto,
						cantidad 	    = :cantidad,
						estado			= 0 ;";

		$arrayInsert = array(
				"id" 		    => $this->id,
				"id_orden" 		=> $this->idOrden,
				"id_producto" 	=> $this->idProducto,
				"cantidad" 	    => $this->cantidad
			);
        
		$lista = $this->persistirConsulta($sqlInsert, $arrayInsert);
        return $lista;
    }


	public function obtenerDetalle($documento){
		
		$sql = "SELECT * FROM orden WHERE documento = $documento AND estado = 0 ORDER BY id DESC LIMIT 1";
		
		$resultado = $this->ejecutarConsulta($sql, $arrayDatos);

		if($resultado == vacio){
			$sql = "
            INSERT TO set documento = $documento, estado = 0 ";
			$this->ejecutarConsulta($sql, $arrayDatos);

			$sql = "SELECT FROM orden WHERE documento = $documento AND estado = 0 ORDER BY id DESC LIMIT 1";
			$resultado = $this->ejecutarConsulta($sql, $arrayDatos);
		}

		$idDetalle = $resultado[0]['idDetalle'];
		return $idDetalle;

	}


	

}


?>