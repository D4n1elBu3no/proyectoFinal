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
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                  <i class="material-icons">X</i>
                </div>
              </form>
            </div>
    </header>

    <!--Slider-->

    <div class="slider">
      <ul class="slides">
        <li>
          <img src="img/banner.jpeg"> <!-- random image -->
          <div class="caption left-align">
            <h3 class="green-text text-darken-1">Nueva línea de brochas!</h3>
            <h5 class="light grey-text text-darken-1">Hay una esperando por vos.</h5>
          </div>
        </li>
        <li>
          <img src="img/banner3.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3 class="amber-text text-accent-4">Llegó el verano!</h3>
            <h5 class="light blue-text text-darken-3">Proteje la piel de tu familia.</h5>
          </div>
        </li>
        <li>
          <img src="img/banner4.webp"> <!-- random image -->
          <div class="caption center-align">
            <h3 class="red-text text-lighten-2">Semana de la Belleza</h3>
            <h5 class="light red-text text-lighten-2">Todas tus marcas con un 30% OFF.</h5>
          </div>
        </li>
        <li>
          <img src="img/banner2.jpeg"> <!-- random image -->
          <div class="caption left-align">
            <h3>Nuestros recomendados</h3>
            <h5 class="light grey-text text-lighten-3">Para lograr una piel hidratada.</h5>
          </div>
        </li>
      </ul>
    </div>

    <!--Carrousel-->

    <section class="container-products">
      <div class="col s6 m4 l4 product">
        <img src="img/esmalte.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Esmalte Rosa</h3>
          <span class="product-price">$59</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/esmalte2.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Esmalte celeste</h3>
          <span class="product-price">$55</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/esmalte3.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Esmalte Violeta</h3>
          <span class="product-price">$59</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/esmalte4.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Esmalte Chocolate</h3>
          <span class="product-price">$55</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
    </section>
    <section class="container-products">
      <div class="col s6 m4 l4 product">
        <img src="img/piel.png" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Crema Hidratante</h3>
          <span class="product-price">$259</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/piel2.webp" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Crema para manos</h3>
          <span class="product-price">$115</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/piel3.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Pantalla solar</h3>
          <span class="product-price">$850</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/piel4.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Crema para piernas</h3>
          <span class="product-price">$299</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
    </section>
    <section class="container-products">
      <div class="col s6 m4 l4 product">
        <img src="img/maquillaje.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Base Fit Me</h3>
          <span class="product-price">$499</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/maquillaje2.png" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Mascara</h3>
          <span class="product-price">$329</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/maquillaje3.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Labial</h3>
          <span class="product-price">$299</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
      <div class="col s6 m4 l4 product">
        <img src="img/maquillaje4.jpg" alt="" class="product-img">
        <div class="product-description">
          <h3 class="product-title">Paleta de sombras</h3>
          <span class="product-price">$550</span>
        </div>
        <i class="product-icon fas fa-cart-plus"></i>
      </div>
    </section>
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
      </script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems);
        });
      </script>
</body>

</html>