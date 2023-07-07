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
    <title>Manage Family</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/fam.css">
</head>
<body>
    <h2>Manage Family</h2>
<?php


$conn = mysqli_connect("localhost","root","","homeapp");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT firstn,fexpense FROM family_member where fp_id='".$_SESSION['user_id']."'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 0) {
    echo "No expenses found.";
} else {
 
    echo "<table>";
    echo "<tr><th>Name</th><th>Expense</th></tr>";


    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['firstn'] . "</td>";
        echo "<td>" . $row['fexpense'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}


?>

    <br>

    <a href="add_fmember.php"><button>Add Family Member</button></a>
    <a href="manage_family.php"><button>Remove Family Member</button></a>
    <a href="dashboard2.php"><button>Back</button></a>
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