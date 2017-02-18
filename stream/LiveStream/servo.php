<?php 
	
  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))
  {  
	     	
	    $commande = $_POST['com'];
	    			
		
		$monfichier2 = fopen('/var/www/html/LiveStream/servo.txt', 'r+');
		$ser= fgets($monfichier2); // On lit la première ligne 
		
		if ($commande == '1') {	

			$reponse = 2; // On met 1
			fseek($monfichier2, 0); // On remet le curseur au début du fichier
			fputs($monfichier2, $reponse); // On écrit le nouveau nombre 	
			sleep(1);
		}
		
		if ($commande == '2') {	

			$reponse = 1; // On met 2
			fseek($monfichier2, 0); // On remet le curseur au début du fichier
			fputs($monfichier2, $reponse); // On écrit le nouveau nombre 	
			sleep(1);
		}
			
		if ($commande == '3') {	

			$reponse = 3; // On met 3
			fseek($monfichier2, 0); // On remet le curseur au début du fichier
			fputs($monfichier2, $reponse); // On écrit le nouveau nombre 	
			sleep(1);
		}
			
		if ($commande == '4') {	

			$reponse = 4; // On met 4
			fseek($monfichier2, 0); // On remet le curseur au début du fichier
			fputs($monfichier2, $reponse); // On écrit le nouveau nombre 	
			sleep(1);
		}

		if ($commande == '5') {	

			$reponse = 5; // On met 5
			fseek($monfichier2, 0); // On remet le curseur au début du fichier
			fputs($monfichier2, $reponse); // On écrit le nouveau nombre 	
			sleep(1);	
		}				
		
}

?>


<table id="table">   
   
   <br/>   

   <tr>
       <td></td>
       <td></td>
       <td>		
		    <p><form class="form" method="post" action="servo.php"> 		
			<input type="hidden" name="com" value="4"><br>
			<input type="image" src="img/fleche-haut.png" alt="Submit" >
			</form></p>
		</td>
       <td></td>
       <td></td>
   </tr>
   <tr>
       <td>
		    <p><form class="form" method="post" action="servo.php"> 		
			<input type="hidden" name="com" value="2"><br>
			<input type="image" src="img/fleche-gauche.png" alt="Submit" >
			</form></p>
		</td>
		<td></td>
       <td>
		   	<p><form class="form" method="post" action="servo.php"> 		
			<input type="hidden" name="com" value="5"><br>
			<input type="image" src="img/fleche-centre.png" alt="Submit" >
			</form></p>
		</td>
		<td></td>
       <td>
			<p><form class="form" method="post" action="servo.php"> 		
			<input type="hidden" name="com" value="1"><br>
			<input type="image" src="img/fleche-droite.png" alt="Submit" >
			</form></p>
       </td>
       
   </tr>
      <tr>
       <td></td>
       <td></td>
       <td>
			<p><form class="form" method="post" action="servo.php"> 		
			<input type="hidden" name="com" value="3"><br>
			<input type="image" src="img/fleche-bas.png" alt="Submit" >
			</form></p>
       </td>
       <td></td>
       <td></td>
   </tr>


   
</table>



