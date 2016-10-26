<?php
class dbTable{
private $conn;
protected $name;
protected $primarykey;

private $args=array();                  /////////////////////for query 
private $table;
private $whereClause;
private $limitClause;
private $update;

public function __construct($connection){
$this->conn=$connection->getconnection();
}



public function select(){
$this->args=func_get_args();      ////select could have any number of arguments
return $this;                                    /////////////$this mean current instance or object
}

public function where($clause){
$this->whereClause=$clause;
return $this;

}
public function limit($limit){
$this->limitClause=$limit;
return $this;
}
public function result(){          //////////join is used when you want to joun the elements of an array and put some thing in between elements
$query="select ".join(",",$this->args)." from ".$this->name." where ".$this->whereClause;
//." limit ".$this->limitClause;
$q=$this->conn->query($query);
return $q; 
}


public function insert($args){   ////insert function 
$values=array_values($args);
$arr=array_keys($args);
$qs=array();
$i=0;
foreach($arr as $ar){
$qs[$i]='?';
$i++;
}
$q=implode(",",$qs);
$columns=implode(",",$arr);
$stmt = $this->conn->prepare("INSERT INTO ". $this->name."(".$columns.") VALUES(".$q.")");
if($stmt->execute($values)){
return true;}
else{
return false;
}
}


public function update(){ 
return $this;                                    /////////////$this mean current instance or object
}

public function set($statement){
$this->update=$statement;
return $this;
}
public function upresult(){          //////////join is used when you want to joun the elements of an array and put some thing in between elements
$query="Update ".$this->name." set ".$this->update." where ".$this->whereClause;
//." limit ".$this->limitClause;
if($this->conn->query($query)){
return true;
}else{

return false;
}
}


public function delete(){ 
return $this;                                    /////////////$this mean current instance or object
}
public function dtresult(){          //////////join is used when you want to joun the elements of an array and put some thing in between elements
$query="delete from ".$this->name." where ".$this->whereClause;
//." limit ".$this->limitClause;
if($this->conn->query($query)){
return true;
}else{

return false;
}
}
}


?>