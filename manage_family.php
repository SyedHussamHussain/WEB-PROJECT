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
    <link rel="stylesheet" type="text/css" href="css/df.css">
</head>
<body>
    <h2>Manage Family</h2>
    <?php

    $conn = mysqli_connect("localhost","root","","homeapp");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT f_id ,firstn,fexpense  FROM family_member";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Expense</th></tr>";
    // Output data of each row

    while($row = mysqli_fetch_assoc($result)) {
      // $id = $row["f_id"];
          $name = $row["firstn"];
         

        echo "<tr><td>" . $row["firstn"]. "</td><td>" . $row["fexpense"]. "</td></tr>";

              echo "<td><form action='deletefamilymem.php' method='post'><input type='hidden' name='firstn' value='$name'/><input type='submit' value='Delete' /></form></td></tr>";


    }
    echo "</table>";
} else {
    echo "0 results";
}


?>
  <!--   <table border="1" width="100%">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Income</th>
            <th>Expenses</th>
        </tr>
        <tr>
            <th>1</th>
            <th>Abdullah</th>
            <th>10000</th>
            <th>10000</th>
        </tr>
    </table>
    <br>
    <a href="Add_Fmember.html"><button>Add Family Member</button></a>
    <a href="Remove_Fmember.html"><button>Remove Family Member</button></a>
    <a href="Dashboard.html"><button>Back</button></a> -->

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