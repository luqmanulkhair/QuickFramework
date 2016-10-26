<html>
<head>
<title>This is the another page page...</title>
</head>
<body>
<h1>Welcome to another page.</h1>
<?php  
$r=$this->view->data; /// array data is receved here
foreach($r as $k){
echo $k->name."<br/>";
}
?>
</body>



</html>