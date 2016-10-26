<?php
require_once('Validator.php');
class UrlValidator extends Validator{

protected  function validate($urldata){
if(empty($urldata[1]) || !$this->checkFile($urldata[1])){
parent::setError("File does not exists");
//echo "File  doesnt exists<br/>";
}
if(empty($urldata[1]) || !$this->checkClass($urldata[1])){
parent::setError("Class does not exists");
//echo "Class  doesnt exists<br/>";
}

if(empty($urldata[2]) || !$this->checkMethod($urldata[1],$urldata[2])){
parent::setError("method does not exists");
//echo "Method  doesnt exists<br/>";
}

if(empty($urldata[2]) || !$this->checkView($urldata[2],$urldata[1])){    ///another option for checking view
parent::setError("View does not exists");
//echo "View  doesnt exists<br/>";
}

}

private function checkFile($filedata){
if(file_exists('../application/controllers/'.$filedata."Controller.php")){   ///note here file_exists take path relative to server index not to this file...
require_once('/../../../application/controllers/'.$filedata."Controller.php");                                                                                /////this file is included once here so it is automaticlly in appcontroller and chk class method can use it..
return true;                                                                    ///effect of application directory
}
else{
return false;
}
}
private function checkClass($classdata){
if(class_exists($classdata."Controller")){
return true;
}else{
return false;
}
}
private function checkMethod($classdata,$methoddata){
if(method_exists($classdata."Controller",$methoddata."Action")){
return true;
}else{
return false;
}
}

private function checkView($methoddata,$classdata){  /////Error correted here this fucntion will check for the view file related to method action
                                          ////note here method data is passes as we will check for methodview.php

if(file_exists('../application/views/'.$classdata.'/'.$methoddata."view.php")){   ///note here file_exists take path relative to server index not to this file...
                                                                      /////this file is included once here so it is automaticlly in appcontroller and chk class method can use it..
return true;
}
else{
return false;
}



}







}

?>