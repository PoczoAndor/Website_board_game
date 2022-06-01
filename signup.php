<?php
include_once'header.php';
 ?>
 <section class="signup-form">
   <h1>Sign Upp</h1>
   <form action="Includes\signup.inc.php" method="post">
     <input type="text" name="name" placeholder="Characters family name..">
     <input type="text" name="email" placeholder="Email...">
     <input type="text" name="uid" placeholder="Account username...">
     <input type="password" name="pwd" placeholder="Password...">
     <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
     <button type="submit" name="submit">Sign Upp</button>
   </form>
   <?php
   if (isset($_GET["error"]))
   {
     if ($_GET["error"]=="emptyinput") {
       echo "<p>fill in all fields</p>";
     }
     else if($_GET["error"]=="invalidUid")
     {
       echo "<p>choose a proper username</p>";
     }
     else if($_GET["error"]=="invalidEmail")
     {
       echo "<p>choose a proper Email</p>";
     }
     else if($_GET["error"]=="passworddontmatch")
     {
       echo "<p>passwords dont match</p>";
     }
     else if($_GET["error"]=="statementfailed")
     {
       echo "<p>something went wrong</p>";
     }
     else if($_GET["error"]=="usernametaken")
     {
       echo "<p>username has been taken</p>";
     }
     else if($_GET["error"]=="none")
     {
       echo "<p>Sign upp succsessful</p>";
     }
   }
    ?>
 </section>

<?php
include_once'footer.php';
 ?>
