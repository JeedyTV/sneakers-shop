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
            $query = 'UPDATE client SET nom ="'.$_POST['nom'].'" WHERE idClient = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['prenom'])){
            $query = 'UPDATE client SET prenom ='.$_POST['prenom'].' WHERE idClient = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['telephone'])){
            $query = 'UPDATE client SET telephone ="'.$_POST['telphone'].'" WHERE idClient = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['email'])){
            $query = 'UPDATE client SET email ='.$_POST['email'].' WHERE idClient = '.$id.'';
            mysqli_query($con, $query);
        }
        if(isset($_POST['username'])){
            $query = 'UPDATE client SET username ="'.$_POST['username'].'" WHERE idClient = '.$id.'';
			mysqli_query($con, $query);
		}
		if(isset($_POST['mdp'])){
			$query = 'UPDATE client SET mdp ="'.$_POST['mdp'].'" WHERE idClient = '.$id.'';
			mysqli_query($con, $query);
        }
        
        header("Location: home.php?id=".$id."");		
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
		<li class="menu"><a  href="home.php?id=<?php echo $_GET["id"]?>">Produits</a></li>
			<li class="menu"><a  href="modAccount.php?id=<?php echo $_GET["id"]?>">Modifer Compte</a></li>
		</ul> 			
		<ul class="menu_s"> <!--Menu opétations-->
        <li class="menu_s"><a href="signout.php">Se déconnecter</a></li>
		</ul>
			
	</div> <!-- fin menu -->
	
	<div> <!-- début contenu -->
	<h2 align="center"> Changer son compte</h2>
	
    <?php
	//afficher le message de session et supprimer ce message de la variable session
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);  //supprimer le message de la variable session
	}

    //afiche produit
    if(isset($_GET['id'])){

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
       

    //ask champ a changer
    
        echo '<h4 align="center" >Que voulez vous modifier ?</h4>
        <form action="modAccount.php" method="post" align="center">
        
        <input  type="checkbox" id="nom" name="nom" value="true">
        <label for="nom"> nom </label>
        
        <input  type="checkbox" id="prenom" name="prenom" value="true">
        <label for="prenom"> prenom </label>
        
        <input  type="checkbox" id="telephone" name="telephone" value="true">
        <label for="telephone"> telephone </label>

        <input  type="checkbox" id="adresse email" name="email" value="true">
        <label for="adress email"> adress email </label>

        <input  type="checkbox" id="username" name="username" value="true">
		<label for="username"> username </label>
		
		<input  type="checkbox" id="mdp" name="mdp" value="true">
        <label for="mdp"> mdp </label>

        <input type="hidden" name="id" value="'.$_GET['id'].'" />
        
        <input  type="submit" name = submit1 value="confirmer">
        
        </form>';
    }

    if(isset($_POST['submit1'])){

        echo '<form action="modAccount.php?id='.$_POST['id'].'" method="post" align="center">';
        echo '<p>';
           
        if(isset($_POST['nom'])){
            echo 'nom <input type="text" required name="nom" /> <br>'; 
        }
        if(isset($_POST['prenom'])){
            echo 'prenom <input type="text" required name="prenom" /> <br>'; 
        }
        if(isset($_POST['telephone'])){
            echo 'telephone <input type="text" required name="telephone" /> <br>';
        }
        if(isset($_POST['email'])){
            echo 'adresse email <input type="text" required name="email" /> <br>'; 
        }
        if(isset($_POST['username'])){
            echo 'username <input type="text" required name="username" /> <br>';
		}
		if(isset($_POST['mdp'])){
            echo 'mdp <input type="password" required name="mdp" /> <br>';
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