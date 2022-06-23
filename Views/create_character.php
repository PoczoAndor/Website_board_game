<?php
include_once'header.php';
 ?>
 <h1>Create character:</h1>
 <form action="../Control\create_character_control.php" method="post">
   <label for="select_character_name">Write character name:</label>
   <input type="text" name="character_name" placeholder="Your Characters Name...">
   <label for="select_class">Choose a Class:</label>
   <select id="select_class" name="selected_class">
     <option value="hunter">Hunter</option>
     <option value="warrior">Warrior</option>
     <option value="mage">Mage</option>
   </select>
   <label for="select_profession">Choose a Profession:</label>
   <select id="select_profession" name="selected_profession">
     <option value="blacksmith">Blacksmith</option>
     <option value="leatherworker">Leatherworker</option>
     <option value="carpenter">Carpenter</option>
     <option value="cook">Cook</option>
     <option value="builder">Builder</option>
     <option value="tailoring">Tailoring</option>
   </select>
   <button type="submit" name="create_character">Create Character</button>
 </form>
 <?php
if(isset($_GET['id']))
{
    $profile_picture = $_GET['id'];
    $_SESSION["profile_picture"]= $profile_picture;
}
else
{
    header("location:../Views\pick_profile_picture.php");
}

   ?>
<?php
include_once'footer.php';
 ?>
