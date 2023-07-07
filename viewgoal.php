
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
     <link rel="stylesheet" type="text/css" href="css/upd.css">
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>
</head>
<style>
	table, th, td {
  border: 2px solid black;
}
</style>
<body>	
	   <center> <h2> VIEW GOAL </h2> </center>  
<!-- <table>
  <tr>
    <th>GOAL NUMBER</th>
    <th>GOAL AMOUNT</th>
    <th>GOAL STATUS</th>
  </tr>
  <tr>
    <td>1</td>
    <td>$1000</td>
    <td>ACTIVE</td>
  </tr>
</table> -->
<form method="post" action="#">
  <label for="savings_amount">Savings Amount:</label><br>
  <input type="number" id="savings_amount" name="savings_amount"><br>
 

    <label for="family">Select a goal:</label>
<select name="family" id="family">
       <?php
  $conn = mysqli_connect("localhost","root","","homeapp");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT goal_name FROM savings_goals where user_id='".$_SESSION['user_id']."'";
  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['goal_name'];
    echo "<option value='$name'>$name</option>";
    $temp=$row['goal_name'];
   }
 ?>  

 <input type="submit" value="Submit">

</form> 
<?php


if( isset($_POST['savings_amount'])&&($_POST['family'])!='')
{

$samount =$_POST['savings_amount'];
$nam =$_POST['family'];

$sql = "UPDATE savings_goals
SET current_savings = current_savings+$samount 
WHERE goal_name = '$nam'  ";



if ($mysqli->query($sql) == true ) {
  echo "updated successfully";
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