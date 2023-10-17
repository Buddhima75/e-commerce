<?php
require("Connection.php")
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/Admin.css">
  </head>
  <body>
    <div class="login-form" >
      <table>
        <tr>
          <td style="width: 558px">
            <h2>ADMIN LOGIN </h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
             <div class="input-field">
                <div class="fas">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Admin Name" name ="AdminName">
                </div>
                <div class="input-field">
                  <div class="fas">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Enter Your Password" name="AdminPassword"  id="myInput">   
                  </div>
                </div>
              </div>
              <div class="fas">
                <input type="checkbox" onclick="myFunction()"> Show Password
              </div>

              <script>
              function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
              </script>

              <button type="submit" name="Login">LOGIN </button>
              
              

            
            </form>
            <p><a href="index.php">Login</a></p>

          </td>
        </tr>
    </table>
    
  </body>
</html>
    
<?php
  if(isset($_POST['Login']))
  {          
    $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
      session_start();
      $_SESSION['AdminLoginId']=$_POST['AdminName'];
      header("location: Admin.php");
    }
    else{
      echo "<script>alert('Invalid Admin Name or password');</script>";
    }
  }
?>
