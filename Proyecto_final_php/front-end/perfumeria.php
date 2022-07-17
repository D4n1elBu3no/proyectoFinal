<!DOCTYPE html>
<html>
<head>
    <title>Lively - Perfumeria</title>
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

    <h4 class="indigo-text text-darken-4">Perfumeria</h4>

    <!--Carrousel-->

    <section class="container-products">
      <div class="col s6 m4 l4 product">
        <img src="img/perfume.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Perfume Lively</h3>
          <span class="product-price">$799</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/perfume2.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Perfume Vivir</h3>
          <span class="product-price">$849</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/perfume3.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Perfume Ultra</h3>
          <span class="product-price">$999</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/perfume4.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Peerfume Chanel N5</h3>
          <span class="product-price">$1550</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
    </section>
    <br>
    <br>
    <br>

      <footer class="page-footer indigo darken-4">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
                <h5 class="amber-text">Formas de pagos</h5>
                <p class="amber-text">Aceptamos todas las tarjetas, depositos en cuenta bancaria 
                  y giros por redes de cobranza</p>
            </div>
            <div class="col l4 offset-l2 s12">
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
</body>

</html>