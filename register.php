<?php
include('db.php'); 
?>

<!DOCTYPE html>   
<html>   
<head>  
        <header>
           <header style="background-color: #333; color: #fff; padding: 20px;">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    <a href="dashboard2.php" style="display: block;"><img src="images/HomeAppIconW.png" alt="Logo" style="float: left; height: 50px;"></a>
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
       <link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Register Page </title>  

</head>    

<body>    
    <center> <h2> REGISTER </h2> </center>   
   
        <div id="formDiv">   

            <form method="post"   action="#">
            <label>Username : </label>   
            <input type="username" placeholder="Enter Username" name="username"  class="input">  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" class="input"> 
            <label>Email:</label> 
          <input type="email" placeholder="Enter Email" name="email"  class="input"> 
                <label>Phone Number:</label> 
          <input type="phonenumber" placeholder="Enter  Phone number" name="phonenumber"  class="input"> 
             <input type="submit"  name="" class="button input">  
              <button type="submit" class="cancelbtn">Login</button>   
          
               <br>
               <br>
         
       

           
        
    </form>   

  <?php

if( isset($_POST['email'])&& $_POST['username']&&$_POST['password']&& $_POST['phonenumber'] !='')
{

$username =$_POST['username'];
$password =$_POST['password'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];

$sql= "INSERT INTO `user`( username, useremail, userpassword, userphone) 
 VALUES ('$username','$email','$password','$phonenumber');";


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