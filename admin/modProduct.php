<?php
	session_start();
	//si utilisateur ne sait pas se connecter, il demande de s'autentifier
	
    if (!(isset($_SESSION['username']))){
		header("Location: ../login.php");		
		exit();
	}
	
	require_once '../config.php';

    
    if (isset($_POST['submit'])){

        $id = $_POST['id'];

        if(isset($_POST['nom'])){
            $query = 'UPDATE produit SET model ="'.$_POST['nom'].'" WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['prix'])){
            $query = 'UPDATE produit SET prix ='.$_POST['prix'].' WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
            echo $query."<br>";
            $query = "SELECT * FROM item WHERE idProduit=".$id;
            echo $query."<br>";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){

                $idPanier = $row['idPanier'];

                $query = "SELECT * FROM item WHERE idPanier = ".$idPanier;
                echo $query."<br>";
                $result2 = mysqli_query($con,$query);
                $sum = 0;
                while($row = mysqli_fetch_array($result2)){
                    $query = "SELECT * FROM produit WHERE idProduit =".$row['idProduit'];
                    echo $query."<br>";
                    $result3 = mysqli_query($con,$query);
                    $prix = mysqli_fetch_array($result3);
                    $sum += intval($prix['prix']);
                }

                $query = 'UPDATE panier SET prix ='.$sum.' WHERE idPanier = '.$idPanier.'';
                mysqli_query($con,$query);
                echo $query."<br>";
                

            }
        }
        if(isset($_POST['marque'])){
            $query = 'UPDATE produit SET marque ="'.$_POST['marque'].'" WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['pointure'])){
            $query = 'UPDATE produit SET pointure ='.$_POST['pointure'].' WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['couleur'])){
            $query = 'UPDATE produit SET couleur ="'.$_POST['couleur'].'" WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['quantite'])){
            $query = 'UPDATE produit SET quantite ="'.$_POST['quantite'].'" WHERE idProduit = '.$id.'';
            mysqli_query($con, $query);
        }
        
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
	<h2 align="center"> Modifier le produits suivant</h2>
	
    <?php
	//afficher le message de session et supprimer ce message de la variable session
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);  //supprimer le message de la variable session
	}

    //afiche produit
    if(isset($_GET['id'])){
        $query = "SELECT * FROM produit WHERE idProduit=".$_GET['id'];
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);

        echo '<p align="center">';
        echo $row['model'];
        echo '<br>';
        echo $row['prix']."€";
        echo '<br>';
        echo $row['marque'];
        echo '<br>';
        echo $row['pointure'];
        echo '<br>';
        echo $row['couleur'];
        echo '<br>';
        echo $row['quantite'];
        echo "</p>";
    

    //ask champ a changer
    
        echo '<h4 align="center" >Que voulez vous modifier ?</h4>
        <form action="modProduct.php" method="post" align="center">
        
        <input  type="checkbox" id="nom" name="nom" value="true">
        <label for="nom"> nom </label>
        
        <input  type="checkbox" id="prix" name="prix" value="true">
        <label for="prix"> prix </label>
        
        <input  type="checkbox" id="marque" name="marque" value="true">
        <label for="marque"> marque </label>

        <input  type="checkbox" id="pointure" name="pointure" value="true">
        <label for="pointure"> pointure </label>

        <input  type="checkbox" id="couleur" name="couleur" value="true">
        <label for="couleur"> couleur </label>

        <input  type="checkbox" id="quantite" name="quantite" value="true">
        <label for="quantite"> quantite </label>

        <input type="hidden" name="id" value="'.$_GET['id'].'" />
        
        <input  type="submit" name = submit1 value="confirmer">
        
        </form>';
    }

    if(isset($_POST['submit1'])){

        echo '<form action="modProduct.php" method="post" align="center">';
        echo '<p>';
           
        if(isset($_POST['nom'])){
            echo 'nom <input type="text" required name="nom" /> <br>'; 
        }
        if(isset($_POST['prix'])){
            echo 'prix <input type="text" required name="prix" /> <br>'; 
        }
        if(isset($_POST['marque'])){
            echo 'marque <input type="text" required name="marque" /> <br>';
        }
        if(isset($_POST['pointure'])){
            echo 'pointure <input type="text" required name="pointure" /> <br>'; 
        }
        if(isset($_POST['couleur'])){
            echo 'couleur <input type="text" required name="couleur" /> <br>';
        }
        if(isset($_POST['quantite'])){
            echo 'quantite <input type="text" required name="quantite" /> <br>';
        }

        echo '<input type="hidden" name="id" value="'.$_POST['id'].'" />';
        
        echo '<input type="submit" name = "submit" value="Modifier" />';
        echo '</form>';
        echo '</p>';

    }
    
	echo "<br><br>";		
		
	mysqli_close($con);	
	?>
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>