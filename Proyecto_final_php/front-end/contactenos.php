<!DOCTYPE html>
<html>
<head>
    <title>Contactenos</title>
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
<header>
  <?php
      include("barraNav.php");
  ?>         
</header>

<body>

    <div class="container">
      <h4 class="indigo-text text-darken-4">Contáctenos</h4>
    </div>
    
    
    <div class="row center-align">
        <form class="col s12 m12 offset-l2 l6">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea"></textarea>
              <label for="textarea1">Textarea</label>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 offset-l2 l6">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="container right">
              <div class="row center">
                <button class="btn indigo darken-4" type="submit" name="action">Enviar
                    <i class="material-icons right">send</i>
                </button>
              </div>
          </div>
        </form>
      </div>   
      <br>
      <br>
      
      <footer class="page-footer indigo darken-4">
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