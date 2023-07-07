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
<link rel="stylesheet" type="text/css" href="css/test.css">
  <title> </title>
</head>
<body>

  <center> <h2> DASHBOARD </h2> </center><br>


<?php
     
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
echo "Total amount spent: $amountSpents";

  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


 
?>
<br>
<div class="dashboard">
  <!-- Option 1 -->
  <div class="options">
    <div class="option-name">Option 1</div>
    <div class="option-amount">$100</div>
  </div>
  <!-- Option 2 -->
  <div class="options">
    <div class="option-name">Option 2</div>
    <div class="option-amount">$200</div>
  </div>
  <!-- Option 3 -->
  <div class="options">
    <div class="option-name">Option 3</div>
    <div class="option-amount">$300</div>
  </div>
  <!-- Option 4 -->
  <div class="options
<br>

<button onclick="document.location='manage_family.html'">MANAGE MEMBERS</button>
<br>
<button onclick="document.location='expense.php'">MANAGE EXPENSES</button>
<br>
<button onclick="document.location='stats.html'">VIEW STATS</button>
<br>
<button onclick="document.location='setgoal.html'">SET GOAL</button>
<br>
<button onclick="document.location='login.html'">SIGN OUT</button>
<br>
</body>
</html>