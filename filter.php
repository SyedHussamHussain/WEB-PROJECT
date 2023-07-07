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
     <link rel="stylesheet" type="text/css" href="css/filter.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expense Filter</title>
</head>
<body>

    <center> <h2>Filter Expense</h2> </center>   
        <div id="formDiv">   

            <form method="post"   action="#">
              <label for="en">Select Expense Category:</label>

     <label for="category"></label>
    <select id="category" name="category">
        <option value="Food">Food</option>
        <option value="Transportation">Transportation</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Other">Other</option><br>
        <br>
   <input type="submit" value="Filter" id="submit" class="save">
  
</select>
</form><br>

<?php
$db = new mysqli("localhost","root","","homeapp");
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

if( isset($_POST['category'])!=''){

 
    $cat = $_POST['category'];
 

$sql = "SELECT expense_name, expense_amount FROM expense WHERE expense_category  = '" . $cat. "' and user_ids='".$_SESSION['user_id']."'";

$result = $db->query($sql);
if ($db->query($sql) == true ) {
  echo "<table>";
echo "<tr><th>Expense Name</th><th>Expense Amount</th></tr>";
while ($row = $result->fetch_assoc()) {
    // echo $row['expense_name'] . ': ' . $row['expense_amount'] . '<br>';
      echo '<tr>';
    echo '<td>' . $row['expense_name'] . '</td>';
    echo '<td>' . $row['expense_amount'] . '</td>';
    echo '</tr>';
  
}
  echo "</table>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}







?>

</div>






</body>
<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="/about" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>
</html>