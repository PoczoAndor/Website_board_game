<?php
class Character
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

}
?>