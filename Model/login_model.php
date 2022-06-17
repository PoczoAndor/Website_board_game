<?php
require_once '../Classes\dbh_class.php';
class AccountLogin extends Database
{
  protected $uid;
  protected $pwd;
  public function __construct($uid,$pwd)//contsructor for the account
{
   $this->uid=$uid;
   $this->pwd=$pwd;
}
protected function account_login()
  {
    $result;
    $stmt=$this->conn()->prepare("SELECT usersPWD FROM users WHERE usersUID =?");//sql statement which we gona run in database
    
    if(!$stmt->execute(array($this->uid)))//execute the stamtnet and if fails send an error
    {
      $stmt=null;
      header("location:../Views\login.php?error=statementfailed");
      exit();
    }
    $hashedPWD=$stmt->fetchAll(PDO::FETCH_ASSOC);//get the data into associative array 
    $checkPWD=password_verify($this->pwd,$hashedPWD[0]["usersPWD"]);//from the data get thepassword and verify it against the database
    if($stmt->rowCount()>0 & $checkPWD)//if there are valuse in database and password is correct send true to log in
    {
      $result=true;
      
    }
    else
    {
      $result=false;//if there are no values send false wrong input
      
    }
    return $result;
  }
  protected function get_acc_id_name()
  {
    $stmt=$this->conn()->prepare("SELECT * FROM users WHERE usersUID =?");//sql statement which we gona run in database
    if(!$stmt->execute(array($this->uid)))//execute the stamtnet and if fails send an error
    {
      $stmt=null;
      header("location:../Views\login.php?error=statementfailed");
      exit();
    }
    else
    {
      $acc_info=$stmt->fetchAll(PDO::FETCH_ASSOC);//get the data into an associative array
      $acc_id=$acc_info[0]["usersID"];//get user id
      $acc_fammily_name=$acc_info[1]["usersName"];//get userName
      $acc_info_array= array('id' => $acc_id,'fammily_name' => $acc_fammily_name,);//insert the data into an array
      return $acc_info_array;//return the information
      $stmt=null;
      exit();
    }
  }

}
  ?>