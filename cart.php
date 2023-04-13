<?php
session_start();
    require('includes/connection.php');

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
        header('location: login');
        
        exit;
    }
?>
<!--Placing of Orders-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo1.png" />
    <titl>NEWAGE GADGET</titl>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <style>
        body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: century Gothic;
        }

        .content{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 25vh;
        width: 80%;
        background:transparent;
        font-size: 38px;
        color: white;
        text-align: center;
        font-style: oblique;
        font-weight: lighter;
        border: 1px solid white;
        
        }

    </style>
</head>
<body>
    <?php
    include 'includes/header.php'
    ?>
    <div class="content">
        <p>Thank you for visting NEWAGE GADGET Shop<br><br>Click <a href="shop.php"> <b>here</b> </a>to purchased again</p>
    </div>
   
</body>
</html>