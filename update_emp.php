<?php
include_once 'dbMySql.php';

if(isset($_GET['edit_id']))
{
	$ID = $_GET['edit_id'];	
	
	$con = new DB_con();
	$res=$con->select_row($ID);
	

while($row=mysql_fetch_row($res))
{

?>

	<div id="update_emp">
	
    <form id="form_upd_emp" method="post" >
    <table align="center">
	
   <tr>
    <td><input style="display:none" type="text" name="first_name" id="row_id" value="<?php echo $row[0]; ?>" required /></td>
    </tr>
	   <tr>
    <td><input type="text" name="first_name" id="first_name" value="<?php echo $row[1]; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name"  id="last_name" value="<?php echo $row[2]; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="age"  id="age" value="<?php echo $row[3]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="city"  id="city" value="<?php echo $row[4]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="email"  id="email" value="<?php echo $row[5]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="country"  id="country" value="<?php echo $row[6]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="bank_acc" id="bank_acc" value="<?php echo $row[7]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="card_num" id="card_num" value="<?php echo $row[8]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="phones" id="phones" value="<?php echo $row[9]; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="addresses" id="addresses" value="<?php echo $row[10]; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" id="btn-upd"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
	
	<?php
	}
	
	}
	?>