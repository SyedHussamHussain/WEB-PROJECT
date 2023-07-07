<?php
include('db.php'); 
session_start();
if(!isset($_SESSION['user_id'])){
  die("please log in");
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
     <link rel="stylesheet" type="text/css" href="css/addf.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Family Member</title>
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
</head>
<body>
    <div class="div7">
    <h2>Add Family Member</h2>
    </div>
 
        <div id="formDiv">   

            <form method="post"   action="#">
        <label for="text">First Name:</label><br>
        <input type="text" id="first_name" name="fname" placeholder="abc"><br>
        <label for="Last Name">Last Name:</label><br>
        <input type="text" id="email" name="lname" placeholder="def"><br>
                <button type="submit" class="cancelbtn">ADD</button>  
      </form>
      
      <div class="div8">
      <a href="manage_familys.php"><button>Back</button></a>
      </div>

<?php

if( isset($_POST['fname'])&& $_POST['lname']!='')
{

$username =$_POST['fname'];
$password =$_POST['lname'];


$sql= "INSERT INTO `family_member`( `fp_id`, `firstn`, `lastn`) 
 VALUES ('".$_SESSION['user_id']."','$username','$password');";


if ($mysqli->query($sql) == true ) {
  echo "New family member added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
 

  ?>
</div>

</body>
<footer>
    </footer>


   
<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="/about" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>

</footer>

</html>