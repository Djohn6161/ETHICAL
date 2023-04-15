<?php   
    session_start();  
    $connection_db = mysqli_connect("localhost", "root", "", "newage_shop");  
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
        header('location: login');
        
        exit;
    }
?>  

<!DOCTYPE html>  
<html>  
    <head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo1.png" />
        <title>NEWAGE GADGET</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel ="stylesheet" href ="style.css" > 
    </head>  
    <body>

    <!--Header section-->
    <header class="header">
        <a href="#" class="logo">
            <img src="images/logo.png" alt=""> 
        </a>

        <nav class="navbar">
            <a href="home">HOME</a>
            <a href="shop">SHOP</a>
            <a data-toggle="tab" href="#cart">CART <span class="badge"><?php if(isset($_SESSION["newage"])) { echo count($_SESSION["newage"]); } else { echo '0';}?></span></a></li>  </a>
        </nav>
    </header>

    <div class="container" style="width: 1200px; margin-top:20px; margin-bottom:60px;">    
        <div class="tab-content" >  
            <div id="products" class="tab-pane fade in active">  
        <?php  
            $query = "SELECT * FROM products ORDER BY product_id ASC";  
            $result = mysqli_query($connection_db, $query);  
            while($row = mysqli_fetch_array($result)){  
        ?>  
        <div class="col-md-4">  
            <div style="border:1px solid #333; background-color:black; border-radius:5px; padding:20px; height:510px; margin-top:120px;" align="center" >  
                <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" />  
                <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>  
                <h4 class="text-danger">₱ <?php echo number_format ($row["price"], 2); ?></h4>  
                <input type="number" name="quantity" id="quantity<?php echo $row["product_id"]; ?>" class="form-control" value="1" />  
                <input type="hidden" name="hidden_name" id="name<?php echo $row["product_id"]; ?>" value="<?php echo $row["product_name"]; ?>" />  
                <input type="hidden" name="hidden_price" id="price<?php echo $row["product_id"]; ?>" value="<?php echo $row["price"]; ?>" />  
                <input type="button" name="add_to_cart" id="<?php echo $row["product_id"]; ?>" style="margin-top:10px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />  
            </div>  
        </div>  
        <?php } ?>  
        </div> 
            
            <div id="cart" class="tab-pane fade" style="margin-top: 150px;" style="color:white;">  
                <div class="table-responsive" id="order_table">  
                    <table class="table table-bordered">  
                        <tr style="color:white;">  
                            <th width="40%">Product Name</th>  
                            <th width="10%">Quantity</th>  
                            <th width="20%">Price</th>  
                            <th width="15%">Total</th>  
                            <th width="5%">Action</th>  
                        </tr>  
                    <?php  
                        if(!empty($_SESSION["newage"])){  
                            $total = 0;  
                            foreach($_SESSION["newage"] as $keys => $values){                                               
                    ?>  
                    <tr style="color:white;">  
                        <td ><?php echo $values["product_name"]; ?></td>  
                        <td ><input type="number" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                        <td align="right" >₱<?php echo number_format ($values["product_price"], 2); ?></td>  
                        <td align="right">₱<?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                        <td><button name="delete" class="btn btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                    </tr>  
                    <?php  
                        $total = $total + ($values["product_quantity"] * $values["product_price"]);}  
                    ?>  
                    <tr>  
                        <td colspan="3" align="right" style="color:white;">Total</td>  
                        <td align="right" style="color:white;">₱ <?php echo number_format($total, 2); ?></td>  
                        <td></td>  
                    </tr>  
                    <tr>  
                        <td colspan="5" align="center">  
                            <form method="post" action="cart.php">  
                                <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                             </form>  
                        </td>  
                    </tr>  
                    <?php } ?>  
                    </table>  
                </div>  
            </div>  
        </div>  
    </div>  
    
    <!--footer section-->
    <section class="footer"> 
        <div class="credit">created by <span>NEWAGE GADGET</span> | all rights reserved</div>
    </section>
</body> 
</html>  
    
    <!--PHP Script for adding,remove and change of data-->
    <script>  
        $(document).ready(function(data){  
            $('.add_to_cart').click(function(){  
                var product_id = $(this).attr("id");  
                var product_name = $('#name'+product_id).val();  
                var product_price = $('#price'+product_id).val();  
                var product_quantity = $('#quantity'+product_id).val();  
                var action = "add";  
                    $.ajax({  
                        url:"action.php",  
                        method:"POST",  
                        dataType:"json",  
                        data:{  
                            product_id:product_id,   
                            product_name:product_name,   
                            product_price:product_price,   
                            product_quantity:product_quantity,   
                            action:action  
                        },  
                    success:function(data){  
                        $('#order_table').html(data.order_table);  
                        $('.badge').text(data.cart_item);  
                    }  
                });  
        });  
        $(document).on('click', '.delete', function(){  
            var product_id = $(this).attr("id");  
            var action = "remove";  
                $.ajax({  
                    url:"action.php",  
                    method:"POST",  
                    dataType:"json",  
                    data:{product_id:product_id, action:action},  
                    success:function(data){  
                        $('#order_table').html(data.order_table);  
                        $('.badge').text(data.cart_item);  
                    }  
                });  
        }); 
        $(document).on('keyup', '.quantity', function(){  
           var product_id = $(this).data("id");  
           var quantity = $(this).val();  
           var action = "quantity_change";  
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
 });  
 </script>
