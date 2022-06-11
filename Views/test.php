<?php
//wiev that shows the controller functions result
require_once '../Control\signup_control.php';
$testing=new tester();
echo $testing->test("andor");
$andor = new Signup();
$one="test";
$two="test";
$andor->check_user($one,$two);
 ?>
