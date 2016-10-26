<?php
class request{
private $url;

public function getUrl(){
return $this->url;
}

public function setUrl(){
if(!empty($_SERVER['REQUEST_URI'])){
$this->url=$_SERVER['REQUEST_URI'];
 }
 else{
 $this->url=Null;
}
  }



      }

?>