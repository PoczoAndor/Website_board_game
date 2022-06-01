<?php
include_once'header.php';
require_once 'Includes\dbh.inc.php';
require_once 'Includes\functions.inc.php';
 ?>
 <h1>Create character:</h1>
 <form action="Includes\create_character.inc.php" method="post">
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
 if (isset($_GET["error"]))
 {
   if ($_GET["error"]=="image1") {
     echo "<p>You picked image 1</p>";
     $picked_profile_picture="image1";
   }
   if ($_GET["error"]=="image2") {
     echo "<p>You picked image 2</p>";
     $picked_profile_picture="image2";
   }
 }
 else
 {
header("location:pick_profile_picture.php");
 }
   ?>
<?php
include_once'footer.php';
 ?>
