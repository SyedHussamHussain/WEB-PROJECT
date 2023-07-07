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
       <link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Register Page </title>  
<style>   
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
</style>   
</head>    

<body>  
 


    <center> <h2>Add expense</h2> </center>   
        <div id="formDiv">   

            <form method="post"   action="#">
            <label>Expensename : </label>   
            <input type="expensename" placeholder="Enter expensename" name="expensename"  placeholder="expense name">  
            <label>Expenseamount : </label>   
            <input type="expenseamount" placeholder="Enter Expense amount" name="expenseamount" class="input"> 
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
         <input type="submit" value="Submit" id="submit" class="save">
        
          
                     
           
         
             <button type="button" class="cancelbtn"> BACK</button> 
</form>   
<?php


if( isset($_POST['expensename'])&& $_POST['expenseamount']&&$_POST['category']!='')
{

   $name = $_POST['expensename'];
    $amount = $_POST['expenseamount'];
    $category = $_POST['category'];
    $categoryf=$_POST['family'];


$sql="INSERT INTO `expense`(`expense_name`, `expense_amount`, `expense_category`,`user_ids`) 
VALUES ('$name','$amount','$category','".$_SESSION['user_id']."');"; 


if ($mysqli->query($sql) == true ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}












}



?>
</body>     
</html