<?php

$conn = mysqli_connect('localhost', 'root', '123456789', 'newage_shop');

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
   header('location: /SIGUENZA_ECOMMERCE/admin/index');
   
   exit;
}

$id = $_GET['edit'];



if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update = "UPDATE products SET product_name='$product_name', price='$product_price', image='$product_image'  WHERE product_id = '$id'";
      $upload = mysqli_query($conn, $update);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:index');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="images/logo1.png" />
   <title>NEWAGE GADGET</title>
</head>
<body style="background:black">

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['product_name']; ?>" placeholder="ENTER PRODUCT NAME">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="ENTER PRODUCT PRICE">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>