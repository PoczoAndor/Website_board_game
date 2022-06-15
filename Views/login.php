<?php
include_once'header.php';
 ?>
 <style>
  <?php include "..\css/style.css" ?>
</style>

 <section class="signup-form">
   <h1>Log In</h1>
   <form action="../Control\login_control.php" method="post">
     <input type="text" name="uid" placeholder="Username or Email">
     <input type="password" name="pwd" placeholder="Password...">
     <button type="submit" name="submit_login">Log In</button>
   </form>
   <?php
   if (isset($_GET["error"]))//if there is error
   {
     if ($_GET["error"]=="emptyinput") {
       echo "<p>fill in all fields</p>";
     }
     else if($_GET["error"]=="wronglogin")
     {
       echo "<p>Incorrect information</p>";
     }
     else if($_GET["error"]=="none")
     {
       echo "<p>Log in succsessful</p>";
       
     }
   }
    ?>
 </section>
<?php
include_once'footer.php';
 ?>