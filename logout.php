<?php
// Initialize the session
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo1.png" />
    <title>NEWAGE GADGET</title>
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
        background-color: rgba(247, 195, 55, 0.877);
        font-size: 38px;
        color: white;
        text-align: center;
        font-style: oblique;
        font-weight: lighter;
        }

    </style>
</head>
<body>
   
    <div class="content">
        <p>You have been log out,<a href="index.php"><b> Log in</b></a> again</p>
    </div>

    <script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
   
</body>
</html>