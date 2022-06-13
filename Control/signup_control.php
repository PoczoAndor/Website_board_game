<?php
require_once '../Classes\dbh_class.php';
require_once '../Model\account_model.php';
require_once '../Control\signup_control.php';
class Signup extends Account
{
  
//post data from form
  
  //error handlers functions
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
  function alreadyTaken ()
  {
    $formArray=signup_form_data ();
    $newUser=new Account($formArray['name'],$formArray['email'],$formArray['uid'],$formArray['pwd'],$formArray['pwdrepeat']);
    $newUser->checkUser();
  }
}
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
  function checkErrors()
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
  else if($newSignup->alreadyTaken ())
  {

  }
  
  
  
  
  
  

}
if (isset($_POST["submit"]))//check if the user got here trough submit
{
// start the error handlers
checkErrors();
//$newSignup->build();
}
else
{//if it didnt get here thrugh submit

}
//errors remain  check if acc name ,fammily name,email, is not taken ,
?>