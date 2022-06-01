<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
require_once '../create_character.php';
if(isset($_POST["create_character"]))
{
  $account_id=$_SESSION["userid"];
  $fammily_name=
  $character_name=$_POST["character_name"];
  $select_class=$_POST["select_class"];
  $select_profession=$_POST["select_profession"];
  $fammily_name=get_acc_fammily_name($conn,$account_id);


}
else {
  header("location:../login.php");
    exit();
}
