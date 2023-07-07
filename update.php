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
	 <link rel="stylesheet" type="text/css" href="css/upd.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	  <center> <h2>Update Expense</h2> </center>   
   <!--      <div id="formDiv">   

            <form method="post"   action="#">
            <label>Expensename : </label>   
            <input type="expensename" placeholder="Enter expensename" name="expense name"  placeholder="expense name"><br> 
            <label>Expenseamount : </label><br>   
            <input type="expenseamount" placeholder="Enter Expense amount" name="expense amount" class="input"> 
            <label for="en">Select expense category:</label>

    <label for="category"></label>
    <select id="category" name="category">
        <option value="Food">Food</option>
        <option value="Transportation">Transportation</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Other">Other</option><br>
        <br>
 
  
</select>
<br>
         
</form>  -->  
<?php

// Connect to the database
$db = new mysqli("localhost","root","","homeapp");

// Check for connection errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT  Id, expense_name, expense_amount, expense_category FROM expense WHERE user_ids='".$_SESSION['user_id']."'; ";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // Output the expenses as a dropdown menu
	echo '<div id="formDiv">'; 
  echo '<form method="post" action="#">';
  echo '<select name="Id">';
  while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['Id'] . '">' . $row['expense_name'] . '</option>';
  }
  echo '</select>';
  echo '<br>';
  echo '<input type="text" name="name" placeholder="Name">';
  echo '<br>';
  echo '<input type="text" name="amount" placeholder="Amount">';
  echo '<br>';
  echo '<input type="text" name="category" placeholder="Category">';
  echo '<br>';
  echo '<input type="submit" name="update" value="Update">';
  echo '</form>';
} else {
  echo "No expenses found";
}



if (isset($_POST['update'])) {
  // Get the new values for the expense
  $new_name = $_POST['name'];
  $new_amount = $_POST['amount'];
  $new_category = $_POST['category'];


  $Ide= $_POST['Id'];

  // Update the expense in the database
  $sql = "UPDATE expense SET expense_name = '$new_name', expense_amount = '$new_amount', expense_category = '$new_category' WHERE Id = '$Ide'";
  if ($db->query($sql) === TRUE) {
    echo "Expense updated successfully";
  } else {
    echo "Error updating expense: " . $db->error;
  }
}


$db->close();

?>


</body>

<footer style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <p style="margin: 0;">Copyright 2023 HomeApp, All rights reserved.</p>
    <ul style="list-style: none; margin: 0; padding: 0;">

      <li style="display: inline-block;"><a href="/about" style="color: #fff; display: block; padding: 10px 20px; text-decoration: none;">About</a></li>
 </ul>
</footer>
</html>