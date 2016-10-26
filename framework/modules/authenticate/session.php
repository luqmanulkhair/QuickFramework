<?php

class session{

public function createsession($id){
session_start();
$_SESSION['id']=$id;
}
public function destroysession(){
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])){
setcookie(session_name(),'',time()-10000,'/');
}
session_destroy();
}
}
?>