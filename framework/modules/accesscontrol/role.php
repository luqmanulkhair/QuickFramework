<?php

class role{

private $rolename;
private $users=array();
private $priveleges=array();
public function __construct($role){
$this->rolename=$role;
}


public function check(){
echo "role is working properly";

}

public function getname(){
return $this->rolename;
}


public function adduser($id){
$this->users[]=$id;
}

public function addpriveleges($resource){
$this->priveleges[]=$resource;

}

public function userexists($id){

if(array_key_exists($id,$this->users)){

return true;
}else{

return false;
}
}



}




?>