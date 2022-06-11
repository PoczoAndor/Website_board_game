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

}

 ?>
