<?php
require_once '../Model\create_character_control.php';
class Create_character
{
  function create_character_form_data()//gather from data
{
    $character_name=$_POST["character_name"];
    $class=$_POST["select_class"];
    $profession=$_POST["select_profession"];
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
  $looks=;
  $gold="10";
  $life="100";
  $mana="100";
  $atack="2";
  $defense="2";
  $profession=$formData["profession"];

  $character=new Character($account_id,$fammily_name,$character_name,$class,$looks,$gold,$life,$mana,$atack,$defense,$profession);

  
}
}
if(isset($_POST["create_character"]))
{
  
  
  



}
else {
  header("location:../login.php");
    exit();
}
