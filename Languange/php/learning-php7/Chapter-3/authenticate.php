<?php
 $submitted = !empty($_POST) && isset($_POST['username']) && isset($_POST['password']);
 if($submitted) {
    setcookie('username', $_POST['username']);
 }
?>
 <!DOCTYPE html>
  <html lang="en">
   <head>
    <meta charset="UTF-8"/>
    <title>Bookstore</title>
   </head>
   <body>
    <?php if($submitted) { ?>
    <p>You are <?php echo $_COOKIE['username'];?></p>
    <p>Your login info is</p>
     <ul> 
      <li><b>Username</b>: <?php echo $_POST['username'];?> </li>
      <li><b>Password</b>: <?php echo $_POST['password'];?></li>
     </ul>
    <?php } else { ?>
        <p>You are not submitted</p>
    <?php } 
        unset($_COOKIE['username']);
    ?>
    </body>
    </html>