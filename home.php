<?php
    session_start();
    $connection_db = mysqli_connect("localhost", "root", "", "newage_shop");    
    
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
        header('location: login');
        
        exit;
    }
?>

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
    include 'includes/header.php'
    ?>
    
    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="content">
            <h3>We are changing the wolrd with technology</h3>
            
        </div>
    </section>

    <!--featured products-->
    <section class="products" id="products">
        <h1 class="heading"> Featured <span>products</span></h1>
            <div class="box-container">
                <div class="box">
                    <div class="icons"></div>
                    <div class="image">
                        <img src="images/11promax.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Iphone 11 Pro Max</h3>
                        <div class="price">₱45,014.00</div>
                    </div>
                </div>
                <div class="box">
                    <div class="icons"></div>
                    <div class="image">
                        <img src="images/macbookair.png" alt="">
                    </div>
                    <div class="content">
                        <h3>MacBook Air</h3>
                        <div class="price">₱56,988.00</div>
                    </div>
                </div>
                 <div class="box">
                    <div class="icons"></div>
                    <div class="image">
                        <img src="images/pro11.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Ipad 11 Pro</h3>
                        <div class="price">₱35,751.00</div>
                    </div>
                </div>
            </div>
    </section>
    <?php
        include 'about.php';
    ?>              
</body>
</html>