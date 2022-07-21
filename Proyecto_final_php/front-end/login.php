<?PHP
    require_once("php/modelos/cliente_modelo.php");

    $estado = "";
    $cliente = isset($_POST['nombre'])?$_POST['nombre']:"";
    $clave = isset ($_POST['clave'])?$_POST['clave']:"";

        if($cliente != "" && $clave != ""){

            $objCliente = new cliente_modelo;
            $respuesta = $objCliente->validarLogin($cliente, $clave);

            if(isset($respuesta[0]['documento']) && $respuesta[0]['documento'] != ""){

                @session_start();
                $_SESSION['fecha'] = date("y-m-a");
                $_SESSION['nombre'] = $respuesta[0]['nombre'];
                $_SESSION['mail'] = $respuesta[0]['mail'];

                header('Location: index.php');
            }else{
                $estado = "Error";
            }
        }
?>


<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  	<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

	  	<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <header>
<?php
    include ("barraNav.php");
?>
      
    </header>
        <main>
            <div class="container">
                <div>
					<?PHP if($estado == "Error"){ ?>
						<div class="red lighten-4 valign-wrapper" style="height:70px">
							<h5 class="center-align" style="width:100%">
								Error en el usuario y/o clave
							</h5>
						</div>
					<?PHP } ?>
						<form method="POST" action="login.php">
							<div class="row">
								<div class="input-field col s12 m12 l6 offset-l3">
									<input id="first_name" type="text" class="validate" name="nombre">
									<label for="first_name">Nombre</label>
								</div>
								
							</div>
							<div class="row">
								<div class="input-field col s12 m12 l6 offset-l3">
									<input id="last_name" type="password" class="validate" name="clave">
									<label for="last_name">Clave</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 l6 offset-l3">
									<input type="hidden" name="accion" value="ingresar">
									<button class="btn waves-effect waves-light center-align" type="submit">Entrar
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</form>
				</div>
			</div>
	    </main>
    <!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/materialize.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();			
			});	
			document.addEventListener('DOMContentLoaded', function() {
				var elems = document.querySelectorAll('.dropdown-trigger');
				var instances = M.Dropdown.init(elems);
			});
		</script>
    </body>
</html>