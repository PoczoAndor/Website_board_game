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
function emptyInputCharacterName()
{
  $result;
  $formData=$this->create_character_form_data();
  if (empty($formData['character_name']))
  {
    $result=true;
  }
  else
  {
    $result=false;
  }
  return $result;
}
function invalid_form_name()
{
  $result;
  $formData=$this->create_character_form_data();
  if (!preg_match("/^[a-zA-Z0-9]*$/",$formData['character_name'])) 
  {
    $result=true;
  }
   else
  {
    $result=false;
  }
  return $result;
}
function alreadyTaken ()//check if anything already exists in database if not create a new account
  {
    $formData=$this->create_character_form_data();
    $newCharacter=new Character($formArray['name'],$formArray['email'],$formArray['uid'],$formArray['pwd'],$formArray['pwdrepeat']);//create a new class account and assign it the data from the form
    $newUser->checkUser();//check if user exists if not create the account
  }
}
if(isset($_POST["create_character"]))
{
  $new_character=new Create_character("account_id","fammily_name","character_name","class","looks","gold","life","mana","atack","defense","profession");
  if($new_character->emptyInputCharacterName())
  {
    header("location:../Views\pick_profile_picture.php?error=emptyinput");
    exit();
  }
  else if($new_character->invalid_form_name())
  {
    header("location:../Views\pick_profile_picture.php?error=invalidName");
    exit();
  }
  else//if no errors check if user does not exists, if it does not create the new user
  {
    $new_character->create_character();
    header("location:../Views\login_game_menu.php?error=character_creation_succes");
  }

  //need to make a check that character name is not taken.
  
}
else {
  header("location:../login.php");
    exit();
}
