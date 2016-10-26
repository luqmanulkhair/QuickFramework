<?php
require_once('Validator.php');
class ViewValidator extends Validator{

protected  function validate($viewdata){
$path=$viewdata[0];
$data=$viewdata[1];
if((!empty($path[1]) && !empty($path[2]))){               ////////if only one is empty both of them are set to controller and action 
$ct=$path[1]."Controller";
$at=$path[2]."Action";
}
else{
$ct="Controller";           
$at="Action";                 
}
if(!array_key_exists($ct,$this->data)){                                ////////always fails if action is not set as ct is set to controller 
parent::setError("Please set the view in the specified location");
if(!array_key_exists($at,$this->data[$ct])){                  ///optional but secure if controller is found then find action for that controller... in second dimesion
parent::setError("Please set the view in the specified location");
}
}


}


}

?>