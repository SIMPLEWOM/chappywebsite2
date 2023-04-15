<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
  

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['first_name'];
         header('location:admin-page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['first_name'];
         $_SESSION['last_name'] = $row['last_name'];
         $_SESSION['address'] = $row['address'];
         $_SESSION['ID'] = $row['ID'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['password'] = $row['password'];
         $_SESSION['mobile'] = $row['mobile'];
         header('location:index.php');

      }
     
   }else{
      $error[] = 'Incorrect email or password!';
   }
   

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/bg/Chappy-Logo.png" type="image/x-icon">
   <style>
      body{
        
         padding: 0 10px;
         }

      .wrapper{
         max-width: 500px;
         width: 100%;
         background: rgb(0, 0, 0);
         margin-top: 9em;
         box-shadow: box-shadow: 0 0 15px rgb(112, 112, 112);
         padding: 30px;
         border-radius: 20px;
         }
      .wrapper .form{
         width: 99%;
         align-items: center;
         }
     
         
   </style>
</head>
<body class="body1">
      
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <div class="form">
            <form action="" method="post">
                        <?php
                           if(isset($error)){
                              foreach($error as $error){
                                 echo '<span class="error-msg">'.$error.'</span>';
                              };
                           };
                        ?>
                        
                  <div class="inputfield">
                     <label>Email</label>
                     <input type="email" name="email" required placeholder="Enter your email" class="input">
                  </div>         
                  <div class="inputfield">
                     <label>Password</label>
                     <input type="password" name="password" required placeholder="Enter your password" class="input">
                  </div>  
                  
                  <div class="inputfield">
                  <input type="submit" name="submit" value="Sign in" class="button-login">
                  </div>
                     <div class="inputfield">
                        
                        <p>Don't have an account? <a href="register_form.php">Sign up</a></p>
                     </div>
            </form>
         </div>
      </div>	

</body>
</html>