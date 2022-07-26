<?php

		session_start();

        require_once("php/modelos/generico_modelo.php");
        require_once("php/modelos/productos_modelo.php");
        require_once("php/modelos/cliente_modelo.php");
        require_once("php/modelos/detalle_modelo.php");

        
        $objCliente = new cliente_modelo;
        $objDetalle = new detalle_modelo;

        $listarDetalle = $objDetalle->listar($filtros = array());
        
		if(isset($_POST['id']) && $_POST['id']){

			$id = $_POST['id'];
			$objProductos = new productos_modelo;
			$producto = $objProductos->listar($filtros = array());

			if(!$producto)
				header('Location: index.php');

		

		if(isset($_SESSION['carrito'])){

			if(array_key_exists($id, $_SESSION['carrito'])){
				$objDetalle->actualizarProductos($id);
			}else{
				$objDetalle->agregarProducto($producto, $id);
			}
		}else{
			$objDetalle->agregarProducto($producto, $id);
		}
		
		
		}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Lively</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Favicon-->
    <link rel="icon" href="img/favicon.ico">


    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">


</head>
    <body>
        <header>
<?php
        include("barraNav.php");
?>         

        </header>

        <h4>Mi Carrito</h4>
	<br>
	<div class="row">
		<br><br>
		<table class="striped">
			<thead>
				<tr class="light-blue lighten-3">
                    <th>Cantidad</th>      
					<th>Nombre</th>
					<th>Precio</th>	
                    <th>Subtotal</th>				
					<th class="center-align" style="width: 130px;" >Acciones</th>
				</tr>
			</thead>
			<tbody>

	<?php
			if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
				foreach($_SESSION['carrito'] as $detalle){
					$total = $detalle['precio'] * $detalle['cantidad'];
	?>
				<tr>
					<form action="actualizar_carrito.php" method="POST">
					<td><?=$detalle['nombre']?></td>
					<td><?=$detalle['precio']?></td>
					<td>
					<input type="hidden" name="id" value=<?=$detalle['id']?>>
						<input type="text" name="cantidad" value=<?=$detalle['cantidad']?>></td>
					<td><?=print $total?></td>
					<td>
						<div class="right">
							<a class="waves-effect waves-light btn red" href="eliminar_carrito.php?id=<?=$detalle['id']?>&a=borrar">
								<i class="material-icons">delete</i>
							</a>
						</div>	
					</td>
					</form>
				</tr>
				

	<?PHP
				}
			}
	?>
<!-- 
				<tr>
					<td colspan="6">
						<ul class="pagination right">
							<li class="waves-effect"><a href="index.php?r=productos&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
	<?php
						$total = $objDetalle->calcularTotal();
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
				</tr> -->

			</tbody>
			<tfoot>
				<td colspan="3">Total</td>
				<td colspan="1"><?=$total?></td>
			</tfoot>
		</table>
	</div>
</div>
    </body>
</html>