<?php
require_once'testtwo.php';
class Second extends Dude
{
  function build()
  {
    $class=new Dude("Andor");
    echo $class->get();
  }
}

  
$test=new Second("test");
$test->build();
  ?>
