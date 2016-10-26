<?php
class registry{
private $data=array(array(array()));
private $parm=array();
private static $var=NULL;
private function __construst(){}
private function __clone(){}
public static function getInstance(){                 //////////path is sent by appcontroller and get instance is 
if(self::$var==NULL){
self::$var=new self();
return self::$var;
}
else{
return self::$var;
}

}



public function __set($variable,$value){  ////varaible name which will be stored and its value
$var=debug_backtrace();
$this->data[$var[1]["class"]][$var[1]["function"]][$variable]=$value;          
}

public function __get($variable){            /////variable name which is already stored
//$key=array()
//$key=array_keys($this->data);
$c=$this->parm[0]."Controller";
$a=$this->parm[1]."Action";
return $this->data[$c][$a][$variable];                     ////param is set by get instance
}

public  function setparam($path){
if((!empty($path[1]) && !empty($path[2]))){               ////////if only one is empty both of them are set to controller and action 
$ct=$path[1]."Controller";
$at=$path[2]."Action";
}
else{
$ct="Controller";           
$at="Action";                 
}
if(array_key_exists($ct,$this->data)){                                ////////always fails if action is not set as ct is set to controller 
//if(array_key_exists($at,$this->data[$ct])){                  ///optional but secure if controller is found then find action for that controller... in second dimesion
$this->parm[0]=$path[1];
$this->parm[1]=$path[2];
//}
}
else{
$this->parm[0]="default";
$this->parm[1]="default";
}
}

public function isValid($key){
return array_key_exists($key,$this->data);
}


}
?>