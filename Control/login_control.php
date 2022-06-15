<?php
require_once '../Model\login_model.php';
class Login extends AccountLogin
{
function login_form_data()//gather from data
{
    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $formArray= array('uid' => $uid,'pwd' => $pwd,);
    return $formArray;    
}
function emptyInputLogin()//check if form was empty
{
  $result;
  $formArray=$this->login_form_data ();
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
    $formArray=$this->login_form_data ();//get form data
    $newLogin=new AccountLogin($formArray['uid'],$formArray['pwd']);//start a new class for account
    if($newLogin->account_login()==true)//if login succsessful
    {
      $acc_info=$newLogin->get_acc_id_name();//get acc id and name
      session_start();//start a session
      $_SESSION["acc_id"] = $acc_info['id'];//store in session acc id
      $_SESSION["fammily_name"]= $acc_info['fammily_name'];//store in session acc fammily name
      header("location:../Views\login_game_menu.php");//send user to game menu
      exit();
    }
    else//if login not succsessful
    {
        header("location:../Views\login.php?error=wronglogin");
        exit();
    }
}
}
if(isset($_POST["submit_login"]))//check if user got here trough submit
{
  $userLogin=new Login("username","password");//create a login class that contains the methods and constructs a login model the passed in arguments are placeholder for the real cunstructor in the model
  if($userLogin->emptyInputLogin()!==false)//if login was unsuccsesful 
  {
    
    header("location:../Views\login.php?error=emptyinput");
    exit();
  }
  else
  {
    $userLogin->loginUser();//if it was succsessful login the user
  }
  
}
else {
  header("location:../Views\login.php");//if user didnt get here trough submit
    exit();
}
?>