<?php 
$error="";
if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] !="" && $_POST['password'] !="" ) {
  try{

    //On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch (Exception $e) {

    //En cas d'erreur on affiche un message et on arrete tout
    die('Erreur : ' . $e->getMessage());
  }
  
  $req = $bdd->prepare('SELECT username , password FROM users WHERE username = :username');
  $req->execute(array(
      'username' => $_POST['username']
      )); 
  $resultat = $req->fetch();
  //verifie si $resultat est pas vide et que le mot de passe equivaut + creation session
if ($resultat !="" &&  password_verify($_POST['password'],$resultat['password'])){
  session_start();
  $_SESSION['username']=$_POST['username'];
  $_SESSION['password']=$_POST['password'];

//se souvenir de moi
if($_POST['remember']=="on"){
  setcookie("username",$_POST['username'],time()+10000);
  setcookie("password",$_POST['password'],time()+10000);

}
header("Location: index.php");
}
//affichage message d'erreur
else{
  $error="<span id='error' style='color:red;font-size:24px;position:relative;top:40px;'> mot de passe incorrect </span>";
}

}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
<nav class="navbar navbar-light bg-transparent">
  <a class="navbar-brand" href="connexion.php">
    <img src="css/media/logo.gif" width="190" height="70" alt="">
  </a>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md">
    </div>
    <div class="col-md col-sm-12">
<div id="main">
    <h3>Se connecter</h3>
        <form method="POST" action="connexion.php" >
        <input class="input" type ="name" name="username" placeholder="  Pseudo" autocomplete="off"><br>
        <input class="input" type ="password" name="password" placeholder="  Mot de passe"><br>
        <input type="checkbox" name="remember"> <label>Se souvenir de moi</label> <br>
        <a href="reset.php">Mot de passe oublié? </a><br>
        <input id="connect" type="submit" name="submit" value="Connexion">
        </form>
        <?php echo $error; ?>
    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez vous</a> </p>
    
</div>
    </div>
    <div class="col-md">
      
    </div>
  </div>
</div>
  





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>