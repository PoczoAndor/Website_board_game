<?php
include_once'header.php';
 ?>
 <?php
  if (isset($_SESSION["useruid"]))
  {

  }
  else {
    header("location:./login.php");
  }

    ?>
 <h1>Select or create a character</h1>
 <div class="list_of_characters">
   <ul>
     <li>BOBY</li>
     <li>dude</li>
   </ul>
 </div>
 <form class="create_character_game_menu" action="create_character.php" method="post">
   <input type="submit" name="create_character_game_menu_button" value="Create Character">
 </form>
 <?php
 include_once'footer.php';
  ?>
