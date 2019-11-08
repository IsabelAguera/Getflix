<?php
session_start();
echo $_POST['email'];
if(isset($_POST['email']) && isset($_POST['subject'])&& $_POST['email'] !=""){
  $to      = 'yassin.assecoum@hotmail.com';
  $subject = $_POST['subject'];
  $message = $_POST['text'];
  $headers = array(
      'From' => $_POST['email'],
      'Reply-To' => 'yassin.assecoum@hotmail.com',
      'X-Mailer' => 'PHP/' . phpversion()
  );
  echo "dlalda";


mail($to, $subject, $message, $headers);
}
?>

    <link rel="stylesheet" href="./css/style4.css">
    


<!--On inclut la NavBar-->
<?php include('NavBar.php'); ?>

<section class="contact">
<div class="container">
  <div class="row">
    <div class="col-md">
    </div>
    <div class="col-md col-sm-12 col-xs-12 mt-3">
<div id="main">
   <h3 class="title1">Contact Us</h3>
   <form method="POST">
  <div class="form-group m-2">
    <label for="exampleFormControlInput1" class="titrep">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="yourmail@example.com">
  </div>
  <div class="form-group m-2">
    <label for="exampleFormControlSelect1" class="titrep">Your subjet: </label>
    <select class="form-control" name="subject" id="exampleFormControlSelect1">
      <option>Question</option>
      <option>Complain</option>
      <option>Advice</option>
    </select>
  </div>
  <div class="form-group m-2">
    <label for="exampleFormControlTextarea1" class="titrep">Your text:  </label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-danger m-2 mb-0">Send</button>
  </form>
   

</div>
    </div>
    <div class="col-md">
    </div>
  </div>
        </div>
    </div>

</div>

</section>
<!--On inclut le footer-->
<?php include('footer.php'); ?>