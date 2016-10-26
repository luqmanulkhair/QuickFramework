<?php


class upload{




public function __construct(){

}

public function check(){
$uploaddir = '../public/upload/';
$file = $uploaddir . basename($_FILES['file']['name']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
$result = 1;
} else {
$result = 0;
}
return $result;
}
}




?>