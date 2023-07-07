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

  <link rel="stylesheet" type="text/css" href="css/rex.css">
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
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<center> <h2> REMOVE EXPENSE </h2> </center> 
<body>
	
 
           <div id="formDiv">   

            <form method="post"   action="#">
          <input type="enumber" placeholder="Enter Expense ID to remove " name="enumber"  class="input"> 
             <input type="submit"  name="" class="button input" value="Remove">  
          
          </form>

    <?php
$conn = mysqli_connect("localhost","root","","homeapp");

$sql = "SELECT Id , expense_name FROM expense where user_ids='".$_SESSION['user_id']."'";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>Expense ID</th><th>Expense Name</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['expense_name'] . "</td>";
        echo "</tr>";
}
echo "</table>";



     ?>

 <?php
 
if( isset($_POST['enumber'])!='')
{

$phonenumber=$_POST['enumber'];

$sql= "DELETE FROM expense WHERE Id = $phonenumber;";


if ($mysqli->query($sql) == true ) {
  echo "Expense deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}
 ?>
</div>
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