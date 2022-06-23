<?php
include_once'header.php';
 ?> 
 <div class="red-text"style="color:red">
 <?php
  if (isset($_SESSION["acc_id"]))
  {
    if (isset($_GET["error"]))
    {
      if ($_GET["error"]=="emptyinput") {
        echo '<h2>Error please fill Character Name...</h2>';
      }
      else if($_GET["error"]=="invalidName")
      {
        echo "<h2>Choose a proper Character Name</h2>";
      }
      else if($_GET["error"]=="characternametaken")
      {
        echo "<h2>Already have a character with this name</h2>";
      }
      else if($_GET["error"]=="statementfailedCreateUser")
      {
        echo "<h2>Error with database</h2>";
      }
      else if($_GET["error"]=="statementfailedCheckCharacter")
      {
        echo "<h2>Error with database</h2>";
      }
    }
  }
  
  else {
    header("location:login.php");
  }

    ?>
      </div>
 <h1>Pick profile picture</h1>
 <div>
   <a href="create_character.php?id=image1"><img src="../Images\test.jpg" alt="test" style="width:150px;height:180px;padding:10px;"></a>
   <a id="profile_picture_pick" href="create_character.php?error=image2"><img src="../Images\test.jpg" alt="test" style="width:150px;height:180px;padding:10px;"></a>

 </div>
