<?php
require_once '../Classes\dbh_class.php';
require_once '../Control\signup_control.php';
//model with proprities for signup into database
class Account extends Database
{
protected $name;
protected $email;
protected $uid;
protected $pwd;
protected $pwdrepeat;
public function __construct($name,$email,$uid,$pwd,$pwdrepeat)
{
   $this->name=$name;
   $this->email=$email;
   $this->uid=$uid;
   $this->pwd=$pwd;
   $this->pwdrepeat=$pwdrepeat;
}
protected function checkUser()
  {
    
    $stmt=$this->conn()->prepare("SELECT * FROM users WHERE usersUID =? OR usersEmail=? OR usersName=?;");
    if(!$stmt->execute(array($this->uid,$this->email,$this->name)))
    {
      $stmt=null;
      header("location:../Views\signup.php?error=statementfailed");
      exit();
    }
    
    if($stmt->rowCount()>0)
    {
      header("location:../Views\signup.php?error=usernametaken");
      exit();
    }
    else
    {
      //signupp the user
      header("location:../Views\signup.php?error=nouserindb");
    }
    
  }
  protected function SignUpp()
  {

  }
}

 ?>
