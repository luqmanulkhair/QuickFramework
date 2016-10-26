<?php
abstract class Validator{
private $errors;

public function __construct($vdata){
$this->errors=array();
$this->validate($vdata);
}

abstract protected function validate($vdata);

protected function setError($msg){
$this->errors[]=$msg;
}
public function isValid(){
if(count($this->errors)>0){
return false;
}else{
return true;
}
   }

public function getErrors(){
return $this->errors;
}


}

?>