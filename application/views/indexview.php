<?php


class view{
private $view;
public function __construct(){
$this->view=registry::getInstance();

}
public function setview($path){
if(!empty($path)){
require_once($path[1].'/'.$path[2].'view.php');

}
else{
require_once('default/defaultview.php');
}
}


}



?>