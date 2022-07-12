<?php
    
    require_once("modelos/marca_modelo.php");

    $objMarca = new marca_modelo();

    $error = array();
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objMarca->constructor();
		$error = $objMarca->ingresar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "borrar"){

		$documento = isset($_POST['id_marca'])?$_POST['id_marca']:"";
		$objMarca->cargar($id_marca);	
		$error = $objMarca->borrar();

	}

	if(isset($_POST['accion']) && $_POST['accion'] == "guardar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objMarca->constructor();
		$error = $objMarca->guardar();

	}

    $arrayFiltro 	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
	}
	$arrayPagina = $objMarca->paginador($arrayFiltro["pagina"]);


	$listaMarca 	= $objMarca->listar($arrayFiltro);

?>

<h4>Marca</h4>
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
			<form method="POST" action="index.php?r=marca" class="col s12">
				<h3>Quiere borrar la marca ?</h3>
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
			$objMarca->cargar($idRegistro);
?>
			<div class="divider"></div>
			<form method="POST" action="index.php?r=marca" class="col s12">
				<h3>Editar Marca </h3>
				<input type="hidden" name="id_marca" value="<?=$idRegistro?>" >
				<input type="hidden" name="accion" value="guardar">
				<div class="row">
					<div class="input-field col s4">
						<input id="first_name" type="text" class="validate" name="nombre" value="<?=$objMarca->obtenerNombre()?>">
						<label for="first_name">Nombre</label>
					</div>				
				<button class="btn waves-effect waves-light" type="submit">Guardar
					<i class="material-icons right">send</i>
				</button>
			</form>
			<br><br>
			<div class="divider"></div>
<?PHP } ?>

<a class="waves-effect waves-light btn modal-trigger right" href="#modal1">Ingresar</a>
	<br><br>
	<table class="striped">
		<thead>
			<tr class="light-blue lighten-3">
				<th>Id</th>
				<th>Nombre</th>
				<th class="center-align" style="width: 130px;" >Acciones</th>
			</tr>
		</thead>
		<tbody>

<?php
			foreach($listaMarca as $marca){
?>
			<tr>
				<td><?=$marca['id_marca']?></td>
				<td><?=$marca['nombre']?></td>
				<td>
					<div class="right">
						<a class="waves-effect waves-light btn" href="index.php?r=marca&id=<?=$marca['id_marca']?>&a=editar">
							<i class="material-icons">create</i>
						</a>
						<a class="waves-effect waves-light btn red" href="index.php?r=marca&id=<?=$marca['id_marca']?>&a=borrar">
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
						<li class="waves-effect"><a href="index.php?r=marca&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
<?php
					for($i = 1; $i<=$arrayPagina['totalPagina'] ; $i++){
						$activo = "waves-effect";
						if($arrayPagina['pagina'] == $i){
							$activo = "active";
						}						
?>
						<li class="<?=$activo?>"><a href="index.php?r=marca&p=<?=$i?>"><?=$i?></a></li>
<?php
					}
?>
				    	<li class="waves-effect"><a href="index.php?r=marca&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
					</ul>
				</td>
			</tr>

		</tbody>
	</table>

	</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h5>Ingresar Marca</h5>
			<form method="POST" action="index.php?r=marca" class="col s12">
				<div class="row">
					<div class="input-field col s6">
						<input id="id_marca" type="number" class="validate" name="id_marca">
						<label for="id_marca">Id</label>
					</div>
					<div class="input-field col s6">
						<input id="first_name" type="text" class="validate" name="nombre">
						<label for="first_name">Nombre</label>
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