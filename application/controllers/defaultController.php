<?php
class defaultController extends appController{
private $validator;
//public function __construct($validator){
//parent::__construct();
//$this->validator=$validator;
//}
public function defaultAction(){
//$this->view->errors=$this->validator->getErrors();


}

public function sendsms(){

$AccountSid = "AC2e1e544026382315300585d08377f4fb";
$AuthToken = "01858f2c4ec0598217f55cff6b00f4da";
	$http = new Services_Twilio_TinyHttp(
    'https://api.twilio.com',
    array('curlopts' => array(CURLOPT_HTTPPROXYTUNNEL=>0,CURLOPT_PROXY=> '',CURLOPT_FOLLOWLOCATION=>0,CURLOPT_RETURNTRANSFER=>0,CURLOPT_SSL_VERIFYPEER => false,
       ))
);

$client = new Services_Twilio($AccountSid, $AuthToken, '2010-04-01', $http);
	
	//$client = new Services_Twilio($AccountSid, $AuthToken);
	$sms = $client->account->sms_messages->create(
	"+491775282706", // From this number
	"+15005550006", // To this number
	"This is from mvc framework !"
	);

///////////////////////////sending sms





print $message->sid;

}


public function signupAction(){

$connection=new connection('localhost','seproject2','root','');
$table=new model_user($connection);



$mobileno=$_POST['mobileno'];
$userid=$_POST['userid'];
$password=$_POST['password'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
//$rt=$_POST['rating'];

//$stmt = $con->prepare('INSERT into rate(eventid,rating) VALUES(?,?)');
//$stmt->execute(array($r,$_POST['rating']));

$r=$table->select("userid")->where("userid='".$userid."'")->result();
if($r!=false){
$rs=$r->fetch(PDO::FETCH_OBJ);
if($rs!=false){
echo "Username already exists";
}else{
if($table->insert(array("mobile"=>$mobileno,"userid"=>$userid,"password"=>$password,"firstname"=>$firstname,"lastname"=>$lastname,"type"=>2))){
$connection->close();

//$this->sendsms();

echo "Your account has been created";

//////////////////////////////////////////////////////////////query top post
/*$connection=new connection('localhost','seproject2','root','');
$table=new model_post($connection);



$r=$table->select("title,description")->where("rank=(select max(rank) from topic)")->result();
while($rs=$r->fetch(PDO::FETCH_OBJ)){
echo $r;
$title=$rs->title;
$description=$rs->description;
$description=substr($description, 0,120);
}




//////////////////////////////////////////////////////////////sending sms
$AccountSid = "AC2e1e544026382315300585d08377f4fb";
$AuthToken = "01858f2c4ec0598217f55cff6b00f4da";


$client = new Services_Twilio($AccountSid, $AuthToken);
	
	//$client = new Services_Twilio($AccountSid, $AuthToken);
	$message = $client->account->messages->sendMessage(
	"+1 (980) 238-2625", // From this number
	"+49".$mobileno, // To this number
	"Title:".$title."\n"."Description:".$description
	);

///////////////////////////sending sms





print $message->sid;*/
 }
else{
echo "sorry";
}


}
}else{

echo "Server Internal Error";
}





}

}


?>