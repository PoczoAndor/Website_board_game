<?php
require_once '../Classes\dbh_class.php';
class Character extends Database
{
public $account_id;
public $fammily_name;
public $character_name;
public $class;
public $looks;
public $gold;
public $life;
public $mana;
public $atack;
public $defense;
public $profession;

public function __construct($account_id,$fammily_name,$character_name,$class,$looks,$gold,$life,$mana,$atack,$defense,$profession)
{
    $this->account_id=$account_id;
    $this->fammily_name=$fammily_name;
    $this->character_name=$character_name;
    $this->class=$class;
    $this->looks=$looks;
    $this->gold=$gold;
    $this->life=$life;
    $this->mana=$mana;
    $this->atack=$atack;
    $this->defense=$defense;
    $this->profession=$profession;
}
protected function create_character()//function to create an account in the database
  {
    $stmt_check_character=$this->conn()->prepare("SELECT charactersName FROM characters WHERE charactersName =?");//sql statement which we gona run in database
    if(!$stmt_check_character->execute(array($this->character_name)))//execute the stamtnet and if fails send an error
    {
      $stmt=null;
      header("location:../Views\pick_profile_picture.php?error=statementfailedCheckCharacter");
      exit();
    }
    else if($stmt_check_character->rowCount()>0)//if there are valuse in database send an error that it is taken
    {
      header("location:../Views\pick_profile_picture.php?error=characternametaken");
      exit();
    }
    else
    {
      $stmt=$this->conn()->prepare("INSERT INTO characters(usersID,charactersFammily_name,charactersName,charactersClass,charactersLooks,charactersGold,charactersLife,charactersMana,charactersAtack,charactersDefense,charactersProfession) Values (?,?,?,?,?,?,?,?,?,?,?);");//sql prepared statement to run into database
      if(!$stmt->execute(array($this->account_id,$this->fammily_name,$this->character_name,$this->class,$this->looks,$this->gold,$this->life,$this->mana,$this->atack,$this->defense,$this->profession)))//execute the sql statement and if it failed send an error 
      {
        $stmt=null;
        header("location:../Views\pick_profile_picture.php?error=statementfailedCreateUser");
        exit();
      }
    }
    $stmt=null;
  }
}
?>