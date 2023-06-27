<!DOCTYPE html>
<html>
<head>
  <title>Login Form Design</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <center>
    </center>

    <div class="registerbox">
        <?php
          function generateRandomString($length) {
           $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
           $randomString = '';
            $max = strlen($characters) - 1;
    
          for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[mt_rand(0, $max)];
            }
    
            return $randomString;
              }

          // Usage
        $randomString = generateRandomString(4);
        echo '<p style="font-size: 25px; color: red; font-family: verdana;">Your ticket is '.$randomString.'</p>'; 
          ?>


        <form action="register.php" method="POST">
        <input type="email" class="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"  disabled required>
        <input type="text" class="name" name="name" placeholder="Enter Name" required>
        <input type="contact" class="contact" name="contact" placeholder="Enter Contact" required>
        <input type="submit" class="submit" value="Submit">
       </form>
    </div>
  </body>
</html>