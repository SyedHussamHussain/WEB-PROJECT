<?php
include('db.php'); 
session_start();
if(!isset($_SESSION['user_id'])){
  die("please log in");
};

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/fam.css">
	<title>Home</title>
   <header style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <a href="dashboard2.php" style="display: block;"><img src="images/HomeAppIconW.png" alt="Logo" style="float: left; height: 50px;"></a>
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
        </div>
    </div>
    <!-- Amounts -->
    <div class="amounts">
    <div class="amount">
            <h2>Total Spent</h2>
            <h2> <?php
     
$mysqli = new mysqli("localhost","root","","homeapp");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql ="SELECT SUM(expense_amount) AS total_spent FROM expense where user_ids='".$_SESSION['user_id']."'"; 


if ($mysqli->query($sql) == true ) {
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$amountSpents= $row['total_spent']; 
echo "$amountSpents";

  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


 
?> PKR</h2>
        <!-- </div>
        <div class="amount">
            <h2>Loan Amount</h2>
            <p>$XXX.XX</p>
        </div>
    </div> -->
	<div class="dashboard">
    <!-- Dashboard options -->
    <div class="options">
        <div class="option">
            <button onclick="document.location='expense.php'"<a href="#">Manage Expenses</a>
        </div>
         <div class="option">
            <button onclick="document.location='filter.php'"<a href="#">Filter Expense</a>
        </div>
            <div class="option">
            <button onclick="document.location='update.php'"<a href="#">Update Expense</a>
        </div>
        <div class="option">
           <button onclick="document.location='manage_familys.php'" <a href="#">Manage Family Members</a>
        </div>
        <div class="option">
            <button onclick="document.location='setgoal.php'"<a href="#">Set Goals</a>

    <!-- Sign out button -->
   <!--  <div class="sign-out">
         <button onclick="document.location='logout.php'"<a href="#">Sign Out</a>
    </div>
 -->



</body>









  </div>
  <div>
      


  </div>

  <div>
      

  </div>
</footer>


   
<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="about.html" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>



</html>