<?php
include_once'header.php';
 ?>
 <section class="signup-form">
   <h1>Log In</h1>
   <form action="Includes\login.inc.php" method="post">
     <input type="text" name="name" placeholder="username or email">
     <input type="password" name="pwd" placeholder="Password...">
     <button type="submit" name="submit">Log In</button>
   </form>
 </section>
<?php
include_once'footer.php';
 ?>
