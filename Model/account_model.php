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
public function __construct($name,$email,$uid,$pwd,$pwdrepeat)//contsructor for the account
{
   $this->name=$name;
   $this->email=$email;
   $this->uid=$uid;
   $this->pwd=$pwd;
   $this->pwdrepeat=$pwdrepeat;
}
protected function createUser()//function to create an account in the database
  {
    $stmt=$this->conn()->prepare("INSERT INTO users(usersName,usersEmail,usersUID,usersPWD) Values (?,?,?,?);");//sql prepared statement to run into database
    $pwd=$this->pwd;//get password from class
    $hashedPWD=password_hash($pwd,PASSWORD_DEFAULT);//hash the password
    if(!$stmt->execute(array($this->name,$this->email,$this->uid,$hashedPWD)))//execute the sql statement and if it failed send an error 
    {
      $stmt=null;
      header("location:../Views\signup.php?error=statementfailedCreateUser");
      exit();
    }
    $stmt=null;
  }
protected function checkUser()//check if anything already exists in the database
  {
    $stmt=$this->conn()->prepare("SELECT * FROM users WHERE usersUID =? OR usersEmail=? OR usersName=?;");//sql statement which we gona run in database
    if(!$stmt->execute(array($this->uid,$this->email,$this->name)))//execute the stamtnet and if fails send an error
    {
      $stmt=null;
      header("location:../Views\signup.php?error=statementfailed");
      exit();
    }
    
    if($stmt->rowCount()>0)//if there are valuse in database send an error that it is taken
    {
      header("location:../Views\signup.php?error=usernametaken");
      exit();
    }
    else
    {
      //signupp the user
      $this->createUser();
      header("location:../Views\signup.php?error=none");
      exit();
    }
    $stmt=null;
  }
  
}

 ?>
