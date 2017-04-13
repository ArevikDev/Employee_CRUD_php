<?php
include_once 'dbMySql.php';
$con = new DB_con();

// data insert code starts here.
if(isset($_POST['btn-save']))
{
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
	
	$res=$con->insert($fname,$lname,$age,$city,$email,$country,$bank_acc,$card_num,$phones,$addresses);
	if($res)
	{
		?>
		<script>
		alert('Record inserted');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
        window.location='index.php'
        </script>
		<?php
	}
}

?>
