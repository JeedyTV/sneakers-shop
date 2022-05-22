<!DOCTYPE html>
<html>
<title>Sneakers Kingdom</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">Sneakers Kingdom</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Catalogue</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
      <a href="login.php" class="w3-bar-item w3-button">Se Connecter</a>
      <a href="#signup" class="w3-bar-item w3-button">S'inscrire</a>
    </div>
  </div>
</div>



<!-- Page content -->
<div class="w3-content" style="max-width:1300px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="pic/devanture.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="1000" height="1000">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About the Kingdom</h1><br>
      <h5 class="w3-center">All the best</h5>
      <p class="w3-large">
      Retrouvez vos sneakers préférées chez Sneaker Kingdom.
      </p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Notre Catalogue</h1><br>
      <h4>Air force one</h4>
      <img src="https://www.courir.be/dw/image/v2/BCCL_PRD/on/demandware.static/-/Sites-master-catalog-courir/default/dwf45d9dcd/images/hi-res/001198486_001.jpg?sw=600&sh=600&sm=fit" alt="Air force 1"width="500" height="500">
      <p class="w3-text-grey">La chaussure parfait pour l'été</p><br>
    
      <h4>Converse chuck taylor</h4>
      <img src="https://images.stockx.com/Converse-Chuck-Taylor-All-Star-2-High-Sodalite-Blue.png?fit=clip&bg=FFFFFF&auto=compress&q=90&dpr=2&trim=color&updated_at=1603481985&fm=jpg&ixlib=react-9.1.1&w=2257"width="500" height="300">
      <p class="w3-text-grey">Un must dans votre collection</p><br>
    
      <h4>Jordan 1</h4>
      <img src="https://cdn.shopify.com/s/files/1/2358/2817/products/Wethenew-Sneakers-France-Air-Jordan-1-Retro-High-OG-Fearless-1_2000x.png?v=1571135078"width="500" height="300">
      <p class="w3-text-grey">La première air jordan de l'histoire</p><br>
    
      <h4>Yeezy 350</h4>
      <img src="pic/yeezy.jpg" alt="Yeezy 350"width="500" height="300" >
      <p class="w3-text-grey">Le génie de Kanye West sur vos pieds<br>
    
      <h4>Puma clyde</h4>
      <img src="pic/puma.jpg" alt="puma"width="500" height="500">
      <p class="w3-text-grey">Le classique de Puma</p>    
    </div>
    
  </div>

  <hr>

  
  <div class="w3-container w3-padding-64" id="signup">
    <h1>S'inscrire</h1><br>
    <p class="w3-text-blue-grey w3-large"><b>S'inscire pour commander des sneakers</b></p>
    <form action="client/signup.php"  method="post">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Nom" required name="nom"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Prenom" required name="prenom"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Telephone" required name="telephone"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="email" required name="email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="nom d'utilisateur" required name="username"></p>
      <p><input class="w3-input w3-padding-16" type="password" placeholder="mot de passe" required name="mdp"></p>
      <p><input type="submit" value="S'inscrire" /></p>
    </form>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>N'hésitez pas à nous contacter.</p>
    <p class="w3-text-blue-grey w3-large"><b>Rue renory 285 4031 Angleur</b></p>
    <p>Vous pouvez aussi nous contacter  au 0493105430 ou par email info@sneakerkingdom.com.</p>
  </div>
  
<!-- End page content -->
</div>


</body>
</html>