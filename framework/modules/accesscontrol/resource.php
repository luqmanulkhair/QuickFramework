<?php

class resourc{

private $resourcename;
public function __construct($role){
$this->rolename=$role;
}


public function check(){
echo "resource is working properly";

}

public function getname(){
return $this->rolename;
}




}




?>