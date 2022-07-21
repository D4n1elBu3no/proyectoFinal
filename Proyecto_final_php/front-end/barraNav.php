<?php
      require_once("php/modelos/cliente_modelo.php");

      $objCliente = new cliente_modelo;

      $listaClientes = $objCliente->listar($filtros = array());


?>
<nav>
    <div class="nav-wrapper indigo darken-4">
        <a href="index.php?r=productos" class="brand-logo amber-text">Lively</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger amber-text"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="amber-text" href="index.php?r=cuidados-piel">Cuidados de la Piel</a></li>
          <li><a class="amber-text" href="index.php?r=unias">Uñas</a></li>
          <li><a class="amber-text" href="index.php?r=maquillaje">Maquillaje</a></li>
          <li><a class="amber-text" href="index.php?r=perfumeria">Perfumeria</a></li>
          <li><a class="amber-text" href="index.php?r=contactenos">Contáctenos</a></li>
          <li>
<?php
          foreach($listaClientes as $cliente){
?>
            <a class="amber-text"><?=$cliente['nombre']?>

              <i class="material-icons right dropdown-trigger amber-text" data-target="dropdown2" href="#!">account_circle</i>
            </a>
          </li>
<?php } ?>
          <li>
            <a class="amber-text">
              <i class="material-icons right">shopping_cart</i>
            </a>
          </li>
        </ul>

  <!--Menu responsive -->

        <ul class="sidenav indigo darken-4" id="mobile-demo">
        <li>
          <a class="dropdown-trigger amber-text" href="#!" data-target="dropdown1">
            <i class="material-icons right">account_circle</i>
          </a>
        </li>
          <li><a class="amber-text" href="php/vistas/cuidados-piel.php">Cuidados de la Piel</a></li>
          <li><a class="amber-text" href="php/vistas/unias.php">Uñas</a></li>
          <li><a class="amber-text" href="php/vistas/maquillaje.php">Maquillaje</a></li>
          <li><a class="amber-text" href="php/vistas/perfumeria.php">Perfumeria</a></li>
          <li><a class="amber-text" href="php/vistas/contactenos.php">Contáctenos</a></li>
        </ul>


 <!-- Menu del boton  -->
	 <ul id="dropdown1" class="dropdown-content">
			<li><a href="#!" class="light-blue-text text-darken-4">Perfil</a></li>
      <li><a href="#!" class="light-blue-text text-darken-4">Iniciar Sesión</a></li>
			<li><a href="logout.php" class="light-blue-text text-darken-4">Salir</a></li>
			<li class="divider"></li>
    </ul>

  <!-- Menu del boton  -->
  <ul id="dropdown2" class="dropdown-content">
			<li><a href="#!" class="light-blue-text text-darken-4">Perfil</a></li>
      <li><a href="#!" class="light-blue-text text-darken-4">Iniciar Sesión</a></li>
			<li><a href="logout.php" class="light-blue-text text-darken-4">Salir</a></li>
			<li class="divider"></li>
    </ul>
    </div>
</nav>