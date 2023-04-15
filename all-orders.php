<?php

@include 'config.php';
require_once 'functions.php';

if(!isset($_SESSION['admin_name'])){
header('location:login_form.php');
}
//--Update Order Status -- //
if(isset($_POST['update']))
{
$status = $_POST['status'];
$id = $_POST['id'];

    $sql = "SELECT * FROM order_form WHERE status='Cancelled by customer' && ID='$id';";
    $query_run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query_run) > 0 ){

        $_SESSION['message'] = "Order already Cancelled";
        header('location:all-orders.php');
        exit(0);
       
    }
    else{
        $sql = "UPDATE order_form SET status='$status' WHERE ID=$id;";
        $query_run = mysqli_query($conn, $sql);

        $_SESSION['message'] = "Status has been updated";
        header('location:all-orders.php');
        exit(0);
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
       .order-img{
        height: 100px;
        width: 100px;
        margin-right: 1.5rem;
        }

        .order-flex {
        overflow: hidden;
        }
        .order-flex .order-img{
        transition: var(--tran-0-2);
        }
        .order-flex:hover .order-img {
        transform: scale(1.2);
        }
         .successmsg{
            margin-bottom: 10px;
            margin-left: 15em;
         }
    </style>


</head>
<body>
<!-- Header -->
    <header class="header">    
            <nav class="nav container flex">
                    <a href="#" class="logo-content flex">
                    <i class='phone-icon'><img src="images/bg/Chappy-Logo.png" alt="" ></i>                       
                        <span class="logo-text">Chappy.</span>
                    </a>

                    <div class="menu-content">
                            <ul class="menu-list flex">
                                    <li><a href="all-orders.php" class="nav-link active-navlink">All Orders</a></li>
                                    <li><a href="all-approved-orders.php" class="nav-link">Approved Orders</a></li>
                                    <li><a href="cancelled-by-customer.php" class="nav-link">Cancelled Orders</a></li>
                                    
                            </ul>

                            <div class="media-icons flex">
                                    <a href="https://www.facebook.com/profile.php?id=100009150553521"><i class='bx bxl-facebook'></i></a>
                                    
                            </div>

                            <i class='bx bx-x navClose-btn'></i>
                        </div>
                        
                        <div class="contact-content flex">
                            <!--<i class='bx bx-phone phone-icon' ></i>-->
                                <a class="button-logout" href="admin-page.php">Back</a>
                        </div>

                        <i class='bx bx-menu navOpen-btn'></i>
                </nav>
        
    </header>

<!-- Home Section -->
    <main>
    <section class="section edit" id="edit">
        <form method="GET" class="searchitem" >
                <input class="searchinput" type="text" required name="search-order" placeholder="Search Data" value="<?php if(isset($_GET['search-order'])){echo $_GET['search-order'];} ?>">
                <button type="submit" class="button-search">Search</button>
        </form>
        <div class="meu-text">
                
                <h2 class="section-title">Pending Orders</h2>
                        <div class="successmsg">    
                                <h2>
                                    <?php 
                                        include('message.php')
                                     ?> 
                                </h2> 
                        </div>
                
        </div>
            <div class="review-container container">
                        
                <div class="outer-wrapper">
                    <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <th>Custom Image</th>
                            <th>Order ID</th>
                            <th>Payer Name</th>
                            <th>Shape</th>
                            <th>Size</th>
                            <th>Material </th>
                            <th>Processing Days</th>
                            <th>Quantity</th>
                            <th>Total Payment</th>
                            <th>Status</th>
                            <th>Date Ordered</th>
                            
                        </thead>
                        <tbody>
                                            
                        <?php

                            $conn = mysqli_connect('localhost','root','','chappy_db');

                                if(isset($_GET['search-order']))
                                {
                                    $filtervalue = $_GET['search-order'];
                                    $query = "SELECT * FROM order_form WHERE CONCAT(order_id, payer_name, shape, size, material, qty, processing, payment_total_amount, date_order) LIKE '%$filtervalue%' && status = 'Yet to be approved'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0 )
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                    <tr>
                                        
                                        <td class="order-flex"><img src="<?php echo $items['custom_image'] ?>" class="order-img"></td>
                                        <td><?= $items['order_id']; ?></td>
                                        <td><?= $items['payer_name']; ?></td>
                                        <td><?= $items['shape']; ?></td>
                                        <td><?= $items['size']; ?></td>
                                        <td><?= $items['material']; ?></td>
                                        <td><?= $items['processing']; ?></td>
                                        <td><?= $items['qty']; ?></td>
                                        <td>Php <?= $items['payment_total_amount']; ?></td>
                                        <td>
                                            <form action="all-orders.php" method="post">
                                                        
                                                        <input type="hidden" value="<?php echo $items['ID'] ?>" name="id">
                                                        <select name="status" class="input">
                                                            <option value="Yet to be approved"><?php echo $items['status'] ?></option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Cancelled by Admin">Cancelled by Admin</option>
                                                        </select>
                                                
                                                    <input type="submit" name="update" value="update status" class="button-logout">
                                                </form> 
                                        </td>
                                        <td><?= $items['date_order']; ?></td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                            <td colspan="4">No Record Found</td>
                            </tr>
                            <?php
                                }
                            }

                            ?>
                                            
                </tbody>
                        <tbody>
                            
                        <?php
                                        $query = " SELECT * FROM order_form WHERE status = 'Yet to be approved'";
                                        $query_run = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_array( $query_run))
                                        {
                                            ?>
                                                        
                                                <td class="order-flex"> <img src="<?php echo $row['custom_image'] ?>" class="order-img">  </td>
                                                <td> <?php echo $row['order_id'] ?> </td>
                                                <td> <?php echo $row['payer_name'] ?> </td>
                                                <td> <?php echo $row['shape'] ?> </td>
                                                <td> <?php echo $row['size'] ?> </td>
                                                <td> <?php echo $row['material'] ?> </td>
                                                <td> <?php echo $row['processing'] ?> </td>
                                                <td> <?php echo $row['qty'] ?> </td>
                                                <td>Php <?php echo $row['payment_total_amount'] ?> </td>
                                                <td> 
                                                    <form action="all-orders.php" method="post">
                                                    
                                                            <input type="hidden" value="<?php echo $row['ID'] ?>" name="id">
                                                            <select name="status" class="input">
                                                                <option value="Yet to be approved"><?php echo $row['status'] ?></option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Cancelled by Admin">Cancelled by Admin</option>
                                                            </select>
                                                      
                                                        <input type="submit" name="update" value="update status" class="button-cancel">
                                                    </form> 
                                                </td>
                                                <td> <?php echo $row['date_order'] ?> </td>

                                            </tr>
                                                        <?php
                                                    }
                                        
                                                ?>   
                        </tbody>
                    </table>
                </div>
                </div>

                </div>
        </section>
         
    




</main>

<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>

<!-- Scroll Reveal -->
<script src="js/scrollreveal.js"></script>

<!-- JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>