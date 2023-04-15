<?php

@include 'config.php';
require_once 'functions.php';

if(!isset($_SESSION['admin_name'])){
header('location:login_form.php');
}
$result = display_data();


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
                            <li><a href="admin-page.php" class="nav-link active-navlink">Users</a></li>
                                    <li><a href="all-orders.php" class="nav-link">Orders</a></li>
                                    <li><a href="add-stocks.php" class="nav-link">Stocks</a></li>
                                    <li><a href="material-price.php" class="nav-link">Material & Size Price</a></li>
                                    
                            </ul>

                            <div class="media-icons flex">
                                    <a href="https://www.facebook.com/profile.php?id=100009150553521"><i class='bx bxl-facebook'></i></a>
                                    <a href="https://twitter.com/i/flow/login"><i class='bx bxl-twitter' ></i></a>
                                    <a href="https://www.instagram.com/accounts/login"><i class='bx bxl-instagram-alt' ></i></a>
                                    <a href="https://github.com/login"><i class='bx bxl-github'></i></a>
                                    <a href="https://www.youtube.com/login"><i class='bx bxl-youtube'></i></a>
                            </div>

                            <i class='bx bx-x navClose-btn'></i>
                        </div>
                        
                        <div class="contact-content flex">
                            <!--<i class='bx bx-phone phone-icon' ></i>-->
                                <a class="button-logout" href="logout.php">Log out</a>
                        </div>

                        <i class='bx bx-menu navOpen-btn'></i>
                </nav>
        
    </header>

<!-- Home Section -->
    <main>
    <section class="section edit" id="edit">
        <form method="GET" class="searchitem">
                <input class="searchinput" type="text" required name="search" placeholder="Search Data" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <button type="submit" class="button-search">Search</button>
        </form>
        <div class="meu-text">
                
                <h2 class="section-title">All Users</h2>
                
        </div>
                <div class="review-container container">
                        
                <div class="outer-wrapper">
                <div class="table-wrapper">
                         <table class="content-table">
                                 <thead>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address </th>
                                        <th>User Type</th>
                                        <th>Date Added</th>
                                                                
                                </thead>
                        <tbody>
                                <?php
                                $conn = mysqli_connect('localhost','root','','chappy_db');

                                                if(isset($_GET['search']))
                                        {
                                                $filtervalue = $_GET['search'];
                                                $query = "SELECT * FROM user_form WHERE CONCAT(first_name, last_name, email, mobile, address, user_type, date_added) LIKE '%$filtervalue%'";
                                                $query_run = mysqli_query($conn, $query);

                                                if(mysqli_num_rows($query_run) > 0 )
                                                {
                                                foreach($query_run as $items)
                                                {
                                                ?>
                                                <tr>
                                                                                
                                                        <td><?= $items['first_name']; ?></td>
                                                        <td><?= $items['last_name']; ?></td>
                                                        <td><?= $items['email']; ?></td>
                                                        <td><?= $items['mobile']; ?></td>
                                                        <td><?= $items['address']; ?></td>
                                                        <td><?= $items['user_type']; ?></td>
                                                        <td><?= $items['date_added']; ?></td>
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
                                        <tbody>
                                                <?php

                                                $conn = mysqli_connect('localhost','root','','chappy_db');

                                                if(isset($_GET['search']))
                                                {
                                                        $filtervalue = $_GET['search'];
                                                        $query = "SELECT * FROM user_form WHERE CONCAT(first_name, last_name, email, mobile, address, user_type, date_added) LIKE '%$filtervalue%'";
                                                        $query_run = mysqli_query($conn, $query);

                                                        if(mysqli_num_rows($query_run) > 0 )
                                                        {
                                                        foreach($query_run as $items)
                                                        {
                                                 ?>
                                                        <tr>
                                                                
                                                                <td><?= $items['first_name']; ?></td>
                                                                <td><?= $items['last_name']; ?></td>
                                                                <td><?= $items['email']; ?></td>
                                                                <td><?= $items['mobile']; ?></td>
                                                                <td><?= $items['address']; ?></td>
                                                                <td><?= $items['user_type']; ?></td>
                                                                <td><?= $items['date_added']; ?></td>
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
                                                        <tr>   
                                                                <?php
                                                                while($row = mysqli_fetch_assoc($result))
                                                                {
                                                                        ?>
                                                                        
                                                                        <td><?php echo $row['first_name']; ?></td>
                                                                        <td><?php echo $row['last_name']; ?></td>
                                                                        <td><?php echo $row['email']; ?></td>
                                                                        <td><?php echo $row['mobile']; ?></td>
                                                                        <td><?php echo $row['address']; ?></td>
                                                                        <td><?php echo $row['user_type']; ?></td>
                                                                        <td><?php echo $row['date_added']; ?></td>
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