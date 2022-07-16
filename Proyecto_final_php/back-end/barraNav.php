<nav>
	<div class="nav-wrapper indigo darken-4">
		<a href="index.php" class="brand-logo center amber-text">adminLively</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons amber-text">menu</i></a>
			<ul id="nav-mobile" class="hide-on-med-and-down">
				<li><a class="amber-text" href="index.php?r=productos">Productos</li>
				<li><a class="amber-text" href="index.php?r=marca">Marca</a></li>
				<li><a class="amber-text" href="index.php?r=categoria">Categoria</a></li>
				<li><a class="amber-text" href="index.php?r=cliente">Clientes</a></li>
				<li><a class="amber-text" href="index.php?r=orden">Pedidos</a></li>
			</ul>
			<ul>
				<li class="right hide-on-med-and-down">					
					<a class="dropdown-trigger amber-text" href="#!" data-target="dropdown1">
						<i class="material-icons right">account_circle</i>
					</a>
				</li>
			</ul>
	</div>
</nav>
<!-- Menu mobile -->
<ul  class="sidenav indigo darken-4" id="mobile-demo">
	<li>
		<a class="dropdown-trigger amber-text" href="#!" data-target="dropdown1">
			<i class="material-icons right">account_circle</i>
		</a>
	</li>
	<li><a class="amber-text" href="index.php?r=productos">Productos</a></li>
	<li><a class="amber-text" href="index.php?r=marca">Marca</a></li>
	<li><a class="amber-text" href="index.php?r=categoria">Categoria</a></li>
	<li><a class="amber-text" href="index.php?r=cliente">Clientes</a></li>
	<li><a class="amber-text" href="index.php?r=orden">Pedidos</a></li>
</ul>
	 <!-- Menu del boton  -->
	 <ul id="dropdown1" class="dropdown-content">
			<li><a href="#!" class="light-blue-text text-darken-4">Perfil</a></li>
			<li><a href="logout.php" class="light-blue-text text-darken-4">Salir</a></li>
			<li class="divider"></li>
			<li><a href="#!" class="light-blue-text text-darken-4">Usuarios</a></li>
</ul>