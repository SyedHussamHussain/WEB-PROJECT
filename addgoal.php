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
	     <link rel="stylesheet" type="text/css" href="css/ag.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
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
<body>
	<!--    <center> <h2> ADD GOAL </h2> </center>  

  <label for="gamount">ENTER GOAL AMOUNT:</label>
  <input type="number" id="gamount" name="gamount"><br><br>
  <label for="tdays">ENTER TOTAL DAYS FOR GOAL:</label>
  <input type="number" id="tdays" name="tdays"><br><br>
  <input type="submit" value="Submit"> -->
  	<center> <h2> ADD GOAL </h2> </center>  

  <form method="post" action=#>
  <label for="goal_name">Goal Name:</label>
  <input type="text" id="goal_name" name="goal_name">
  <label for="target_amount">Target Amount:</label>
  <input type="number" id="target_amount" name="target_amount">
  <input type="submit" value="Add">
</form> 

<?php
// Connect to the database

if( isset($_POST['goal_name'])&& $_POST['target_amount']!='')
{
$goalname =$_POST['goal_name'];
$goalamount =$_POST['target_amount'];

$sql = "INSERT INTO savings_goals (user_id,goal_name, target_amount)
VALUES ('".$_SESSION['user_id']."','$goalname', '$goalamount')";


if ($mysqli->query($sql) == true ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}


?>

</body>

</footer>


   
<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="/about" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>

</html>