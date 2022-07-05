<?php

	require_once("modelos/productos_modelo.php");

	$objProductos = new productos_modelo();


	// Evaluar las acciones que mando
	$error = array();
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objProductos->constructor();
		$error = $objProductos->ingresar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "borrar"){

		$id = isset($_POST['id'])?$_POST['id']:"";
		$objProductos->cargar($id);	
		$error = $objProductos->borrar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "guardar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objProductos->constructor();
		$error = $objProductos->guardar();

	}

	// Armamos el paginado
	$arrayFiltro 	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
	}
	$arrayPagina = $objProductos->paginador($arrayFiltro["pagina"]);

	$listaProductos 	= $objProductos->listar($arrayFiltro);

?>

<h4>Productos</h4>
<br>
<div class="row">
<a class="waves-effect waves-light btn modal-trigger right" href="#modal1">Ingresar</a>
	<br><br>
	<table class="striped">
		<thead>
			<tr class="light-blue lighten-3">
				<th>Nombre</th>
				<th>Precio</th>
				<th>Marca</th>
				<th>Categoria</th>
				<th class="center-align" style="width: 130px;" >Acciones</th>
			</tr>
		</thead>
		<tbody>

<?php
			foreach($listaProductos as $producto){
?>
			<tr>
				<td><?=$producto['nombre']?></td>
				<td><?=$producto['precio']?></td>
				<td><?=$producto['id_marca']?></td>
				<td><?=$producto['id_categoria']?></td>
				<td>
					<div class="right">
						<a class="waves-effect waves-light btn" href="index.php?r=productos&id=<?=$producto['documento']?>&a=editar">
							<i class="material-icons">create</i>
						</a>
						<a class="waves-effect waves-light btn red" href="index.php?r=productos&id=<?=$producto['documento']?>&a=borrar">
							<i class="material-icons">delete</i>
						</a>
					</div>	
				</td>
			</tr>
			

<?PHP
			}
?>

			<tr>
				<td colspan="6">
					<ul class="pagination right">
						<li class="waves-effect"><a href="sistema.php?r=alumnos&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
<?php
					for($i = 1; $i<=$arrayPagina['totalPagina'] ; $i++){
						$activo = "waves-effect";
						if($arrayPagina['pagina'] == $i){
							$activo = "active";
						}						
?>
						<li class="<?=$activo?>"><a href="sistema.php?r=alumnos&p=<?=$i?>"><?=$i?></a></li>
<?php
					}
?>
				    	<li class="waves-effect"><a href="sistema.php?r=alumnos&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>

		</tbody>
	</table>
</div>