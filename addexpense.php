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
<link rel="stylesheet" type="text/css" href="css/addexpp.css"> 
<meta name="viewport" content="width=device-width, initial-scale=1">  

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
<title> Register Page </title>  
<!-- <style>   
Body {  
  font-family:  Helvetica;  
 
background-color: transparent;  
}  
button {   
       background-color: #9ea39f;   
       width: 100%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 50px black;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: auto;   
        background-color: ghostwhite;
    }   
</style>    -->
</head>    

<body>  
   <center> <h2>Add expense</h2> </center>   
        <div id="formDiv">   

            <form method="post"   action="#">
            <label>Expense Name : </label>   
            <input type="expensename" placeholder="Enter Expense Name" name="expensename"  placeholder="expense name">  
            <label>Expense Amount : </label>   
            <input type="expenseamount" placeholder="Enter Expense amount" name="expenseamount" class="input"> 
            <label for="en">Select Expense Category:</label>

    <label for="category"></label>
    <select id="category" name="category">
        <option value="Food">Food</option>
        <option value="Transportation">Transportation</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Other">Other</option><br>
        <br>
   
  
</select>
<br>
         <input type="submit" value="Submit" id="submit" class="save">
        
          
                     
           <!--      <a href="expense.php"><button>Back</button></a> -->
         
             <!-- <button type="button" <href"expense.php>"class="cancelbtn"> BACK</button>  -->
</form>   
<?php


if( isset($_POST['expensename'])&& $_POST['expenseamount']&&$_POST['category']!='')
{

   $name = $_POST['expensename'];
    $amount = $_POST['expenseamount'];
    $category = $_POST['category'];
    // $categoryf=$_POST['family'];


$sql="INSERT INTO `expense`(`expense_name`, `expense_amount`, `expense_category`,`user_ids`) 
VALUES ('$name','$amount','$category','".$_SESSION['user_id']."');"; 


if ($mysqli->query($sql) == true ) {
  echo "New record created successfully";
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

</html