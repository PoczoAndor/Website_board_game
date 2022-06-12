<?php
require_once '../Classes\dbh_class.php';
require_once '../Model\account_model.php';
if (isset($_POST["submit"]))//check if the user got here trough submit
{
// start the error handlers
emptyInputSignup();
invalidUid();
invalidEmail();
pwdMatch();
}
else
{//if it didnt get here thrugh submit

}
//post data from form
function signup_form_data ()
{
  $name=$_POST["name"];
  $email=$_POST["email"];
  $uid=$_POST["uid"];
  $pwd=$_POST["pwd"];
  $pwdrepeat=$_POST["pwdrepeat"];
  $formArray= array('name' => $name,'email' => $email,'uid' => $uid,'pwd' => $pwd,'pwdrepeat' => $pwdrepeat);
  return $formArray;
}
//error handlers functions
function emptyInputSignup()
{
  
  $formArray=signup_form_data ();
  if (empty($formArray['name'])||empty($formArray['email'])||empty($formArray['uid'])||empty($formArray['pwd'])||empty($formArray['pwdrepeat']))
{
  header("location:../Views\signup.php?error=emptyinput");
}
}
function invalidUid()
{
  $formArray=signup_form_data ();
  if (!preg_match("/^[a-zA-Z0-9]*$/",$formArray['uid'])) {
header("location:../Views\signup.php?error=invalidUid");
}
}
function invalidName()
{
  $formArray=signup_form_data ();
  if (!preg_match("/^[a-zA-Z0-9]*$/",$formArray['name'])) {
header("location:../Views\signup.php?error=invalidName");
}
}
function invalidEmail()
{
  $formArray=signup_form_data ();
  if (!filter_var($formArray['name'], FILTER_VALIDATE_EMAIL)) {
    header("location:../Views\signup.php?error=invalidEmail");
}
}
function pwdMatch()
{
  $formArray=signup_form_data ();
  if ($formArray['pwd']!==$formArray['pwdrepeat']){
    header("location:../Views\signup.php?error=passworddontmatch");
}
}
//errors remain  check if acc name ,fammily name,email, is not taken ,
