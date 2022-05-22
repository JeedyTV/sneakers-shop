<?php
    require_once '../config.php';
    if(isset($_POST['nom'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];

        $query = 'INSERT INTO client (nom,prenom,telephone,email,username,mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$telephone.'","'.$email.'","'.$username.'","'.$mdp.'")';
        mysqli_query($con, $query);

    }
    mysqli_close($con); 
    header("Location: ../home.php");
    exit();
?>
