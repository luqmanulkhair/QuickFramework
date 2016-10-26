<?php
require_once('validators/UrlValidator.php');
require_once('registry/appcontroller.php');
class ApplicationController{
private $path;
private $action;
private $controller;
private $validator;
private $view;

public function __construct($parm){
$this->path=$parm;
$this->validator=new UrlValidator($this->path);
}
private function getController(){
if($this->validator->isValid()){
//$var=$this->validator->getErrors();
$c=$this->path[1]."Controller";
$this->controller=new $c();
}
else{
require_once('/../../application/controllers/defaultController.php');
$this->controller=new defaultController($this->validator);
}
}
private function getAction(){
if($this->validator->isValid()){
$a=$this->path[2]."Action";
$this->action=$this->controller->$a();
}else{
$this->action=$this->controller->defaultAction();
}
}
private function getView(){
if($this->validator->isValid()){
$this->getViewdata();
require_once('/../../application/views/indexview.php');
$this->view=new view();
$this->view->setview($this->path);
}else{
$this->getViewdata();
require_once('/../../application/views/indexview.php');
$this->view=new view();
$this->view->setview(NULL);
}
}
private function getViewdata(){
$r=registry::getInstance();
$r->setparam($this->path);


}

public function execute(){
$this->getController();
$this->getAction();
$this->getView();


}
}

?>