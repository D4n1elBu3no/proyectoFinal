<?php

@session_start();

require_once("generico_modelo.php");

class detalle_modelo extends generico_modelo {

	protected $idDetalle;

    protected $idOrden;

    protected $idProducto;

    Protected $cantidad;

    public function constructor(){

		$this->idDetalle 		= $this->validarPost('id');
		$this->idOrden 			= $this->validarPost('id_orden');
		$this->idProducto 		= $this->validarPost('id_producto');
		$this->cantidad 		= $this->validarPost('cantidad');

	}

	public function agregarProductos($producto, $id, $cantidad = 1){
		$_SESSION['carrito'][$id] = array(
			'id' => $producto['id'],
			'nombre' => $producto['nombre'],
			'precio' => $producto['precio'],
			'cantidad' => $cantidad
		);
	}

	public function actualizarProductos($id, $cantidad = FALSE){
		
		if($cantidad){
			$_SESSION['carrito'][$id]['cantidad'] = $cantidad;
		}else{
			$_SESSION['carrito'][$id]['cantidad'] += 1;
		}
		
	}

	public function calcularTotal(){
		$total = 0;
		if(isset($_SESSION['carrito'])){
			foreach($_SESSION['carrito'] as $detalle){
				$total += $detalle['precio'] * $detalle['cantidad'];
			}
		}

		return $total;
	}

	public function cantidadProductos(){
		$total = 0;
		if(isset($_SESSION['carrito'])){
			foreach($_SESSION['carrito'] as $detalle){
				$cantidad++;
			}
		}

		return $cantidad;
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


	public function listar($filtros = array()){

		$sql = "SELECT 
						d.id,
						d.id_orden,
						d.id_producto,
						d.cantidad,
						p.nombre as nombreProducto,
						p.precio as precioProducto
					
					from detalle_orden d
					inner join orden o on o.id = d.id_orden
					inner join productos p on p.id = d.id_producto";
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

}


?>