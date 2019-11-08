<?php
$bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$id = $_GET['id'];

$sql="DELETE FROM commande WHERE id_vid = $id";
$statement = $bdd->query($sql);

header('location:eshopB.php');