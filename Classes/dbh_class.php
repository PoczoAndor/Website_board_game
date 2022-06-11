<?php
class Database
{
  protected function conn(){
    try{

      $dBUserName="root";
      $dBPassword="";

      $dbh=new PDO("mysql:host=localhost;dbname=web_boardgame",$dBUserName,$dBPassword);
      return $dbh;
    }
    catch(PDOException  $e){
      print "error:".$e->getMessage()."</br>";
      die();
    }

  }
}
