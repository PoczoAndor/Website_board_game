<?php
session_start();
require_once '../Model\create_character_model.php';
class Create_character extends Character
{
  function create_character_form_data()//gather from data
{
    $character_name=$_POST["character_name"];
    $class=$_POST["selected_class"];
    $profession=$_POST["selected_profession"];
    $formArray= array('character_name' =>$character_name,'class' =>$class,'profession' =>$profession);
    return $formArray;
}
function create_character()
{
  $formData=$this->create_character_form_data();
  $account_id=$_SESSION["acc_id"];
  $fammily_name=$_SESSION["fammily_name"];
  $character_name=$formData["character_name"];
  $class=$formData["class"];
  $looks=$_SESSION["profile_picture"];
  $gold="10";
  $life="100";
  $mana="100";
  $atack="2";
  $defense="2";
  $profession=$formData["profession"];

  $character=new Character($account_id,$fammily_name,$character_name,$class,$looks,$gold,$life,$mana,$atack,$defense,$profession);
  $character->create_character();
  
}
}
if(isset($_POST["create_character"]))
{
  $new_character=new Create_character("account_id","fammily_name","character_name","class","looks","gold","life","mana","atack","defense","profession");
  //need to make a check that character name is not taken.
  $new_character->create_character();
  header("location:../Views\login_game_menu.php?error=character_creation_succes");
}
else {
  header("location:../login.php");
    exit();
}
