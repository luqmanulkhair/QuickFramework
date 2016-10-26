<?php
require_once('ApplicationController.php');
class commandr{
private $request;
public function __construct($request){
$this->request=$request;
}
public function getbootstrap(){
require_once('/../modules/bootstrap.php');           ///code for autoloading...
$a=autoloader::getInstance();
$a->autoload();
}
public function getAppController(){
$var=$this->request->getUrl();
if(isset($var)){

$pos = strpos($var,'?');
if($pos){

$result= substr($var,0,$pos);

$path=explode("/",$result);

}
else{
$path=explode("/",$var);

}
$command=new ApplicationController($path);
return $command;
}
}
}



?>
