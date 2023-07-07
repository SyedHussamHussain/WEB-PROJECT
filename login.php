
<?php
session_start();
include('db.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <header>
           <header style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <a href="/" style="display: block;"><img src="images/HomeAppIconW.png" alt="Logo" style="float: left; height: 50px;"></a>
    <nav style="float: right;">
      <ul style="list-style: none; margin: 0; padding: 0;">
        <li style="display: inline-block;"><a href="dashboard2.php" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">Home</a></li>
        <li style="display: inline-block;"> <a href="expense.php" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">Expense</a></li>
        <li style="display: inline-block;"><a href="manage_familys.php" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">Family</a></li>
        <li style="display: inline-block;"><a href="logout.php" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">Log out</a></li>
      </ul>
    </nav>
  </div>
    </header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="div3">
    <h2>Login</h2>
   
        <div id="formDiv">   

            <form method="post"   action="#">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="abc@def.com"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="password"><br><br>
        <input type="submit" value="Submit" id="submit" class="button input">
      </form>
      <br>
      <div class="div4">
      <a href="Forgot_Password.html"><button>Forgot Password?</button></a>
      <a href="register.php"><button>Register</button></a>
      </form>
  </div>
  <?php

if( isset($_POST['email'])&&$_POST['password'] !='')
{
$email=$_POST['email'];

$password =$_POST['password'];



$sql= "SELECT * FROM `user` WHERE useremail='$email'and userpassword='$password';";
$result=$mysqli->query($sql);

if ($result->num_rows > 0 ) {
    $row=$result->fetch_assoc();
    $_SESSION['username']=$row['username'];
       $_SESSION['useremail']=$row['useremail'];
          $_SESSION['user_id']=$row['user_id'];
          header("location:dashboard2.php");
 }

  else {
  echo "no record found";
}



}
 

  ?>
</div>
</body>
<footer>
<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="/about" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>


</html>