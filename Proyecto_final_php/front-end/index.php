<?php
      require_once("php/modelos/cliente_modelo.php");
      require_once("php/modelos/productos_modelo.php");
      require_once("php/modelos/marca_modelo.php");
      require_once("php/modelos/categoria_modelo.php");

      $objCliente = new cliente_modelo();
      $objProducto = new productos_modelo();

      $listaProductos = $objProducto->listar($filtros = array());
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

<?PHP
      include("slider.php");
?>

    <!--Carrousel-->

<?php 			
				foreach($listaProductos as $productos){
?>

    <section class="container-products">
      <div class="col s6 m4 l4 product">
        <img src="img/esmalte.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title"><?=$productos['nombre']?></h3>
          <span class="product-price"><?=$productos['precio']?></span>
        </div>
        <form method="POST" action="index.php" class="col s12">

							<input type="hidden" name="codigo" value="<?=$productos['id']?>" >
							<input type="hidden" name="accion" value="agregarProducto">
										
					<div class="row">
						<div class="input-field col s12">
							<input id="name_<?=$productos['id']?>" type="text" class="validate" name="cantidad" value="">
							<label for="name_<?=$productos['id']?>">Cantidad</label>
						</div>
					</div>				
					<button class="btn waves-effect waves-light" type="submit">
            <i class="product-icon fas fa-cart-plus"></i>
					</button>
				</form>
      </div>
    </section>

<?PHP
				}
?>
    

      <footer class="page-footer indigo darken-4">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="amber-text">Formas de pagos</h5>
              <p class="amber-text">Aceptamos todas las tarjetas, depositos en cuenta bancaria 
                y giros por redes de cobranza</p>
             </div>
            <div class="col s12 m6 l6 right">
              <h5 class="amber-text">Links</h5>
              <ul>
                <li><a class="amber-text" href="cuidados-piel.html">Cuidados de la Piel</a></li>
                <li><a class="amber-text" href="unias.html">Uñas</a></li>
                <li><a class="amber-text" href="maquillaje.html">Maquillaje</a></li>
                <li><a class="amber-text" href="perfumeria.html">Perfumeria</a></li>
                <li><a class="amber-text" href="contactenos.html">Contáctenos</a></li>
              </ul>
            </div>
        </div>
        <div class="footer-copyright amber-text center">
          <div class="container">
            <ul>
              <li>Av Central 1520, Montevideo, Uruguay.</li>
              <li>Tel: 29008888</li>
              <li>Email: info@lively.uy</li>
              <li>© 2022 Copyright Lively</li>
            </ul>
          </div>
        </div>
      </footer>

      <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();  
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems);
        });
      </script>
</body>

</html>