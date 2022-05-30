<?php
include_once'header.php';
 ?>
 <h1>Create character:</h1>
 
 <form action="Includes\create_character.inc.php" method="post">
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
   <button type="submit" name="submit">Create Character</button>
 </form>
<?php
include_once'footer.php';
 ?>
