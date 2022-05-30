<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test Board Game</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <nav>
      <div class="menu_wrapper">
        <ul class="menu_ul">
          <li class="menu_li"><a href="Index.php">Home</a></li>
          <li class="menu_li"><a href="">About</a></li>
          <?php
           if (isset($_SESSION["useruid"])) {
             echo "<li><a href='profile.php'>Profile Page</a></li>";
             echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
           }
           else {
             echo "<li class='menu_li'><a href='signup.php'>Sign Up</a></li>";
             echo "<li class='menu_li'><a href='login.php'>Log In</a></li>";
           }
           ?>
        </ul>
      </div>
    </nav>
