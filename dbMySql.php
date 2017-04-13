<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'emp_db');

class DB_con
{
	function __construct()
	{
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		mysql_select_db(DB_NAME, $conn);
		
		
		
	}
	
	public function insert($fname,$lname,$age,$city,$email,$country,$bank_acc,$card_num,$phones,$addresses){
		$res = mysql_query("INSERT employees(ID,first_name,last_name,age,city,email,country,bank_acc,card_num,phones,addresses)
		VALUES(NULL,'$fname','$lname','$age','$city','$email','$country','$bank_acc','$card_num','$phones','$addresses')");
		return $res;
	}
	
	public function update($ID,$fname,$lname,$age,$city,$email,$country,$bank_acc,$card_num,$phones,$addresses){
		$res = mysql_query("UPDATE employees SET first_name='".$fname."',
												last_name='".$lname."',
												age= '".$age."',
												city='".$city."',
												email='".$email."',
												country='".$country."',
												bank_acc='".$bank_acc."',
												card_num='".$card_num."',
												phones='".$phones."',
												addresses='".$addresses."'	WHERE ID = '".$ID."'");
		
		return $res;
	}
	
	public function select()
	{
		$res=mysql_query("SELECT * FROM employees");
		return $res;
	}
		
	public function select_row($ID)
	{
		$res=mysql_query("SELECT * FROM employees WHERE ID=$ID");
		return $res;
	}
	
	public function delete_row($ID)
	{
		$res=mysql_query("DELETE FROM employees WHERE ID='".$ID."'");
		return $res;
	}
}

?>