<?php
include_once 'dbMySql.php';
$con = new DB_con();


$jsondata = file_get_contents('dataimport/employees.json');

$json = json_decode($jsondata, TRUE);

echo "<pre>";
//var_dump($json);

foreach($json as $data){
	$fname=addslashes($data['firstName']);
	$lname=addslashes($data['lastName']);
	$age=addslashes($data['age']);
	$city=addslashes($data['city']);
	$email=addslashes($data['email']);
	$country=addslashes($data['country']);
	$bank_acc=addslashes($data['bankAccountNumber']);
	$card_num=addslashes($data['creditCardNumber']);
	
	foreach($data as $emp=>$val){
		
		if(is_array($val)){
			
			if ($emp=='phones') {
				$phones=addslashes(implode(",",$val));
				
								}
			else if ($emp=='addresses') {
				$addresses=addslashes(implode(",",$val));
								}
			
		
				}
					
		}
		$res=$con->insert($fname,$lname,$age,$city,$email,$country,$bank_acc,$card_num,$phones,$addresses);
	
	}

 header('Location: index.php');

?>