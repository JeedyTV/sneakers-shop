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
	<title>Espace client</title>
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
	
	<div> <!-- début contenu -->
	<h2 align="center"> Voici votre Panier </h2>
	
    <?php
    
    $idclient = $_GET['id'];
    $nb_item = $_POST['nb_item'];
    $prixPranier = 0;
    
    $count = 0;
   
    while($count < intval($nb_item)){
        if(isset($_POST[$count])){
            $prixPranier = $prixPranier + $_POST['prix'.$count]*$_POST['quantite'.$count];
        }
        $count = $count + 1;
    }

    $query = 'INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ("'.date("Y-m-d").'",'.$prixPranier.','.$idclient.',0)';

    mysqli_query($con, $query);
    
    $query = 'SELECT idPanier FROM panier WHERE idClient = '.$idclient.' and prix = '.$prixPranier;
    
    $result = mysqli_query($con, $query);

    $idPanier = mysqli_fetch_array($result)['idPanier'];

    $count = 0;
    while($count < intval($nb_item)){
        
        if(isset($_POST[$count])){
            $idProduit = $_POST[$count];
            $quantite = $_POST['quantite'.$count];
            $query = 'INSERT INTO Item (idPanier,idProduit,quantite) VALUES ('.$idPanier.','.$idProduit.','.$quantite.')';
            mysqli_query($con, $query);
        }
        
        $count = $count + 1;
    }

	
    $result = mysqli_query($con, "SELECT * FROM panier WHERE idPanier=".$idPanier);
    $row = mysqli_fetch_array($result);
    echo '<table style="width:100%">';
  	echo '<tr><th>Prix</th></tr>';
    $query = 'SELECT * FROM item WHERE item.idPanier = '.$idPanier;
    $result3 = mysqli_query($con, $query);
    echo '<tr>';
    echo '<td>'.$row['prix'].'</td>';
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
            echo '</li>';
        }
    echo '</ul>';
    echo '</td>';
    echo '</tr>';
		
	echo '</table>';		
	echo "<br><br>";
    		
	mysqli_close($con);	
	?>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>