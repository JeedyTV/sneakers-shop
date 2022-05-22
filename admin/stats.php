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
	<p>
    <?php
    $query = 'SELECT AVG(prix) as stat FROM produit';
    $result = mysqli_query($con,$query);
    $stat1 = mysqli_fetch_array($result)['stat'];
    echo 'moyenne des prix des sneakers ='.$stat1;
    echo '<br>';
    $query = 'SELECT AVG(prix) as stat FROM panier';
    $result = mysqli_query($con,$query);
    $stat2 = mysqli_fetch_array($result)['stat'];
    echo 'moyenne des prix des paniers ='.$stat2;
    echo '<br>';
    $query = 'SELECT AVG(quantites) as stat FROM ( SELECT SUM(quantite) AS quantites FROM item GROUP BY idPanier ) AS moy';
    $result = mysqli_query($con,$query);
    $stat = mysqli_fetch_array($result)['stat'];
    echo 'moyenne des quantite dans les paniers ='.$stat;
    echo '<br>';
	$query = 'SELECT AVG(POW(prix, 2)) as stat FROM produit';
    $result = mysqli_query($con,$query);
    $stat = mysqli_fetch_array($result)['stat'];
    $stat = sqrt($stat - pow($stat1,2));
    echo 'ecart-type des prix des sneakers ='.$stat;
    echo '<br>';
    $query = 'SELECT AVG(POW(prix, 2)) as stat FROM panier';
    $result = mysqli_query($con,$query);
    $stat = mysqli_fetch_array($result)['stat'];
    $stat = sqrt($stat - pow($stat2,2));
    echo 'ecart-type des prix des paniers ='.$stat;
    echo '<br>';
	
	mysqli_close($con);	
	?>
    </p>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>