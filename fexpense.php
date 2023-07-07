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
       <link rel="stylesheet" type="text/css" href="css/fexp.css">
<meta name="viewport" content="width=device-width, initial-scale=1">  
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
            <label>Expense name : </label>   
            <input type="expensename" placeholder="Enter expensename" name="expensename"  placeholder="expense name"><br><br>
            <label>Expense amount : </label>   
            <input type="expenseamount" placeholder="Enter Expense amount" name="expenseamount" class="input"><br><br>
            <label for="family">Select family member:</label>
            <select name="family" id="family">


       <?php
  $conn = mysqli_connect("localhost","root","","homeapp");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT firstn FROM family_member where fp_id='".$_SESSION['user_id']."'";
  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['firstn'];
    echo "<option value='$name'>$name</option>";
    $temp=$row['firstn'];
   }
 ?>    
  
</select>
<br>
         <input type="submit" value="Submit" id="submit" class="save">
        
          
                     
           
         
             <button type="button" class="cancelbtn">Back</button> 
</form>   
<?php




if(isset($_POST['expensename'])&& $_POST['expenseamount']&&$_POST['family']!=''){
 $name = $_POST['expensename'];
    $amount = $_POST['expenseamount'];
  $familynu=$_POST['family'];
      
      $sqls = "SELECT f_id FROM family_member WHERE firstn = '$familynu'";
$result = mysqli_query($mysqli, $sqls);
$row = mysqli_fetch_assoc($result);
$fid = $row['f_id'];



    $sql="INSERT INTO `family_member`( `f_id`,`fp_id`, `firstn`,`fexpense`, `fename`) 
    VALUES ('$fid','".$_SESSION['user_id']."','$familynu','$amount','$name');";

    
if ($mysqli->query($sql) == true ) {
  echo "family member expense added successfully";
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