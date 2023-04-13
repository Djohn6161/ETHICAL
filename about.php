<?php   
    session_start();  
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
        header('location: login');
        
        exit;
    }
?> 
<!--ABOUT AND CONTACT US page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo1.png" />
    <title>NEWAGE GADGET</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'includes/header.php';
    ?>
    <section class="about" id="about">
        <h1 class="heading"> <span>about</span> us </h1>
        <div class="row">

            <div class="content">
                <h3>NEWAGE GADGET SHOP</h3>
                <p>Our team made this website to create a new precious story that would last forever </p>
                <p>NEWAGE Shop ensuring that every customer is happy with every purchase is our highest priority. We promise to celebrate every occasion, and every story with you. </p>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="heading"> <span>contact</span> us </h2>
        <div class="row">
        <iframe class="map" src="https://web-1080.webnode.com.br/widgets/googlemaps/?z=15&amp;a=sta.clara+buhi+camarines+sur%2C+4433+buhi&amp;s=" allowfullscreen="" loading="lazy"></iframe>
            <form action="">
                <h3>get in touch</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="Name">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="Email">
                </div>
                <input type="submit" value="contact now" class="btn">
            </form>
        </div>
    </section>
    <?php 
        include 'includes/footer.php';
    ?>
</body>
</html>