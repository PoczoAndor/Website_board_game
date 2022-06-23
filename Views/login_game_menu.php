<?php
include_once'header.php';
 ?>
 <?php
  if (isset($_SESSION["acc_id"]))
  {
    if (isset($_GET["error"]))
    {
      if ($_GET["error"]=="emptyinput") {
        echo "<p>Error please fill in all fields</p>";
      }
      else if($_GET["error"]=="character_creation_succes")
      {
        echo "<h2>Character created</h2>";
      }
    }
  }
  else {
    header("location:./login.php");
  }

    ?>
 <h1>Select or create a character</h1>
 <div class="list_of_characters">
   <ul>
   <?php
           if (isset($_SESSION["acc_id"])) {
             echo "<li class='menu_li'><a href=''>Factory</a></li>";
             echo "<li class='menu_li'><a href='profile.php'>Profile</a></li>";
             echo "<li class='menu_li'><a href=''>Characters</a></li>";
             echo "<li class='menu_li'><a href=''>Market</a></li>";
             echo "<li class='menu_li'><a href=''>Inventory</a></li>";
             echo "<li class='menu_li'><a href=''>Mail</a></li>";
             echo "<li class='menu_li'><a href=''>Hire Workers</a></li>";
             echo "<li class='menu_li'><a href='..\Control\logout_control.php'>Log Out</a></li>";
           }
   ?>
   </ul>
 </div>
 <form class="create_character_game_menu" action="create_character.php" method="post">
   <input type="submit" name="create_character_game_menu_button" value="Create Character">
 </form>
 <?php
 include_once'footer.php';
  ?>
