<?php
	session_start();
	//tester si la session du client n'est pas encore terminée, on laisse le client accéder à l'application
	
	
	//si la session de l'utilisateur existe, il n'oblige pas de s'authentifier et il donne accès à l'application
	
	if (isset($_SESSION['username'])){
		if($_SESSION['username'] == 'admin'){
			header("Location: admin/home.php");
			exit();
		}else{
			session_start();
			$_SESSION = array();
			unset($_SESSION['username']);
			session_destroy();
			header("Location: login.php");
			exit();	
		}
		
	}
	
	//quand le client appluie sur le bouton login.
	if (isset($_POST['sub_btn'])){
		
		require_once 'config.php'; 
		
		//trouver si client et son mot de pass sont corrects dans la base de données.
		$username = $_POST['username'];
		$password = $_POST['password'];	
		$query = "SELECT * FROM client WHERE username = '" .$username. "' AND Mdp = '".$password."'";
		$result = mysqli_query($con, $query);
		$nbLigne = mysqli_num_rows($result); 
		$row = mysqli_fetch_array($result);
		mysqli_close($con); //fermer la connection
		
		//$nbLine > 0, c'est à dire si le client et mot de pass du client sont corrects. On redirige vers page pizza
		if($nbLigne > 0){
			$_SESSION['username']=$username;
			$_SESSION['cart']=array();
			if($username == 'admin'){
				header("Location: admin/home.php");
				exit();
			}else{
				header("Location: client/home.php?id=".$row["idClient"]."");
				exit();
			}
			
		}else{  // dans le cas contraire, on met message d'erreur dans une variable de session et on relance la page
			$_SESSION['message'] = "<center class=\"alert\">Mauvais Username ou mot de passe</center><br>";
			header("Location: login.php");				
			exit();
		}		
	}
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./style.css">

<head>
	<title>Login</title>
</head>
<body>
<br>
<div class="contenant"><!-- début contenant -->		
	<div class="menu"> <!-- début menu -->
		<ul class="menu"> <!-- Menu de gestion-->
			<li class="menu"><a class="active" href="login.php">Se connecter</a></li>			
		</ul> 		
		
	</div> <!-- fin menu -->	
	
	<div> <!-- début contenu -->
	<h2 align ="center"> Se connecter</h2> 
	<?php 
	
	//il est affiché quand le client ou son mot de passe ne sont pas corrects.
	if (isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	?>
	<form name="login" action="login.php" " method="post">
	<table align="center" border=0>
	
	<tr><td align=right>Username </td><td><input type="text" name="username" required></td></tr>
	<tr><td align=right>Password </td><td><input type="password" name="password" required></td></tr>
	</select></td></tr>
	<tr><td></td><td align=right><input type="submit" name="sub_btn" value="Se connecter"></td></tr>
	</table>
	</form>	
	</div> <!-- fin contenu -->		
</div><!-- fin contenant -->
</body>
</html>