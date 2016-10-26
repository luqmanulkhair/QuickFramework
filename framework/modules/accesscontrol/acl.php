<?php


class acl{

private $roles=array();
private $resources=array();

private function __construct(){}
private function __clone(){}
private static $var=NULL;
public function getInstance(){              //////single instance of acl would manage the roles and resources.....                
if(self::$var==NULL){
self::$var=new self();
return self::$var;
}
else{
return self::$var;
}

}


public function ec($k){
if(array_key_exists($k,$this->resources)){
$this->resources["$k"]->check();
}else{
echo "doesnot exist";

}
}


public function addRole($rol){
$rname=$rol->getname();             ////not working directly
$this->roles["$rname"]=$rol;
}

public function addResource($resource){
$rsname=$resource->getname();         ///not working directinly
$this->resources["$rsname"]=$resource;
}




}



?>