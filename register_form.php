<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
   $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";
   
  

   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0 ){

      $error1[] = 'Email already exist!';

   }else{

      if($pass != $cpass){
         $error1[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO user_form(first_name, last_name, email, password, mobile, address, user_type) VALUES('$first_name','$last_name','$email','$pass','$mobile','$address','$user_type')";
         mysqli_query($conn, $insert);
         
         header('location:login_form.php');
      }
   }

 

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
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
        margin-top: 2em;
        box-shadow: 0 0 15px rgb(112, 112, 112);
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
         
            <form action=""  method="post">
                  <div class="title">
                     Registration Form
                  </div>
                      <div class="err-msg">
                              <?php
                                    if(isset($error1)){
                                       foreach($error1 as $error1){
                                          echo '<span class="error-msg">'.$error1.'</span>';
                                       };
                                    };
                                 ?>
                        </div>
                  <div class="form">
                     <div class="inputfield">
                        <label>First Name:</label>
                        <input type="text" name="first_name" required placeholder="enter your first name"class="input">
                     </div>  
                     <div class="inputfield">
                        <label>Last Name:</label>
                        <input type="text" name="last_name" required placeholder="enter your last name" class="input">
                     </div>
                     <div class="inputfield">
                        <label>Email:</label>
                        <input type="email" name="email" required placeholder="enter your email" class="input">
                     </div>   
                     <div class="inputfield">
                        <label>Password:</label>
                        <input type="password" name="password" required placeholder="enter your password" class="input">
                     </div>
                     <div class="inputfield">
                        <label>Confirm Password:</label>
                        <input type="password" name="cpassword" required placeholder="confirm your password" class="input">
                     </div>    
                     <div class="inputfield">
                        <label>Phone Number:</label>
                        <input type="text" name="mobile" required placeholder="mobile number" class="input">
                     </div> 
                     <div class="inputfield">
                        <label>Address</label>
                        <textarea type="text" name="address" required placeholder="Address" class="textarea"></textarea>
                     </div> 
                     <div class="inputfield">
                           <label>User </label>
                           <div class="custom_select">
                               <select name="user_type" required>
                                       <option value="user">Customer</option>
                              </select>
                         </div>
                    </div>
                     
                     <div class="inputfield terms">
                        <label class="check">
                           <input type="checkbox" required>
                           <span class="checkmark"></span>
                        </label>
                        <p>Agreed to terms and conditions</p>
                     </div> 
                     <div class="inputfield">
                     <input type="submit" name="submit" value="Sign up" class="button-login">
                     </div>
                     <div class="inputfield">
                        
                        <p>Already have an account with us? <a href="login_form.php">Sign in</a></p>
                     </div>
                  </div>
            </form>   
      </div>	

</body>
</html>