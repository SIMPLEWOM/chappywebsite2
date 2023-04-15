<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

global $conn;

// -- order ID -- //
function random_num($length)
{
    $text = "";
    if ($length < 5)
    {
        $lenght = 5;
    }
    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++){
        #code...
      
        $text .= rand(0, 9);
    }

    return $text; 
}

//--- QUERY SIZE PRICE -- //

$size_id = $_POST['size_id'];
$size_sql = "SELECT * FROM item_size WHERE ID = '$size_id'"; 
$size_query = mysqli_query($conn, $size_sql);
$size_query_result = mysqli_fetch_array($size_query);
$size_price = $size_query_result['price'];
$size = $size_query_result['size'];


//--- QUERY SHAPE -- //
$shape_id = $_POST['shape_id'];
$shape_sql = "SELECT * FROM item_shape WHERE ID = '$shape_id'"; 
$shape_sql_query = mysqli_query($conn, $shape_sql);
$shape_query_result = mysqli_fetch_array($shape_sql_query);
$shape_price = $shape_query_result['price'];
$shape = $shape_query_result['shape']; 

//--- QUERY MATERIAL -- //
$material_id = $_POST['material_id'];
$material_sql = "SELECT * FROM item_materials WHERE ID = '$material_id'"; 
$material_sql_query = mysqli_query($conn, $material_sql);
$material_query_result = mysqli_fetch_array($material_sql_query);
$material_price = $material_query_result['price'];
$material = $material_query_result['material'];

//--- QUANTITY --- //
$qty = $_POST['qty'];

//--- PROCESSING DAYS ---//
$process_days = $_POST['processing'];

//--- PRICE COMPUTATION ---//

$extra = '100';

switch ($process_days) {
  case "4 Business Days":
    $total = $qty * ($size_price + $material_price);
  break;

  case "2 Business Days":
    $totalamount = $qty * ($size_price + $material_price);
    $total = $totalamount + $extra;
  break;
}

// -- save order -- //
if(isset($_POST['test1']))
    {
    $user_id = $_SESSION['ID'];
    $payer_name = $_SESSION['user_name'];
    $shape = mysqli_real_escape_string($conn, $_POST['shape']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $material = mysqli_real_escape_string($conn,$_POST['material']);
    $processing_days = mysqli_real_escape_string($conn,$_POST['processing']);
    $qty = mysqli_real_escape_string($conn,$_POST['qty']);
    $total = mysqli_real_escape_string($conn,$_POST['totalamount']);

    $target_dir = "test_upload/";
    $target_file = $target_dir . basename($_FILES["custom_image_name"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // echo $target_file;

    $uplaoadfiles = move_uploaded_file($_FILES["custom_image_name"]["tmp_name"], $target_file);
   // $file = addslashes(file_get_contents($_FILES["custom_image_name"]["tmp_name"]));

    $order_id = random_num(0);

    $save_order = "INSERT INTO order_form (customer_id, order_id, payer_name, shape, size, material, processing, qty, payment_total_amount, custom_image) VALUES 
    ('$user_id', '$order_id', '$payer_name','$shape', '$size', '$material', '$processing_days', '$qty', ' $total', '$target_file')";

    $save_order_query = mysqli_query($conn, $save_order);

    if($save_order_query) {
        $_SESSION['message'] = "Ordered Successfully";
            header("Location:index.php");
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
    <title>Chappy Website</title>

    <!-- Swiper JS CSS-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- Scroll Reveal -->
    <link rel="stylesheet" href="css/scrollreveal.min.js">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="images/bg/Chappy-Logo.png" type="image/x-icon">
        
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .form input[type="file"]{
            background-color: black;
            color: white;
            font-weight: 500;
            font-size: 18px;
            height: 55px;
            width: 100%;
            padding: 0 30px;
            border: 3px solid black;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
            }

    .form input[type="file"]:hover{
            background-color: var(--section-bg);
            }
    </style>

</head>
<body>
<!-- Header -->
    <header class="header">    
            <nav class="nav container flex">
                    <a href="#" class="logo-content flex">
                    <i class='phone-icon'><img src="images/bg/Chappy-Logo.png" alt="" ></i>                      
                        <span class="logo-text">Chappy</span>
                    </a>

                   
                        
                        <div class="contact-content flex">
                            <!--<i class='bx bx-phone phone-icon' ></i>-->
                                <a class="button-logout" href="index.php">Back</a>
                        </div>

                        
                </nav>
        
    </header>

<!-- Home Section -->
    <main>

        <!-- Order Section -->
        <section class="section order" id="order">
                        <div class="review-text">
                                
                                <h2 class="section-title">Checkout</h2>
                                
                        </div>
                <div class="review-container container">
               
                        <div class="wrapper">
                                
                                <div class="form">
                                        <form action="checkout.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="shape" id="shape" value="<?php echo $_SESSION['ID']  ?>">
                                                <div class="inputfield">
                                                        <label>Shape</label>
                                                       
                                                            <input type="hidden" name="shape" id="shape" value="<?php echo $shape ?>">
                                                            <input type="text" id="shape" value="<?php echo $shape ?>" class="input" />
                                                        
                                                </div>
                                                <div class="inputfield">
                                                        <label>Size</label>
                                                            <input type="hidden" id="size" name="size" value="<?php echo $size ?>">
                                                            <input type="text" id="size" value="<?php echo $size ?>"  class="input"/>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Material</label>
                                                            <input type="hidden" id="material" name="material" value="<?php echo $material ?>"> 
                                                            <input type="text" id="material" value="<?php echo $material ?>"  class="input"/>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Process</label>
                                                            <input type="text" id="processing" value="<?php echo $process_days ?>"  class="input"/> 
                                                            <input type="hidden" id="processing" name="processing" value="<?php echo $process_days ?>" >
                                                </div>
                                                <div class="inputfield">
                                                        <label>Quantity</label>
                                                            <input type="text" id="qty" value="<?php echo $qty ?>" class="input"/> 
                                                            <input type="hidden" id="qty" name="qty" value="<?php echo $qty ?>">
                                                </div>
                                                <div class="inputfield">
                                                        <label>Total Price</label>
                                                            <input type="hidden" name="totalamount" value="<?php echo $total ?>"/>
                                                            <input type="text" value="Php <?php echo $total ?>" class="input" />
                                                </div>
                                                <div class="inputfield">
                                                        <label>Upload Your Design</label>
                                                        <input type="file" name="custom_image_name" id="custom_image_id"  class="input"  accept="image/*" required>
                                                            
                                                </div>
                                                <div class="inputfield">
                                                        <input href="" type="submit" name="test1" value="SUBMIT" class="button-login"></input>
                                                </div>
                                                <br>

                                                      <div id="paypal-button-container"></div>
                                        </form>      
                                </div> 
                               
                                 </div>
                        </div>	

                </div>
        </section>

</main>

 <!-- Replace "test" with your own sandbox Business account app client ID -->
 <script src="https://www.paypal.com/sdk/js?client-id=ATPvaq290QNoaRsdLjCOQYx2df2KFyXE6-y6UZ9zV2C0C1e7GIEPa7ji1rJThgvlT_mjmTVJeqVAanox&currency=USD"></script>

<script>
paypal.Buttons({

  createOrder: function(data, actions){

       
      return actions.order.create({
          purchase_units: [{
              amount: {
                  value: '<?= $total?>'
              }
          }]

      });
  },
  onApprove: function(data, actions){
      console.log('Data :' + data);
      console.log('Action : '+ actions);
      return actions.order.capture().then(function(details){
          console.log(details.payer.name.given_name); 
      })
  }

}).render('#paypal-button-container');
</script>

<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>

<!-- Scroll Reveal -->
<script src="js/scrollreveal.js"></script>

<!-- JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>