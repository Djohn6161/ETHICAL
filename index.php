

<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" href="images/logo1.png" />
        <title>NEWAGE GADGET</title>
        <link rel="stylesheet" href="style.css">
       
        <style>
            body{
                min-height: 100vh;
                margin: 0;
                padding: 0;
                font-family: Century Gothic;
                
            }

            .main-image{
                position: relative;
                background: url(images/bg.jpg);
                background-size: cover;
                height: 100vh;
                background-size: cover;
                overflow: hidden;
            }

            .container{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: white;
                font-weight: 700;
            }
            
            .container h1{
                margin: 0;
                font-size: 70px;
                
            }

            .container h1 span{
                
                padding:  6px 14px;
                display: inline-block;
                font-weight: lighter;
                font-family: Century Gothic;
                margin-bottom: 100px;
                
            }


            .button{
                color: black;
                padding: 10px 24px;
                background: white;
                text-decoration: none;
                border-radius: 12px;
                transition: .6s;
                font-size: 18px;
                
            }

            .button:hover{
                color: goldenrod;
            }
            
        </style>
    </head>
    <body>
    <header class="header">
    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

</header>
        <div class="main-image">
            <div class="container">
                <h1><span>DREAMS ABOUT FUTURE ARE
                    ALWAYS FILLED WITH GADGETS
                </span></h1>
                <a class="button" href="login">LOG IN</a>
            </div>
        </div>
    </body>
</html>