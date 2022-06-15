    <link rel="stylesheet" href="..\css/style.css">
<?php
include_once'header.php';
 ?>
 <section class="signup-form">
   <h1>Sign Upp</h1>
   <form action="../Control\signup_control.php" method="post">
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
       echo "<p>Error please fill in all fields</p>";
     }
     else if($_GET["error"]=="invalidUid")
     {
       echo "<p>Choose a proper Account username</p>";
     }
     else if($_GET["error"]=="invalidName")
     {
       echo "<p>Choose a proper Characters fammily username</p>";
     }
     else if($_GET["error"]=="invalidEmail")
     {
       echo "<p>Choose a proper Email</p>";
     }
     else if($_GET["error"]=="passworddontmatch")
     {
       echo "<p>Passwords dont match</p>";
     }
     else if($_GET["error"]=="statementfailed")
     {
       echo "<p>Something went wrong</p>";
     }
     else if($_GET["error"]=="usernametaken")
     {
       echo "<p>Username has been taken</p>";
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
