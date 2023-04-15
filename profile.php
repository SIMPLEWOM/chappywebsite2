<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

// -- user id -- //
$user_id = $_SESSION['ID'];

$result = mysqli_query($conn, "SELECT * FROM user_form where ID = $user_id");
while($row = mysqli_fetch_array($result)){
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$mobile = $row['mobile'];
$address = $row['address'];

}
if($_SESSION['ID'])
	{
		
// update user details -- //
if(isset($_POST['submit'])){

   $user_id = mysqli_real_escape_string($conn, $_SESSION['ID']);
   $nname = mysqli_real_escape_string($conn, $_POST['nfirst_name']);
   $lname = mysqli_real_escape_string($conn, $_POST['nlast_name']);
   $nemail = mysqli_real_escape_string($conn, $_POST['nemail']);
   $nmobile = mysqli_real_escape_string($conn, $_POST['nmobile']);
   $naddress = mysqli_real_escape_string($conn, $_POST['naddress']);

   
   $query = "UPDATE user_form SET first_name = '$nname', last_name = '$lname', email = '$nemail', 
   mobile = '$nmobile', address = '$naddress' WHERE id= $user_id ";

   $query_run = mysqli_query($conn, $query);
   if($query_run) {
   $_SESSION['message'] = "Your account has been updated successfully!";
   header('location: profile.php');
   exit(0);
   }
   else {
      mysqli_error($conn);
  }
}


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
        .successmsg{
            margin-bottom: 10px;
            margin-left: 4em;
         }
       
   </style>
</head>
<header class="header">    
            <nav class="nav container flex">
                    <a href="#" class="logo-content flex">
                    <i class='phone-icon'><img src="images/bg/Chappy-Logo.png" alt="" ></i>                      
                        <span class="logo-text">Chappy</span>
                    </a>           
                        <div class="contact-content flex">
                    
                                <a class="button-logout" href="index.php">Back</a>
                        </div>

                        <i class='bx bx-menu navOpen-btn'></i>
                </nav>
        
    </header>
<body class="body1">
   
      <div class="wrapper">
               <div class="successmsg">    
                        <h2>
                           <?php 
                                 include('message.php')
                              ?> 
                        </h2> 
               </div>
         
            <form action="profile.php"  method="post">
                  <div class="title">
                     User Details 
                  </div>
                      
                  <div class="form">
                     <div class="inputfield">
                        <label>First Name:</label>
                        <input type="text" name="nfirst_name" placeholder="<?php echo $fname ?>"  class="input" required>
                     </div>  
                     <div class="inputfield">
                        <label>Last Name:</label>
                        <input type="text" name="nlast_name" placeholder="<?php echo $lname ?>" class="input" required>
                     </div>
                     <div class="inputfield">
                        <label>Email:</label>
                        <input type="email" name="nemail" placeholder="<?php echo $email ?>" class="input" required>
                     </div>   
                      
                     <div class="inputfield">
                        <label>Phone Number:</label>
                        <input type="text" name="nmobile" placeholder="<?php echo $mobile ?>" class="input" required>
                     </div> 
                     <div class="inputfield">
                        <label>Address</label>
                        <textarea type="text" name="naddress" placeholder ="<?php echo $address ?>"  class="textarea" required></textarea>
                     </div> 
                     
                     <div class="inputfield">
                     <input type="submit" name="submit" value="Update" class="button-login">
                     </div>
                     
                  </div>
            </form>   
      </div>	

</body>
</html>
<?php
	}
	else
	{
		if($_SESSION['admin_name'])
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>