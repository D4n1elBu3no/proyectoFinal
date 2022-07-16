<?php

	@session_start();
	
	if(isset($_SESSION['nombre'])){

	}else{
		header('Location: login.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="web/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>adminLively</title>
</head>
<body>
    <header>
<?php
    include ("barraNav.php");
?>
      
    </header>
    <main>
			<div class="container">
				<?PHP include ("router.php"); ?>
			</div>
	</main>
    

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="web/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            M.AutoInit();
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems);
  });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
        $(".dropdown-trigger").dropdown();
    </script>
</body>
</html>