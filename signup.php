<?php
include_once'header.php';
 ?>
 <section class="signup-form">
   <h1>Sign Upp</h1>
   <form action="Includes\signup.inc.php" method="post">
     <input type="text" name="name" placeholder="Full name...">
     <input type="text" name="email" placeholder="Email...">
     <input type="text" name="uid" placeholder="Username...">
     <input type="password" name="pwd" placeholder="Password...">
     <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
     <button type="submit" name="submit">Sign Upp</button>
   </form>
 </section>
<?php
include_once'footer.php';
 ?>
