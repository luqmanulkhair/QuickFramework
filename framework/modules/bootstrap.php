<?php

class autoloader{
private static $inst=NULL;
private function __construct(){}
private function __clone(){}
public static function getInstance(){
if(self::$inst==NULL){
self::$inst=new self();
return self::$inst;
}
else{
return self::$inst;
}
}



public function autoload(){
$this->register('database');
$this->register('model');
$this->register('auth');
$this->register('connection');
$this->register('acl');
$this->register('role');
$this->register('resourc');
$this->register('upload');
$this->register('Twilio');
}

public function auth($path){
if(file_exists("../framework/modules/authenticate/".$path.".php")){
require_once "authenticate/".$path.".php";                                      
}

}

public function Twilio($path){
if(file_exists("../framework/modules/twilo/Services/Twilio.php")){
require_once "twilo/Services/Twilio.php";                                      
}

}

public function upload($path){
if(file_exists("../framework/modules/uploader/".$path.".php")){
require_once "uploader/".$path.".php";                                      
}

}



public function acl($path){
if(file_exists("../framework/modules/accesscontrol/".$path.".php")){
require_once "accesscontrol/".$path.".php";                                      
}

}


public function role($path){
if(file_exists("../framework/modules/accesscontrol/".$path.".php")){
require_once "accesscontrol/".$path.".php";                                      
}

}

public function resourc($path){                                                                //////////////please check the name when instentiating more prone to errors
if(file_exists("../framework/modules/accesscontrol/".$path.".php")){
require_once "accesscontrol/".$path.".php";                                      
}

}




public function connection($path){
if(file_exists("../framework/modules/database/".$path.".php")){
require_once "database/".$path.".php";                                      
}

}

public function database($path){
if(file_exists("../framework/modules/database/".$path.".php")){          /////too tricky cooding double autoloading  database 1.2
require_once "database/".$path.".php";                                      ///keep it in mind require is wrst autoloader how ever the file_exists changes
}
}
public function model($path){
$modelpath=str_replace("_","/",$path);
if(file_exists('../application/'.$modelpath.'.php')){                   /////model 1.1
require_once "/../../application/".$modelpath.".php";
}
}
public function register($target){
spl_autoload_register(array($this,$target));

}
public function setpath($pathtotarget){

$modelpath=str_replace("_","/",$path);
if(file_exists('../application/'.$modelpath.'.php')){                   /////model 1.1
require_once "/../../application/".$modelpath.".php";
}

}
}

?>