<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/cartstyle.css">
   



  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />


</head>
<body>

   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header-loged.php'; ?>

<div class="container">

   <section class="products">

      <h1 class="heading">latest products</h1>

      <div class="box-container">

         <?php
         
         $select_products = mysqli_query($conn, "SELECT * FROM `products`");
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
         ?>

         <form action="" method="post">
            <div class="box">
               <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
               <h3><?php echo $fetch_product['name']; ?></h3>
               <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </div>
         </form>

         <?php
            };
         };
         ?>

      </div>
   </section>

</div>

<div id='fixedban' style='width:100%;margin:auto;text-align:center;float:none;overflow:hidden;display:scroll;position:fixed;bottom:0;z-index:999;-webkit-transform:translateZ(0);'>
  <div>
    <a id='close-fixedban' onclick='document.getElementById("fixedban").style.display = "none";' style='cursor:pointer;'><img alt='close' src=' https://www.rakeshtechsolutions.com/assets/img/btn_close.gif ' title='close button' style='vertical-align:middle;'/></a>
  </div>
  <div style='text-align:center;display:block;max-width:728px;height:auto;overflow:hidden;margin:auto'>
     
      <?php 
        
        $query="SELECT * FROM `adds`";
        $adds_result=mysqli_query($conn,$query);
      
        while($adds_fetch=mysqli_fetch_assoc($adds_result))
        {
          echo
          '<img src="uploaded_img/'.$adds_fetch["image"].'" alt="">';  
        }
      ?>
     
  </div>
</div>


<!-- custom js file link  -->
<script src="js/cartscript.js"></script>

</body>
</html>