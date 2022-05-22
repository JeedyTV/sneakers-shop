<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier
	
    if (!(isset($_SESSION['username']))){
		header("Location: ../login.php");		
		exit();
	}
	
	require_once '../config.php';
	
	//quand utilisateur clique sur le bouton delete
	if (isset($_GET['supp'])){
        $idProduit = $_GET['supp'];

		$query = "SELECT * FROM item WHERE idProduit=".$idProduit;
		
		$result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result)){

			$idPanier = $row['idPanier'];
			$iditem = $row['idItem'];
			$query = "DELETE FROM item WHERE idItem=".$iditem;
			
        	mysqli_query($con,$query);

			$query = "SELECT * FROM item WHERE idPanier = ".$idPanier;
			
		
			$result2 = mysqli_query($con,$query);
			$sum = 0;
			while($row = mysqli_fetch_array($result2)){
				$query = "SELECT * FROM produit WHERE idProduit =".$row['idProduit'];
				
				$result3 = mysqli_query($con,$query);
				$prix = mysqli_fetch_array($result3);
				$sum += intval($prix['prix']);
			}

			$query = 'UPDATE panier SET prix ='.$sum.' WHERE idPanier = '.$idPanier.'';
			mysqli_query($con,$query);
			

		}
 
		$query = "DELETE FROM produit WHERE idProduit=".$idProduit;
		
		if (mysqli_query($con,$query)){
			$_SESSION['message'] = "<center>produit ".$idProduit." est supprimé!</center> <br>";   //mettre le message dans la session
		}else{
			$_SESSION['message'] = "<center>".mysqli_error($con).".</center> <br>";
		}		
		header("Location: sneakers.php"); // rédiriger vers la même page
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
	<h2 align="center"> Produits</h2>
    <h3 align="center"> Ajouter produit</h3>
    <form action="addProduit.php" align="center">
    <input type="submit" value="Ajouter">
    </form> 
	<hr>
    <?php
	//afficher le message de session et supprimer ce message de la variable session
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);  //supprimer le message de la variable session
	}
		
	$result = mysqli_query($con, "SELECT * FROM produit");

	echo '<table style="width:100%">';
  	echo '<tr><th>Nom</th><th>Prix</th><th>Marque</th><th>Pointure</th><th>Couleur</th><th>Quantite</th><th>Modifier</th><th>Supp</th></tr>';

	while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row['model'].'</td>';
		echo '<td>'.$row['prix'].'</td>';
		echo '<td>'.$row['marque'].'</td>';
        echo '<td>'.$row['pointure'].'</td>';
        echo '<td>'.$row['couleur'].'</td>';
		echo '<td>'.$row['quantite'].'</td>';
		
		echo "<td width=\"5%\"> <a href=modProduct.php?id=".$row['idProduit'].">
			<img src=\"stylo.png\" alt=\"change_etat\" height=\"30\"></a></td>";
		echo "<td width=\"5%\"> <a href=sneakers.php?supp=".$row['idProduit'].">
		<img src=\"trash.png\" alt=\"change_etat\" height=\"30\"></a></td>";
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