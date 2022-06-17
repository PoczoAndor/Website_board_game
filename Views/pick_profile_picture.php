<?php
include_once'header.php';
 ?>
 <?php
  if (isset($_SESSION["acc_id"]))
  {

  }
  else {
    header("location:login.php");
  }

    ?>
 <h1>Pick profile picture</h1>
 <div>
   <a href="create_character.php?error=image1"><img src="../Images\test.jpg" alt="test" style="width:150px;height:180px;padding:10px;"></a>
   <a id="profile_picture_pick" href="create_character.php?error=image2"><img src="../Images\test.jpg" alt="test" style="width:150px;height:180px;padding:10px;"></a>

 </div>
