<?php 
	
$srv_addr = "http://${_SERVER['SERVER_ADDR']}:8080";

  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))  {
	  
	    $lecteur = $_POST['cam']; 	 	    
	   
	    
	    $monfichier = fopen('/var/www/html/LiveStream/cam.txt', 'r+');
		$cam = fgets($monfichier); // On lit la première ligne 	    
	    
		if ($lecteur == 'play') {	

			$rep = 1; // On met 1
			fseek($monfichier, 0); // On remet le curseur au début du fichier
			fputs($monfichier, $rep); // On écrit le nouveau nombre 			
			sleep(1);		
			$affiche = "<iframe class='cam' src='$srv_addr/cam.html' /></iframe>";	
			$affiche2 = "<iframe class='cam' src='photo.php'></iframe>";						
						
			} else  { 	
				
				$rep = 2; // On met 2
				fseek($monfichier, 0); // On remet le curseur au début du fichier
				fputs($monfichier, $rep); // On écrit le nouveau nombre 							
				$affiche = "";	
				$affiche2 = "";				
				 										
			}		
				
}

?>

<!DOCTYPE html> 
<head> 
	<meta charset="utf-8" /> 
	<title>Live Streaming motorisé</title> <!-- titre -->
	<link rel="icon" type="image/png" href="img/cam.png" />
    <script type="text/javascript" src="dateheure.js"></script> <!-- appel de la fonction date et heure javascript --> 
    <link rel="stylesheet" href="index.css" /> <!-- appel du thème de la page -->   

</head>   

<body>

 <header> 		
	
	<div class="element" id="date">
		
		<script type="text/javascript">window.onload = date('date');</script>
	</div>  
	
	<div class="element" id="titre">
		
		<h1>Live Streaming motorisé</h1>
	</div>
	
	<div class="element" id="heure">
		
		<script type="text/javascript">window.onload = heure('heure');</script>
	</div>	
		
 </header>
 
<div id="content">
	
    <main>
		<div class="cam" class="element"><?php echo $affiche;?></div>
	</main> 
    
    
    <nav>	

		<iframe class="cam" src="servo.php"></iframe>
			 
    </nav>   
    
    <aside>		
    
		<?php echo $affiche2;?>		
		  
    </aside>
    
    
</div>

<footer>
	
	<div class="element"></div>
	<div class="element"></div>
	
	<div class="element">

		<h3>Live streaming :</h3>
		
	</div>
	
	<div class="element">

		<form class="form" method="post" action="index.php"> 		
		<input type="hidden" name="cam" value="play"><br>
		<input type="submit" name="play" id="play" value="play" />
		</form>
		
	</div>
	
	<div class="element">
		
		<form class="form" method="post" action="index.php"> 		
		<input type="hidden" name="cam" value="stop"><br>
		<input type="submit" name="stop" id="stop" value="stop" />
		</form>
	
	</div>		
	
	<div class="element"></div>
	<div class="element"></div>
	
</footer>

 
 </body>

</html>
