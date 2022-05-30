<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
//check if on signup form is epty
function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)
{
  $result;
  if (empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdrepeat) ) {
  $result=true;
  }
  else {
    $result=false;
  }
  return $result;
}
//check if on signup the username is letters or numbers
function invalidUid($username)
{
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
  $result=true;
  }
  else {
    $result=false;
  }
  return $result;
}
//check if on signup the email is not already in database
function invalidEmail($email)
{
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $result=true;
  }
  else {
    $result=false;
  }
  return $result;
}
//check if on signup the second password matches
function pwdMatch($pwd,$pwdrepeat)
{
  $result;
  if ($pwd!==$pwdrepeat)
  {
  $result=true;
  }
  else
   {
    $result=false;
  }
  return $result;
}
//check if on signup the user id dosent exist in database
function uidExists($conn,$username,$email)
{
 $sql="SELECT * FROM users WHERE usersUID =? OR usersEmail=?;";
 $stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
  header("location:../signup.php?error=statementfailed");
  exit();
}
mysqli_stmt_bind_param($stmt,"ss",$username,$email);
mysqli_stmt_execute($stmt);
$resultData=mysqli_stmt_get_result($stmt);
if($row=mysqli_fetch_assoc($resultData))
{
  return $row;
}
else
 {
  $result=false;
  return $result;
 }

mysqli_stmt_close($stmt);
}
//create the user and add it to the database
function createUser($conn,$name,$email,$username,$pwd)
{
$sql="INSERT INTO users(usersName,usersEmail,usersUID,usersPWD) Values (?,?,?,?);";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
  header("location:../signup.php?error=statementfailed");
  exit();
}
$hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);//hashing password
mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../signup.php?error=none");
exit();
}
function emptyInputLogin($username,$pwd)
{
  $result;
  if (empty($username)||empty($pwd) ) {
  $result=true;
  }
  else {
    $result=false;
  }
  return $result;
}
//logging in
function loginUser($conn,$username,$pwd)
{
  $uidExists=uidExists($conn,$username,$username);//check if user exists in database
  if ($uidExists===false) {//if it dosent send back
    header("location:../login.php?error=wronglogin");
    exit();
  }
  $pwdHashed=$uidExists["usersPWD"];//get the hashed password from database
  $checkPWD=password_verify($pwd,$pwdHashed);//check the password provided against password in database
  if ($checkPWD===false) {//if password is incorrect
    header("location:../login.php?error=wronglogin");
    exit();
  }
  else if ($checkPWD===true) {
    session_start();
    $_SESSION["userid"] =$uidExists["usersID"];
    $_SESSION["useruid"] =$uidExists["usersUID"];
    header("location:../create_character.php");
    exit();
  }
}
