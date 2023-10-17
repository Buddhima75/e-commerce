<header class="header">

   <div class="flex">

      <a href="dashboard.php" class="logo">Agrovice</a>
      
      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="" class="cart">cart <span><?php echo $row_count; ?></span> </a>
            <div class="cart">
            
              <a href="login.php" class="logo">
                <i class="fa fa-user"></i>
                <span>
                  Login
                </span>
              </a>
            </div>


      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>