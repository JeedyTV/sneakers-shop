<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier
	
    if (!(isset($_SESSION['username']))){
		header("Location: ../login.php");		
		exit();
	}
	
	require_once '../config.php';

	if (isset($_GET['change_et'])){
		if ($_GET['etat']==1){
			$query = 'UPDATE panier SET etat =0 WHERE idPanier = '.$_GET['change_et'].'';
			mysqli_query($con,$query);

		}else{
			$query = 'UPDATE panier SET etat =1 WHERE idPanier = '.$_GET['change_et'].'';
			mysqli_query($con,$query);
		}
		//echo $query;
		header("Location: home.php"); // rédiriger vers la même page
		exit();
	}
	
	//quand utilisateur clique sur le bouton delete
	if (isset($_GET['supp'])){
		$idPanier = $_GET['supp'];  //récupérer l'id de  la pizza à effacer
		$query = "DELETE FROM item WHERE idPanier=".$idPanier;
		mysqli_query($con,$query);
		$query = "DELETE FROM panier WHERE idPanier=".$idPanier;
		if (mysqli_query($con,$query)){
			$_SESSION['message'] = "<center>Pannier ".$idPanier." est supprimé!</center> <br>";   //mettre le message dans la session
		}else{
			$_SESSION['message'] = "<center>".mysqli_error($con).".</center> <br>";
		}		
		header("Location: home.php"); // rédiriger vers la même page
		exit();
	}

	if (isset($_GET['supp2'])){
		$idPanier = $_GET['supp2'];
		$idProduit = $_GET['n'];  
		$query = "DELETE FROM item WHERE idProduit = ".$idProduit." and idPanier = ".$idPanier;
		
		mysqli_query($con,$query);
		$query = "SELECT * FROM item WHERE idPanier = ".$idPanier;
		
		$result = mysqli_query($con,$query);
		$sum = 0;
		while($row = mysqli_fetch_array($result)){
			$query = "SELECT * FROM produit WHERE idProduit =".$row['idProduit'];
			
			$result2 = mysqli_query($con,$query);
			$prix = mysqli_fetch_array($result2);
			$sum += intval($prix['prix']);
		}

		$query = 'UPDATE panier SET prix ='.$sum.' WHERE idPanier = '.$idPanier.'';
		
		mysqli_query($con,$query);

		if (mysqli_query($con,$query)){
			$_SESSION['message'] = "<center>item est supprimé!</center> <br>";   //mettre le message dans la session
		}else{
			$_SESSION['message'] = "<center>".mysqli_error($con).".</center> <br>";
		}		
		header("Location: home.php"); // rédiriger vers la même page
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
	<h2 align="center"> COMMANDES</h2>
	
    <?php
	//afficher le message de session et supprimer ce message de la variable session
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);  //supprimer le message de la variable session
	}
	
	
	$result = mysqli_query($con, "SELECT * FROM panier");
	
	echo '<table style="width:100%">';
  	echo '<tr><th>Date de commande</th><th>Prix</th> <th>Client</th><th>Etat</th><th>livre</th><th>supp</th></tr>';
	
	while($row = mysqli_fetch_array($result)){
		
		$query = 'SELECT prenom,nom from client WHERE client.idClient = '.$row['idClient'].'';
		$result2 = mysqli_query($con, $query);
		$row2 = mysqli_fetch_array($result2);
		
		$query = 'SELECT * FROM item WHERE item.idPanier = '.$row['idPanier'];
		$result3 = mysqli_query($con, $query);
		
		echo '<tr>';
		echo '<td>'.$row['date_commande'].'</td>';
		echo '<td>'.$row['prix'].'</td>';
		$d = $row2['prenom'].' '.$row2['nom'];
		echo '<td>'.$d.'</td>';
		if($row['etat'] == 1){
			echo '<td> livré </td>';
		}else{
			echo '<td> pas livré </td>';
		}
		echo "<td width=\"5%\"> <a href=home.php?change_et=".$row['idPanier']."&etat=".$row['etat'].">
			<img src=\"stylo.png\" alt=\"change_etat\" height=\"30\"></a></td>";
		echo "<td width=\"5%\"> <a href=home.php?supp=".$row['idPanier'].">
		<img src=\"trash.png\" alt=\"change_etat\" height=\"30\"></a></td>";
		echo '</tr>';
		echo '<tr>';
		echo '<td>';
		echo '<ul>';
			while($row3 = mysqli_fetch_array($result3)){
				$query = 'SELECT * FROM produit WHERE idProduit = '.$row3['idProduit'];
				$result4 = mysqli_query($con, $query);
				$row4 = mysqli_fetch_array($result4);
				echo '<li>';
				echo 'Sneaker : '.$row4['marque'].' '.$row4['model'].' '.$row4['couleur'].' pointure -> '.$row4['pointure'].' prix unitaire = '.$row4['prix'].'€ '.'Quantité = '.$row3['quantite'].' ';
				echo "<a href=home.php?supp2=".$row3['idPanier']."&n=".$row3['idProduit'].">
				<img src=\"trash.png\" alt=\"change_etat\" height=\"30\"> </a>";
				echo '</li>';
			}
		echo '</ul>';
		echo '</td>';
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