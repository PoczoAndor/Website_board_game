<?php
class Dude
{
protected $name;

public function __construct($name)
{

$this->name=$name;

}

function get()
{
    return $this->name;
}
}
?>
