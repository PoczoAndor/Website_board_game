//Model
<?php

class Apple//start a class
{
  public $color;//declare propreties
  function __construct($color)//start a constructor
  {
    $this->color=$color;
  }
  function fcolor()//start functons which connect to database or update database
  {
   $returncolor=$this->color;
   return $returncolor;
  }
}

 ?>
//Control
<?php
require_once "m.php";//insert model
if (isset($_POST["submit"]))//check with isset if user got here through submit
{
  result();//do the functions needed if they got here trough submit
}
else{
  header("location:v.php?error=error");//if they didnt get here trough submit then send them away with an error
}

function checkColor()//start a function which stores all the data from the form submitted
{
    $color=$_POST["color"];//post contains the form data
    return $color;
}

function result()//fonction to do with the data
{
$newApple=new Apple(checkColor());//start a new class by accesing the data from the function to get data from form here check color function contains color information
$test=$newApple->fcolor();//to acces the functions from the model data noew use the variable name of the new class and point to the function name from the model.
header("location:v.php?error=none");//if succes send the user back to the form with an error of none
}


 ?>
//View
<form action=c.php method="post">
 <input type="text" name="color" placeholder="color">
 <button type="submit" name="submit">Sign Upp</button>
</form>
<?php
require_once "c.php";//acces the control
if (isset($_GET["error"]))//check for the errors sent by the control
{
 if ($_GET["error"]=="none") {//different type of errors listed here that you can use.
   echo "<p>Done</p>";
 }
}
?>
