<?php
require_once('registry.php');
class appController{
protected $view;
public function __construct(){
$this->view=registry::getInstance();
}




}



?>