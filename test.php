<?php

function test()
{
  $a=null;
  $b="1";
  $c=array($a,$b);
  return $c;
}
$test=test();
echo "$test[1]";
echo "$test[0]";
function testtwo()
{
  $test=test();
  $a=$test[1];
  $b=$test[0];
  $c=array('variable_one' => $a,'variable_two' =>$b);
  return $c;
}
$test=testtwo();
if (empty($test['variable_one'])||empty($test['variable_two']))
{
  echo "empty";
}
else {
  echo $test['variable_one'];
  echo $test['variable_two'];
}


  ?>
