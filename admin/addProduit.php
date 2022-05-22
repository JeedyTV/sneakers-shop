<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier
	
    if (!(isset($_SESSION['username']))){
		header("Location: ../login.php");		
		exit();
	}
	
	require_once '../config.php';

    if (isset($_POST['submit'])){

		$query = 'INSERT INTO produit (model,prix,marque,quantite,pointure,couleur) VALUES ("'.$_POST['nom'].'",'.$_POST['prix'].',"'.$_POST['marque'].'",1,'.$_POST['pointure'].',"'.$_POST['couleur'].'")';
        mysqli_query($con, $query);
		header("Location: sneakers.php");		
		exit();
        
    }

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
	<h2 align="center"> Entrez les informations</h2>
	
    <form action="addProduit.php" method="post" align="center" enctype="multipart/form-data">
    <p>
    nom <input type="text" required name="nom" /> <br> 
    prix <input type="text" required name="prix" /> <br> 
    marque <input type="text" required name="marque" /> <br>
    pointure <input type="text" required name="pointure" /> <br>
    couleur <input type="text" required name="couleur" /> <br>
    <input type="submit" name = "submit" value="Ajouter" />
    </p>
    </form>
    
	<br><br>		
	<?php	
	mysqli_close($con);	
	?>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>