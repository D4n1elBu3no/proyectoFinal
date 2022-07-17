<?php

require_once("php/modelos/generico_modelo.php");

class detalle_modelo extends generico_modelo {

	protected $idDetalle;



	public function obtenerBuscarDetalle($idCliente){
		
		$sql = "Busco el tiker WHERE idCliente = $idCliente AND estado = 'abierto' ORDER BY idTicket DESC LIMIT 1";
		
		$resultado = $this->ejecutarConsulta($sql, $arrayDatos);

		if($resultado == ""){
			$sql = "Ingreso el tiket set idCliente = $idCliente, estado = 'abierto' ";
			$this->ejecutarConsulta($sql, $arrayDatos);

			$sql = "Busco el tiker WHERE idCliente = $idCliente AND estado = 'abierto' ORDER BY idTicket DESC LIMIT 1";
			$resultado = $this->ejecutarConsulta($sql, $arrayDatos);
		}

		$idDetalle = $resultado[0]['idTicket'];
		return $idDetalle;

	}


	

}


?>
