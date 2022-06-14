<?php
require_once '../Classes\dbh_class.php';
require_once '../Model\account_model.php';
class Signup extends Account//create a class which acceses the accounts
{//start the error handlers
  function emptyInputSignup()
  {
    $result;
    $formArray=signup_form_data ();
    if (empty($formArray['name'])||empty($formArray['email'])||empty($formArray['uid'])||empty($formArray['pwd'])||empty($formArray['pwdrepeat']))
    {
      $result=true;
    }
    else
    {
      $result=false;
    }
    return $result;
  }
  function invalidUid()
  {
    $result;
    $formArray=signup_form_data ();
    if (!preg_match("/^[a-zA-Z0-9]*$/",$formArray['uid'])) 
    {
      $result=true;
    }
     else
    {
      $result=false;
    }
    return $result;
  }
  function invalidName()
  {
    $result;
    $formArray=signup_form_data ();
    if (!preg_match("/^[a-zA-Z0-9]*$/",$formArray['name'])) 
    {
      $result=true;
    }
    else
    {
      $result=false;
    }
    return $result;
  }
  function invalidEmail()
  {
    $result;
    $formArray=signup_form_data ();
    if (filter_var($formArray['email'], FILTER_VALIDATE_EMAIL)) 
    {
      $result=true;
    }
    else
    {
      $result=false;
    }
    return $result;
  }
  function pwdMatch()
  {
    $result;
    $formArray=signup_form_data ();
    if ($formArray['pwd']!==$formArray['pwdrepeat']) 
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
    $formArray=signup_form_data ();//get data from the form
    $newUser=new Account($formArray['name'],$formArray['email'],$formArray['uid'],$formArray['pwd'],$formArray['pwdrepeat']);//create a new class account and assign it the data from the form
    $newUser->checkUser();//check if user exists if not create the account
  }
}
function signup_form_data ()//acces all the form data and put it inside an array
  {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdrepeat=$_POST["pwdrepeat"];
    $formArray= array('name' => $name,'email' => $email,'uid' => $uid,'pwd' => $pwd,'pwdrepeat' => $pwdrepeat);
    return $formArray;
  }
  function checkErrors()//the function using all the error handlers and containing the error messages
{
  $newSignup=new Signup("name","email","uid","pwd","pwdrepeat");
  if($newSignup->emptyInputSignup())
  {
    header("location:../Views\signup.php?error=emptyinput");
    exit();
  }
  else if($newSignup->invalidUid())
  {
    header("location:../Views\signup.php?error=invalidUid");
    exit();
  }
  else if($newSignup->invalidUid())
  {
    header("location:../Views\signup.php?error=invalidName");
    exit();
  }
  else if(!$newSignup->invalidEmail())
  {
    header("location:../Views\signup.php?error=invalidEmail");
    exit();
  }
  else if($newSignup->pwdMatch())
  {
    header("location:../Views\signup.php?error=passworddontmatch");
    exit();
  }
  else if($newSignup->alreadyTaken ())//if no errors check if user does not exists, if it does not create the new user
  {

  }

}
if (isset($_POST["submit"]))//check if the user got here trough submit
{
checkErrors();//check all the errors and then create the user if no errors
}
else
{//if it didnt get here thrugh submit
  header("location:../Views\signup.php");
  exit();
}
?>