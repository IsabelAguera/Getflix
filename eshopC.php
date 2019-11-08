<?php
session_start();
?>
<?php
require_once 'PHPmailer/PHPMailer.php';
require_once 'PHPmailer/SMTP.php';
require_once 'PHPmailer/Exception.php'; 
require_once 'PHPmailer/class.phpmailer.php';
require_once 'PHPmailer/class.smtp.php';

$mail = new PHPMailer();
//SMTP Settings
$mail->isSMTP();
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'seriesaddict5000@gmail.com';
$mail->Password = 'addict5000';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

//Email Settings
$mail->setFrom($_POST['email']);
$mail->addAddress($_POST['email']);
$mail->Subject = 'Your order is confirmed!';
$mail->Body = 'Hey Hi' . $_POST['nom'] . 'your order has been confirmed!';
if($mail->Send()){
    echo '';
}else{
    echo "Mailer Error: " . $mail->ErrorInfo;;
}
?>






<?php
$bdd = new PDO('mysql:host=localhost;dbname=Getflix;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$id = $_SESSION['id_user'];

$sql="DELETE FROM commande WHERE id = $id";
$statement = $bdd->query($sql);

?>
<link rel="stylesheet" href="css/styleEshop.css">
<link rel="stylesheet" href="css/cssIndex.css">
<?php include('NavBar.php'); ?>

<p class="p-5">Your order has been sent successfully.Email have been sent! Check your inbox :)</p>

<?php include('footer.php'); ?>