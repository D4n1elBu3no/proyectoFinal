<?PHP

    require_once("modelos/cliente_modelo.php");

    $objCliente = new cliente_modelo();

	$error = array();
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objCliente->constructor();
		$error = $objCliente->ingresar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "borrar"){

		$documento = isset($_POST['documento'])?$_POST['documento']:"";
		$objCliente->cargar($documento);	
		$error = $objCliente->borrar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "guardar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objCliente->constructor();
		$error = $objCliente->guardar();

	}

    $arrayFiltro 	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
	}
	$arrayPagina = $objCliente->paginador($arrayFiltro["pagina"]);


	// $listaTiposDocu = $objCliente->listaTipoDocumuento();
	$listaCliente 	= $objCliente->listar($arrayFiltro);


?>

<h4>Cliente</h4>
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
			<form method="POST" action="index.php?r=cliente" class="col s12">
				<h3>Quiere borrar al cliente ?</h3>
				<input type="hidden" name="documento" value="<?=$idRegistro?>" >
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
			$objCliente->cargar($idRegistro);
?>
			<div class="divider"></div>
			<form method="POST" action="index.php?r=cliente" class="col s12">
				<h3>Editar Cliente </h3>
				<input type="hidden" name="documento" value="<?=$idRegistro?>" >
				<input type="hidden" name="accion" value="guardar">
				<div class="row">
					<div class="input-field col s4">
						<input id="first_name" type="text" class="validate" name="nombre" value="<?=$objCliente->obtenerNombre()?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s4">
						<input id="last_name" type="text" class="validate" name="apellido"  value="<?=$objCliente->obtenerApellido()?>">
						<label for="last_name">Apellido</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="direccion" type="text" class="validate" name="direccion"  value="<?=$objCliente->obtenerDireccion()?>">
						<label for="direccion">Direccion</label>
					</div>
					<div class="input-field col s6">
						<input id="documento" type="number" class="validate" name="documento" value="<?=$objCliente->obtenerDocumento()?>" disabled >
					 	<label for="documento">Documento</label>
					</div>
					<div class="input-field col s6">
						<input id="telefono" type="number" class="validate" name="telefono" value="<?=$objCliente->obtenerTelefono()?>" >
						<label for="telefono">Telefono</label>
					</div>
				</div>				
				<button class="btn waves-effect waves-light" type="submit">Guardar
					<i class="material-icons right">send</i>
				</button>
			</form>
			<br><br>
			<div class="divider"></div>
<?PHP } ?>

<a class="waves-effect waves-light btn modal-trigger right indigo darken-4" href="#modal1">Ingresar</a>
	<br><br>
	<table class="striped">
		<thead>
			<tr class="indigo darken-4 amber-text">
				<th>Documento</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Direccion</th>
				<th>Teléfono</th>
				<th class="center-align" style="width: 130px;" >Acciones</th>
			</tr>
		</thead>
		<tbody>

<?php
			foreach($listaCliente as $cliente){
?>
			<tr>
				<td><?=$cliente['documento']?></td>
				<td><?=$cliente['nombre']?></td>
				<td><?=$cliente['apellido']?></td>
				<td><?=$cliente['direccion']?></td>
				<td><?=$cliente['telefono']?></td>
				<td>
					<div class="right">
						<a class="waves-effect waves-light btn" href="index.php?r=cliente&id=<?=$cliente['documento']?>&a=editar">
							<i class="material-icons">create</i>
						</a>
						<a class="waves-effect waves-light btn red" href="index.php?r=cliente&id=<?=$cliente['documento']?>&a=borrar">
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
						<li class="waves-effect"><a href="index.php?r=cliente&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
<?php
					for($i = 1; $i<=$arrayPagina['totalPagina'] ; $i++){
						$activo = "waves-effect";
						if($arrayPagina['pagina'] == $i){
							$activo = "active";
						}						
?>
						<li class="<?=$activo?>"><a href="index.php?r=cliente&p=<?=$i?>"><?=$i?></a></li>
<?php
					}
?>
				    	<li class="waves-effect"><a href="index.php?r=cliente&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>

		</tbody>
	</table>

</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Ingresar Cliente</h5>
			<form method="POST" action="index.php?r=cliente" class="col s12">
				<div class="row">
					<div class="input-field col s6">
						<input id="first_name" type="text" class="validate" name="nombre">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate" name="apellido">
						<label for="last_name">Apellido</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="documento" type="number" class="validate" name="documento">
					 	<label for="documento">Documento</label>
					</div>
					<div class="input-field col s6">
						<input id="telefono" type="number" class="validate" name="telefono">
						<label for="telefono">Telefono</label>
					</div>
					<div class="input-field col s12">
						<input id="direccion" type="text" class="validate" name="direccion">
						<label for="direccion">Direccion</label>
					</div>
					<div class="input-field col s6">
						<input id="mail" type="text" class="validate" name="mail">
						<label for="mail">Mail</label>
					</div>
					<div class="input-field col s6">
						<input id="clave" type="password" class="validate" name="clave">
						<label for="clave">Clave</label>
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