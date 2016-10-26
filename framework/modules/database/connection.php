<?php
class connection{
private $conn;
public function __construct($host,$dbname,$dbuser,$dbpassword){
$param="mysql:host=$host;dbname=$dbname";
$this->conn=new PDO($param,$dbuser,$dbpassword);
}
public function getconnection(){
return $this->conn;

}
public function close(){
$this->conn=null;

}




}

?>