<?php
require_once '../Model\account_model.php';
class Login
{
function login_form_data()
{
    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $formArray= array('uid' => $uid,'pwd' => $pwd,);
    return $formArray;    
}
function emptyInputLogin()
{
  $result;
  $formArray=login_form_data ();
  if (empty($formArray['uid'])||empty($formArray['pwd']))
  {
    $result=true;
  }
  else
  {
    $result=false;
  }
  return $result;
}
function loginUser()
{
    $formArray=login_form_data ();
    $newLogin=new Account($formArray['uid'],$formArray['pwd']);
    if($newLogin->account_login())
    {
        session_start();
        $_SESSION["userid"] =$uidExists["usersID"];
        $_SESSION["useruid"] =$uidExists["usersUID"];
        header("location:../login_game_menu.php");
        exit();
    }
    else
    {
        header("location:../login.php?error=wronglogin");
        exit();
    }
}
}
if(isset($_POST["submit"]))
{

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  if(emptyInputLogin($username,$pwd)!==false)
  {
    header("location:../login.php?error=emptyinput");
    exit();
  }
  loginUser($conn,$username,$pwd);
}
else {
  header("location:../login.php");
    exit();
}
?>