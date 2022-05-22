<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier
	
    if (!(isset($_SESSION['username']))){
		header("Location: ../login.php");		
		exit();
	}
	
	require_once '../config.php';
	
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style.css">
<head>
	<title>Tableau de bord</title>
</head>
<body>
<div class="contenant"><!-- début contenant -->		
	<div class="menu"> <!-- début menu -->
		<ul class="menu"> <!-- Menu de gestion-->
            <li class="menu"><a  href="home.php">Commande</a></li>
			<li class="menu"><a  href="sneakers.php">Sneakers</a></li>
			<li class="menu"><a href="client.php">Client</a></li>
            <li class="menu"><a href="stats.php">Statistiques</a></li>
		</ul> 			
		<ul class="menu_s"> <!--Menu opétations-->
        <li class="menu_s"><a href="signout.php">Se déconnecter</a></li>
		</ul>
			
	</div> <!-- fin menu -->
	
	<div> <!-- début contenu -->
	<h2 align="center"> Clients </h2>
	
    <?php
		
	$result = mysqli_query($con, "SELECT * FROM client");

	echo '<table style="width:100%">';
  	echo '<tr><th>Nom</th><th>Prenom</th><th>Telephone</th><th>email</th></tr>';

	while($row = mysqli_fetch_array($result)){
		
		echo '<tr>';
		echo '<td>'.$row['nom'].'</td>';
		echo '<td>'.$row['prenom'].'</td>';
		echo '<td>0'.$row['telephone'].'</td>';
        echo '<td>'.$row['email'].'</td>';
		echo '</tr>';
	} 
	echo '</table>';		
	echo "<br><br>";		
		
	mysqli_close($con);	
	?>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>