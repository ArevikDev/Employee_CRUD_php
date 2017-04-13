<?php
include_once 'dbMySql.php';

if(isset($_POST['jsonObj'])){
	
	
	
	$jsonObj =$_POST['jsonObj'];

	$jsonObj =json_decode($jsonObj, true);
	$jsonObj= (array)$jsonObj;
	
	
	for($i=0; $i<count($jsonObj); $i++){
		
		$ID=$jsonObj[$i]['item_id'];
		
	$con = new DB_con();
	$res=$con->delete_row($ID);
	}
	

}



?>