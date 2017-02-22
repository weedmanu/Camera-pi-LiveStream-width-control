<?php 
	
  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))  {  
	     	
	    $com = $_POST['photo'];
		
		$monfichier = fopen('/var/www/html/LiveStream/photo.txt', 'r+');
		$ser= fgets($monfichier); // On lit la première ligne 
		
		if ($com == 1) {	

			$reponse = 1; // On met 1
			fseek($monfichier, 0); // On remet le curseur au début du fichier
			fputs($monfichier, $reponse); // On écrit le nouveau nombre 	
			sleep(1);			
		}	
		
		if ($com == 2) {	

			$reponse = 2; // On met 1
			fseek($monfichier, 0); // On remet le curseur au début du fichier
			fputs($monfichier, $reponse); // On écrit le nouveau nombre 	
			sleep(1);			
		}	
		
}

?>	

<h3>Photo :</h3>

<div style="margin-left:30%">

	<form class="form" method="post" action="photo.php"> 		
	<input type="hidden" name="photo" value="1"><br>
	<input type="image" src="img/icone-photo.png" alt="Submit">
	</form>

</div>		

<?php


$dir_nom = 'Photos'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "Photos prises : \n\n";
	echo "\t\t<ul>\n";
		foreach($fichier as $lien) {
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \"target=\"_blank\">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
	
	echo '<br>';
	echo 'Veux tu effacer les photos ? ';
	echo '<br>';
	echo '
	<form method="post" action="photo.php">
	<input type="radio" name="photo" value="2">
	Oui
	<input type="submit" value="Valider">
	</form> </br>';
}



?>
