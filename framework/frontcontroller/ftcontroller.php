<?php

require_once('request.php');                     //////requst and commandr classes are included here....
require_once('/../commands/commandr.php');
class ftcontroller{
///@variables 
/// for request object commandr and command


private $request;
private $commandr;
private $AppController;


public function __construct(){           //////1st request then commandr and then command is created...
$this->createRequest();
$this->createCommandr();
}

private function createRequest(){
$this->request=new request();
$this->request->setUrl();

}


private function createCommandr(){
$this->commandr=new commandr($this->request);
$this->commandr->getbootstrap();                                      //////code changed for auto loading
$this->AppController=$this->commandr->getAppController();
$this->fireAction();
}

private function fireAction(){
$this->AppController->execute();
}
















public function getit(){
$var=$this->request->getUrl();
if(isset($var)){
return $this->request->getUrl();}
}
}

?>