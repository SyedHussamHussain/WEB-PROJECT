
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
	   <center> <h2> VIEW PROGRESS OF GOALS </h2> </center>  


<form method="post" action="#">

 

    <label for="family">Select a goal:</label>
<select name="family" id="family"><br>
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


 <input type="submit" value="View goal">

</form> 

<?php

$conn = mysqli_connect("localhost","root","","homeapp");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if( isset($_POST['family'])&&($_POST['family'])!='')
{


$nam =$_POST['family'];

$sql = "SELECT target_amount, current_savings from savings_goals 
WHERE goal_name = '$nam'  ";
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_assoc($result);
$value1 = $row['target_amount'];
$value2 = $row['current_savings'];

$per = ($value2/ $value1)*100;

 echo '<div style="width:500px;height:20px;border:1px solid #ccc;">';
  echo '<div style="width:' . $per . '%;height:20px;background-color:green;"></div>';
  echo '</div>';
  echo '<p>Goal: ' . $value1 . '</p>';


if ($mysqli->query($sql) == true ) {
  echo "$per";
  echo"percent";
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