<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier

    if (!(isset($_SESSION['username'])) || !(isset($_GET['id'])) || $_GET['id']=='' ){
		session_start();
		$_SESSION = array();
		unset($_SESSION['username']);
		session_destroy();
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
	<title>Sneakers Kingdom</title>
</head>
<body>
<div class="contenant"><!-- début contenant -->		
	<div class="menu"> <!-- début menu -->
		<ul class="menu"> <!-- Menu de gestion-->
            <li class="menu"><a  href="home.php?id=<?php echo $_GET["id"]?>">Produits</a></li>
			<li class="menu"><a  href="modAccount.php?id=<?php echo $_GET["id"]?>">Modifer Compte</a></li>
		</ul> 			
		<ul class="menu_s"> <!--Menu opétations-->
        <li class="menu_s"><a href="signout.php">Se déconnecter</a></li>
		</ul>
			
	</div> <!-- fin menu -->

	<?php
	$query = "SELECT * FROM client WHERE idClient=".$_GET['id'];
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);

        echo '<p align="center">';
        echo "Nom : ".$row['nom'];
        echo '<br>';
        echo "Prenom : ".$row['prenom'];
        echo '<br>';
        echo "email : ".$row['email'];
        echo '<br>';
        echo "telephone : 0".$row['telephone'];
        echo '<br>';
		echo "Username : ".$row['username'];
		echo '<br>';
		echo "mot de passe : ".$row['mdp'];
        echo "</p>";
	?>
	<div> <!-- début contenu -->
	<h2 align="center">PRODUITS</h2>
	
	
    <?php
	
	//afficher le message de session et supprimer ce message de la variable session
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);  //supprimer le message de la variable session
	}
	
	$result = mysqli_query($con, "SELECT * FROM produit");

	echo '<h4 align="center" >Que voulez vous modifier ?</h4>
        <form action="panier.php?id='.$_GET["id"].'" method="post" >
		<input  type="submit" name = submit1 value="Faire le panier"> <hr>';
	$nb_item = 0;
	while($row = mysqli_fetch_array($result)){
		
		$idproduit = $row['idProduit'];

		$prix = $row['prix'];
		echo '<input  type="checkbox" id="'.$nb_item.'" name="'.$nb_item.'" value="'.$idproduit.'">';
        echo '<label for="'.$nb_item.'"> '.$model.' </label>';
		echo '<p for="'.$nb_item.'">' ;

		echo 'Pointure '.$row['pointure'];
		echo '<tr> Prix: '.$prix;

		echo '<select name="quantite'.$nb_item.'">';
		$count = 1;
		while($count <= $row['quantite'] ){
			echo '<option value="'.$count.'">'.$count.'</option>';
			$count = $count + 1;
		}
		echo '</select>';

		
		echo '<input type ="hidden" name="prix'.$nb_item.'" value="'.$prix.'"/>';
		 
		echo '</p>';

		echo '<hr>';
		
		$nb_item = $nb_item + 1;
		
	}
	
	echo '<input type="hidden" name="id" value="'.$_GET['id'].'" />
        <input type ="hidden" name="nb_item" value="'.$nb_item.'"/>
        </form>';

	echo "<br><br>";
	?>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>