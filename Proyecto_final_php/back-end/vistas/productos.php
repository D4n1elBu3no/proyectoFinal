<?php

	require_once("modelos/productos_modelo.php");
	require_once("modelos/marca_modelo.php");
	require_once("modelos/categoria_modelo.php");

	$objProductos = new productos_modelo();

	$objMarca = new marca_modelo();
	$selectMarca = $objMarca->listarSelect();

	$objCategoria = new categoria_modelo();
	$selectCategoria = $objCategoria->listarSelect();


	// Evaluar las acciones que mando
	$error = array();
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){
		
		$rutaImagen = $objProductos->subirImagen(600,600);

		if($rutaImagen ){
			$objProductos->constructor();
			$objProductos->cargarImagen($rutaImagen);
			$error = $objProductos->ingresar();
		}else{
			$error = array("estado"=>"Error", "mensaje"=>"Error al subir la imagen" );
		}
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
<div>
	<!-- Modal Trigger -->
	
	<?PHP if(isset($error['estado']) && $error['estado']=="Error"){ ?>
		<div class="red valign-wrapper" style="height:70px">
			<h5 class="center-align" style="width:100%">
	<?PHP	print_r($error['mensaje']); ?>
			</h5>
		</div>
	<?PHP } ?>

	<?PHP if(isset($error['estado']) && $error['estado']=="Ok"){ ?>
		<div class="teal lighten-4 valign-wrapper" style="height:70px">
			<h5 class="center-align" style="width:100%">
	<?PHP print_r($error['mensaje']); ?>
			</h5>
		</div>
	<?PHP } ?>

	<?PHP 

if(isset($_GET['a']) && $_GET['a'] == "borrar"){ 
			$idRegistro = isset($_GET['id'])?$_GET['id']:"";

?>
			<div class="divider"></div>
			<form method="POST" action="index.php?r=productos" class="col s12">
				<h3>Quiere borrar al producto ?</h3>
				<input type="hidden" name="id" value="<?=$idRegistro?>" >
				<button class="btn waves-effect waves-light" type="submit" name="accion" value="borrar">Aceptar
					<i class="material-icons right">delete_sweep</i>
				</button>
				<button class="btn waves-effect waves-light red" type="submit" name="accion">Cancelar
					<i class="material-icons right">cancel</i>
				</button>
			</form>
			<br><br>
			<div class="divider"></div>
<?PHP } ?>

<?PHP 
		if(isset($_GET['a']) && $_GET['a'] == "editar" && isset($_GET['id']) && $_GET['id'] != ""){ 
			$idRegistro = isset($_GET['id'])?$_GET['id']:"";
			$objProductos->cargar($idRegistro);
?>
			<div class="divider"></div>
			<form method="POST" action="index.php?r=productos" class="col s12">
				<h3>Editar Producto </h3>
				<input type="hidden" name="id" value="<?=$idRegistro?>" >
				<input type="hidden" name="accion" value="guardar">
				<div class="row">
					<div class="input-field col s6">
						<input id="first_name" type="text" class="validate" name="nombre" value="<?=$objProductos->obtenerNombre()?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate" name="precio"  value="<?=$objProductos->obtenerPrecio()?>">
						<label for="last_name">Precio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4">
						<input id="id" type="number" class="validate" name="id" value="<?=$objProductos->obtenerId()?>" disabled >
					 	<label for="id">Id</label>
					</div>
					<div class="input-field col s4">
						<select id="id_marca" name="id_marca" >
							<option value="" disabled selected>Seleccione una opcion</option>
<?php
							foreach($selectMarca as $marca){
?>
							<option value="<?=$marca['id_marca']?>"><?=$marca['nombre']?></option>
<?php
							}
?>
						</select>
						<label>Marca</label>
					</div>
					<div class="input-field col s4">
						<select id="id_categoria" name="id_categoria" >
							<option value="" disabled selected>Seleccione una opcion</option>
<?php
							foreach($selectCategoria as $categoria){
?>
							<option value="<?=$categoria['id_categoria']?>"><?=$categoria['nombre']?></option>
<?php
							}
?>
						</select>
						<label>Categoria</label>
					</div>
				</div>				
				<button class="btn waves-effect waves-light" type="submit">Guardar
					<i class="material-icons right">send</i>
				</button>
			</form>
			<br><br>
			<div class="divider"></div>
<?PHP } ?>

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
					<th>Imagen</th>
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
					<td><?=$producto['nombreMarca']?></td>
					<td><?=$producto['nombreCategoria']?></td>
					<td>
						<img src="<?=$producto['imagen']?>" width="100px">
					</td>
					<td>
						<div class="right">
							<a class="waves-effect waves-light btn" href="index.php?r=productos&id=<?=$producto['id']?>&a=editar">
								<i class="material-icons">create</i>
							</a>
							<a class="waves-effect waves-light btn red" href="index.php?r=productos&id=<?=$producto['id']?>&a=borrar">
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
							<li class="waves-effect"><a href="index.php?r=productos&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
	<?php
						for($i = 1; $i<=$arrayPagina['totalPagina'] ; $i++){
							$activo = "waves-effect";
							if($arrayPagina['pagina'] == $i){
								$activo = "active";
							}						
	?>
							<li class="<?=$activo?>"><a href="index.php?r=productos&p=<?=$i?>"><?=$i?></a></li>
	<?php
						}
	?>
							<li class="waves-effect"><a href="index.php?r=productos&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
						</ul>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4>Ingresar Producto</h4>
		<form method="POST" action="index.php?r=productos" class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input id="first_name" type="text" class="validate" name="nombre">
					<label for="first_name">Nombre</label>
				</div>
				<div class="input-field col s4">
					<input id="last_name" type="text" class="validate" name="precio">
					<label for="last_name">Precio</label>
				</div>
			</div>
			<div class="row">
			<div class="input-field col s4">
						<select id="id_marca" name="id_marca" >
							<option value="" disabled selected>Seleccione una opcion</option>
<?php
							foreach($selectMarca as $marca){
?>
							<option value="<?=$marca['id_marca']?>"><?=$marca['nombre']?></option>
<?php
							}
?>
						</select>
						<label>Marca</label>
					</div>
					<div class="input-field col s4">
						<select id="id_categoria" name="id_categoria" >
							<option value="" disabled selected>Seleccione una opcion</option>
<?php
							foreach($selectCategoria as $categoria){
?>
							<option value="<?=$categoria['id_categoria']?>"><?=$categoria['nombre']?></option>
<?php
							}
?>
						</select>
						<label>Categoria</label>
					</div>
			</div>
			<div class="row">
					<div class="file-field input-field">
						<div class="btn indigo darken-4">
							<span>Archivo</span>
							<input type="file" name="archivos" multiple>
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Seleccione un archivo" name="imagen">
						</div>
					</div>
				</div>
			<input type="hidden" name="accion" value="ingresar">
			<button class="btn waves-effect waves-light" type="submit">Enviar
				<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
	</div>
</div>