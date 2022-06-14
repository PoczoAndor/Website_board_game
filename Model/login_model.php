<?php

protected function get_user_pwd_name()
  {
    $stmt=$this->conn()->prepare("SELECT * FROM users WHERE usersUID =? OR usersEmail=? OR usersName=?;");//sql statement which we gona run in database
    if(!$stmt->execute(array($this->uid,$this->email,$this->name)))//execute the stamtnet and if fails send an error
    {
      $stmt=null;
      header("location:../Views\login.php?error=statementfailed");
      exit();
    }
    
    if($stmt->rowCount()>0)//if there are valuse in database send an error that it is taken
    {
      header("location:../Views\signup.php?error=usernametaken");
      exit();
    }
    else
    {
      
    }
  }
  ?>