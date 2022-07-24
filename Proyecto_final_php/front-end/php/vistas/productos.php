    <!--Carrousel-->

    <?php 			
				foreach($listaProductos as $productos){
?>

    <!-- <section class="container-products">
      <div class="row">
      <div class="col s6 m6 l6 product">
        <img src="../back-end/<?=$productos['imagen']?>" alt="" class="product-img">
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
      </div>
      
    </section> -->

<main>
  <div class="row">
    <div class="col s6 m4 l4">
      <div class="card">
        <div class="card-image">
          <img src="../back-end/<?=$productos['imagen']?>">
          <button class="btn-floating halfway-fab waves-effect waves-light indigo darken-4" type="submit">
            <i class="product-icon fas fa-cart-plus"></i>
					</button>
        </div>
        <div class="card-content">
          <span class="card-title"><?=$productos['nombre']?></span>
          <span class="product-price"><?=$productos['precio']?></span>
        </div>
        <form action="index.php" method="POST">

          <input type="hidden" name="codigo" value="<?=$productos['id']?>" >
          <input type="hidden" name="accion" value="agregarProducto">
          <div class="row">
            <div class="input-field col s12">
              <input id="name_<?=$productos['id']?>" type="text" class="validate" name="cantidad" value="">
              <label for="name_<?=$productos['id']?>">Cantidad</label>
            </div>
          </div>
        </form>
       	
      </div>
    </div>
  </div>
</main>



<?PHP
				}
?>