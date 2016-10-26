<?php
require_once('session.php');
class auth{
private function __construct(){}
private function __clone(){}
private $ref=array();
private static $var=NULL;
public static function getInstance(){                 //////////path is sent by appcontroller and get instance is 
if(self::$var==NULL){
self::$var=new self();
return self::$var;
}
else{
return self::$var;
}

}


public function referencecolumns(){
$this->ref=func_get_args();
}
public function authenticate(){
$where=NULL;
$val=func_get_args();
$refcolums=count($this->ref);
for($i=0;$i<$refcolums;$i++){
if($i==0){
$where.=$this->ref[$i]."='".$val[$i]."'";
}else{
$where.=" && ".$this->ref[$i]."='".$val[$i]."'";
}
}
$result=$val[$i]->select("*")->where($where)->result();

if(!empty($result)){
$rs=$result->fetch(PDO::FETCH_OBJ);
$session=new session();
$session->createsession($rs->id);
return true;
}else{
return false;
}


}

public function isAlive(){
session_start();
if(isset($_SESSION['id'])){
return true;
}else{
return false;
}
}
public function getreference(){
if(isset($_SESSION['id'])){
return $_SESSION['id'];
}else{
return NULL;
}

}

public function free(){
$session=new session();
$session->destroysession();
}
}

?>