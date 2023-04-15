<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
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
        .successmsg{
            margin-left: 6em;
        }
        .close {
            background-color:var(--section-bg);
            padding: 2px 3px 2px;
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

                    <div class="menu-content">
                            <ul class="menu-list flex">
                                    <li><a href="#home" class="nav-link active-navlink">home</a></li>
                                    <li><a href="profile.php" class="nav-link">Profile</a></li>
                                    <li><a href="#labelprice" class="nav-link">Price</a></li>
                                    <li><a href="#order" class="nav-link">Order</a></li>
                                    <li><a href="pending-order.php" class="nav-link">Pending Orders</a></li>
                                    <li><a href="#menu" class="nav-link">Designs</a></li>                                   
                                    <li><a href="#edit" class="nav-link">Edit Design</a></li>
                                    <li><a href="#about" class="nav-link">about</a></li>
                                    
                            </ul>

                            <div class="media-icons flex">
                                    <a href="https://www.facebook.com/profile.php?id=100009150553521"><i class='bx bxl-facebook'></i></a>
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
        <section class="home" id="home">
                <div class="home-content">
                        <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                                <img src="images/bg-index.jpg" alt="" class="home-img">

                                                <div class="home-details">
                                                        <div class="home-text">
                                                                <div class="successmsg">    
                                                                        <h2><?php 
                                                                                include('message.php')
                                                                        ?> </h2> 
                                                                </div>
                                                                <h4 class="homeSubtitle">We really like what we do.</h4>
                                                                <h2 class="homeTitle">Get your customized <br> labels made fast and easy</h2>
                                                        </div>

                                                        
                                                </div>
                                        </div>

                                        <div class="swiper-slide" id="">
                                                <img src="images/bg/Background2.jpg" alt="" class="home-img">

                                                <div class="home-details">
                                                        <div class="home-text">
                                                                
                                                                <h4 class="homeSubtitle">We really like what we do.</h4>
                                                                <h2 class="homeTitle">Print custom labels that last. <br> We offer several durable materials</h2>
                                                        </div>

                                                        
                                                </div>
                                        </div>

                                        <div class="swiper-slide">
                                                <img src="images/bg/Background3.jpg" alt="" class="home-img">

                                                <div class="home-details">
                                                        <div class="home-text">
                                                                <h4 class="homeSubtitle">We really like what we do.</h4>
                                                                <h2 class="homeTitle">Print on waterproof,<br> weatherproof white vinyl sticker paper</h2>
                                                        </div>

                                                        
                                                </div>
                                        </div>
                                </div>

                                <div class="swiper-button-next swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-navBtn"></div>
                                <div class="swiper-pagination"></div>
                        </div>
                </div>
        </section>
         <!-- Order Price Section -->
         <section class="section menu" id="labelprice">
            <div class="menu-container container">
                    <div class="menu-text">
                            
                            <h2 class="section-title">Configured Label Price</h2>
                         
                    </div>

                    <div class="menu-content">
                            <div class="menu-items">
                            <div class="time-table">
                                    <span class="time-topic">Material & Size Price</span>

                                    <ul class="time-lists">
                                            
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker non laminated 1x1</span>
                                                    <span class="open-time">Php .75 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker non laminated 2x2</span>
                                                    <span class="open-time">Php 2 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker non laminated 3x3</span>
                                                    <span class="open-time">Php 5 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">Clear vinyl Sticker non laminated 1x1</span>
                                                    <span class="open-time">Php .75 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">Clear vinyl Sticker non laminated 2x2</span>
                                                    <span class="open-time">Php 2 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">Clear vinyl Sticker non laminated 3x3</span>
                                                    <span class="open-time">Php 5 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker laminated glossy/matte 1x1</span>
                                                    <span class="open-time">Php 1.75 each</span>
                                            </li>
                                            
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker laminated glossy/matte 2x2<</span>
                                                    <span class="open-time">Php 3 each<</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">White Vinyl Sticker laminated glossy/matte 3x3</span>
                                                    <span class="open-time">Php 6 each</span>
                                            </li>
                                    </ul>
                            </div>
                            </div>
                            <div class="time-table">
                                    <span class="time-topic">Material & Size Price</span>

                                    <ul class="time-lists">
                                    <li class="time-list flex">
                                                    <span class="open-day">Satin Sticker 1x1</span>
                                                    <span class="open-time">Php .50 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">Satin Sticker 2x2</span>
                                                    <span class="open-time">Php 1.75 each</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day">Satin Sticker 3x3</span>
                                                    <span class="open-time">Php 4.75 each</span>
                                            </li>
                                    </ul>
                            </div>
                    </div>
            </div>
        </section>

        <!-- Order Section -->
        <section class="section order" id="order">
                        <div class="review-text">
                                
                                <h2 class="section-title">Configure Your Label</h2>
                                
                        </div>
                <div class="review-container container">
               
                        <div class="wrapper">
                                <div class="title">
                                Order Form
                                </div>
                                <div class="form">
                                        <form action="checkout.php" method="post" enctype="multipart/form-data">
                                                <div class="inputfield">
                                                        <label>Shape</label>
                                                        <div class="custom_select">
                                                        <select class="select-box" name="shape_id" required>
                                                                <option value="1">Rectangle</option>
                                                                <option value="2">Circle</option>
                                                                <option value="3">Square</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Size</label>
                                                        <div class="custom_select">
                                                        <select name="size_id" required>
                                                                <option value="1">1x1</option>
                                                                <option value="2">2x2</option>
                                                                <option value="3">3x3</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Material</label>
                                                        <div class="custom_select">
                                                        <select name="material_id" required>
                                                                <option value="3">Clear Vinyl Sticker</option>
                                                                <option value="1">White Vinyl Sticker non laminated</option>
                                                                <option value="2">Satin Sticker non laminated</option>                                             
                                                                <option value="4">White Vinyl Sticker laminated glossy/matte</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Process</label>
                                                        <div class="custom_select">
                                                        <select name="processing" id="processing" required>
                                                                <option  value="4 Business Days">4 Business Days</option>
                                                                <option  value="2 Business Days">2 Business Days</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="inputfield">
                                                        <label>Quantity</label>
                                                        <div class="custom_select">
                                                        <select name="qty" scrollheight="120px" required>
                                                                <option value="50">50 Labels</option>
                                                                <option value="75">75 Labels</option>
                                                                <option value="100">100 Labels</option>
                                                                <option value="150">150 Labels</option>
                                                                <option value="250">250 Labels</option>
                                                                <option value="500">500 Labels</option>
                                                                <option value="750">750 Labels</option>
                                                                <option value="1000">1000 Labels</option>
                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="inputfield">
                                                        <input type="submit" name="test" value="Checkout" class="button-login">
                                                </div>
                                        </form>      
                                </div> 
                               
                                 </div>
                        </div>	

                </div>
        </section>
        <!-- Menu Section -->
        <section class="section menu" id="menu">
       
            <div class="menu-container container">
                    <div class="menu-text">
                            
                            <h2 class="section-title">Our Sample Design</h2>
                          
                    </div>

                    <div class="menu-content">
                            <div class="menu-items">
                                    <div class="menu-item flex">
                                            <img src="images/label1.png" alt="" class="menu-img">

                                            <div class="menuItem-details">
                                                    <h4 class="menuItem-topic">Sweet Bake</h4>
                                                    <p class="menuItem-des">1x1 size and circle shape with the material of Satin Sticker</p>
                                            </div>
                                            
                                    </div>
                                    <div class="menu-item flex">
                                            <img src="images/label2.png" alt="" class="menu-img">

                                            <div class="menuItem-details">
                                                    <h4 class="menuItem-topic">Coffee Lover</h4>
                                                    <p class="menuItem-des">2x2 size and circle shape with the material of Clear vinyl Sticker non laminated</p>
                                            </div>

                                            
                                    </div>
                                    <div class="menu-item flex">
                                            <img src="images/label3.png" alt="" class="menu-img">

                                            <div class="menuItem-details">
                                                    <h4 class="menuItem-topic">Ice Cream</h4>
                                                    <p class="menuItem-des">2x2 size and circle shape with the material of White Vinyl Sticker non laminated</p>
                                            </div>

                                           
                                    </div>
                                    <div class="menu-item flex">
                                            <img src="images/label4.png" alt="" class="menu-img">

                                            <div class="menuItem-details">
                                                    <h4 class="menuItem-topic">Beautiful</h4>
                                                    <p class="menuItem-des">2x2 size and circle shape with the material of 3x3 size and circle shape with the material of White Vinyl Sticker non laminated</p>
                                            </div>

                                    </div>
                            </div>

                            <div class="time-table">
                                    <span class="time-topic">Catogries Time</span>

                                    <ul class="time-lists">
                                            <li class="time-list flex">
                                                    <span class="open-day"> Sunday</span>
                                                    <span class="open-time">Closed</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Monday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Tuesday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Wednesday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Thursday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Friday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                            <li class="time-list flex">
                                                    <span class="open-day"> Saturday</span>
                                                    <span class="open-time">8.00am - 5.00pm</span>
                                            </li>
                                    </ul>
                            </div>
                    </div>
            </div>
       
        </section>

       

        <!-- Edit Section -->
        <section class="section edit" id="edit">
                        <div class="menu-text">
                                
                                <h2 class="section-title">Create Your Design</h2>
                                
                        </div>
                <div class="review-container container">
                        
                <p><iframe class="iframe" frameborder="0" height="550" width="1000" src="chappyeditor/indextool.php"></iframe></p>

                </div>
        </section>
    


    
<!-- Brand Section -->
        <section class="section brand">
            <div class="brand-container container">
                    <h4 class="section-subtitle"><i>Our Trusted Brand</i></h4>

                    <div class="brand-images">
                            <div class="brand-image">
                                    <img src="images/bg/brandImg1.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/bg/brandImg2.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/bg/brandImg3.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/bg/brandImg4.png" alt="" class="brand-img">
                            </div>
                            <div class="brand-image">
                                    <img src="images/bg/brandImg5.png" alt="" class="brand-img">
                            </div>
                    </div>
            </div>
        </section>

    
<!-- about Section -->
        <section class="section review" id="about">
        <div class="about-content container">
                        <div class="about-imageContent">
                                <img src="images/label5.png" alt="" class="about-img">

                                <div class="aboutImg-textBox">
                                        
                                        <p class="content-description">I really love the Design.</p>
                                </div>
                        </div>

                        <div class="about-details">
                                <div class="about-text">
                                        <h4 class="content-subtitle"><i>Our Printing Shop</i></h4>
                                        <h2 class="content-title">Hello, we're <br> Chappy Printing</h2>
                                        <p class="content-description">We are available to you. We are a dedicated group of motivated people who are prepared to meet your labeling needs. We have the technology to offer you industry-leading quality and service for everything from small quantities of blank or printed labels to big, commercial runs of labels for your products.</p>

                                        <ul class="about-lists flex">
                                                <li class="about-list">White Vinyl Sticker</li>
                                                <li class="about-list dot">.</li>
                                                <li class="about-list">Satin Sticker</li>
                                                <li class="about-list dot">.</li>
                                                <li class="about-list">Clear Vinyl Sticker</li>
                                                
                                        </ul>
                                </div>

                                
                        </div>

                </div>
                <br>
                <div class="about-content container">
                        <div class="about-imageContent">
                                <img src="images/bg/team.png" alt="" class="about-img" border-radius="20px">

                                
                        </div>

                        <div class="about-details">
                                <div class="about-text">
                                        <h4 class="content-subtitle"><i>Our team</i></h4>
                                        <h2 class="content-title">Hello, we're <br> Chappy Printing</h2>
                                        <p class="content-description">We are a team of diligent individuals. We come from many racial and cultural backgrounds. We are happy to provide you with the best level of service attainable because we are dedicated to quality and perfection at every turn.</p>

                                       
                                </div>

                               
                        </div>

                </div>
                <br>
                <br>
        <div class="review-container container">
                    <div class="review-text">
                            <h4 class="section-subtitle"><i>Our Team</i></h4>
                            
                            <p class="section-description">We are a team of diligent individuals. We come from many racial and cultural backgrounds. We are happy to provide you with the best level of service attainable because we are dedicated to quality and perfection at every turn.</p>
                    </div>

                    <div class="tesitmonial swiper mySwiper">
                            <div class="swiper-wrapper">
                                    <div class="testi-content swiper-slide flex">
                                            <img src="images/joseph.jpg" alt="" class="review-img">
                                            
                                            <i class='bx bxs-quote-alt-left quote-icon'></i>

                                            <div class="testi-personDetails flex">
                                                    <span class="name">Mark Joseph Lebaquin</span>
                                                    <span class="job">Web Developer</span>
                                            </div>
                                    </div>
                                    <div class="testi-content swiper-slide flex">
                                            <img src="images/bill.jpg" alt="" class="review-img">
                                            
                                            <i class='bx bxs-quote-alt-left quote-icon'></i>

                                            <div class="testi-personDetails flex">
                                                    <span class="name">Jason Bill Mercado</span>
                                                    <span class="job">Web Developer</span>
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="swiper-button-next swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-navBtn"></div>
                                <div class="swiper-pagination"></div>
                    </div>
                 </div>
            </div>
        </section>

    
<!-- Newsletter Section -->
        <section class="section newsletter">
            <div class="newletter-container container">
                        <a href="#" class="logo-content flex">
                                <i class='phone-icon'><img src="images/bg/Chappy-Logo.png" alt="" ></i>
                                <span class="logo-text">Chappy</span>
                        </a>

                    <p class="section-description">Design labels from scratch on our website, or upload your own ready-made design.</p>


                    <div class="newsletter media-icons flex">
                        <a href="https://www.facebook.com/profile.php?id=100009150553521"><i class='bx bxl-facebook'></i></a>
                </div>
            </div>
        </section>
        
    
<!-- Footer Section -->
        <footer class="section footer">
            <div class="footer-container container">
                    <div class="footer-content">
                        <a href="#" class="logo-content flex">
                                <i class='phone-icon'><img src="images/bg/Chappy-Logo.png" alt="" ></i>
                                <span class="logo-text">Chappy</span>
                            </a>

                            <p class="content-description">The standard sizes that we offer are all listed on our website, if you have any questions about a specific size please give us a call or contact us.</p>

                            <div class="footer-location flex">
                                <i class='bx bx-map map-icon'></i>
                                
                                <div class="location-text">
                                        USA Californa 65 South Fifth St.Sicklerville, NJ 08081
                                </div>
                            </div>
                    </div>

                    <div class="footer-linkContent">
                            <ul class="footer-links">
                                    <h4 class="footerLinks-title">Facility</h4>

                                    <li><a href="#" class="footer-link">Private Room</a></li>
                                    <li><a href="#" class="footer-link">Meeting Room</a></li>
                                    <li><a href="#" class="footer-link">Event Room</a></li>
                                    <li><a href="#" class="footer-link">Creative Studio</a></li>
                                    <li><a href="#" class="footer-link">Custom Room</a></li>
                            </ul>
                            <ul class="footer-links">
                                    <h4 class="footerLinks-title">Facility</h4>

                                    <li><a href="#" class="footer-link">Coffee</a></li>
                                    <li><a href="#" class="footer-link">Beverages</a></li>
                                    <li><a href="#" class="footer-link">Dishes</a></li>
                            </ul>
                            <ul class="footer-links">
                                    <h4 class="footerLinks-title">Support</h4>

                                    <li><a href="#" class="footer-link">About Us</a></li>
                                    <li><a href="#" class="footer-link">FAQs</a></li>
                                    <li><a href="#" class="footer-link">Private Policy</a></li>
                                    <li><a href="#" class="footer-link">Help Us</a></li>
                            </ul>
                    </div>
            </div>
            <div class="footer-copyRight">asdasdsa</div>
        </footer>

<!-- Scroll Up -->
        <a href="#home" class="scrollUp-btn flex">
                <i class='bx bx-up-arrow-alt scrollUp-icon'></i>
        </a>

</main>

<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>

<!-- Scroll Reveal -->
<script src="js/scrollreveal.js"></script>

<!-- JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>