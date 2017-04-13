<?php
include_once 'dbMySql.php';
$con = new DB_con();

// data insert code starts here.
if(isset($_POST))
{

	$ID = $_POST['id_row'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$age = $_POST['age'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$bank_acc = $_POST['bank_acc'];
	$card_num = $_POST['card_num'];
	$phones = $_POST['phones'];
	$addresses = $_POST['addresses'];

	$res=$con->update($ID,$fname,$lname,$age,$city,$email,$country,$bank_acc,$card_num,$phones,$addresses);
	
	if($res)
		
	{
		echo "Successfully updated the record";

	}
	else
	{
		echo "Error updating the record";
		
	}
}

?>
