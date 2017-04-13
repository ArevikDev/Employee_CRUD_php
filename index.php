<?php
include_once 'dbMySql.php';
$con = new DB_con();
$res=$con->select();
if(mysql_num_rows($res)==0){
	 if (!headers_sent()){
	  ob_start();
      header('Location: import.php');
	  ob_end_flush(); 
    }
};
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OOP Employees</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/bbb26cc8d9.js"></script>

</head>
<body>
<center>

<div id="header">
	<div id="content_head">
    <label>Employee Records</label>
    </div>
</div>

<div id="body">

	<button class="btn btn-primary" id="new_emp_form_btn">Add a new employee</button>
	<button class="btn btn-primary" id="upd_emp_form_btn">Show employees</button>
	<div class="form_new">
	<!-- NEW EMPLOYEE FORM WILL BE LOADED HERE -->
	</div>
	<div class="form_upd">
	<!--UPDATE EMPLOYEE FORM WILL BE LOADED HERE -->
	</div>
	
	<!--TABLE WITH EMPLOYEE DATA-->
	<button class="btn btn-danger hide" >Delete</button>
	<div id="content">
	

    <table align="center" cellspacing="0" style="border-collapse: collapse!important;" width="100%" id="example" class="table table-striped table-hover table-responsive">

	<thead>
    <tr>
	<th >delete</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>City</th>
    <th>Email</th>
    <th>Country</th>
    <th>Bank Account Number</th>
    <th>Credit Card Number</th>
    <th>Phones</th>
    <th>Addresses</th>
	<th >edit</th>

    </tr>
	</thead>
    <?php
	while($row=mysql_fetch_row($res))
	{
			?>
            <tr id="<?php echo $row[0]; ?>">
			<td align="center" class="delete-link" class="delete-link" >
			<input type="checkbox" class="checkbox">
			</td>
			<td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[8]; ?></td>
            <td><?php echo $row[9]; ?></td>
			<td><?php echo $row[10]; ?></td>
			<td align="center" class="edit-link">
			<a id="<?php echo $row['emp_id']; ?>"  href="#" title="Edit">
			<img src="edit.png" width="20px" />
            </a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>


</center>

<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});

	$('.checkbox').change(function(){
		if($('input:checked').length>0){
			$('.btn-danger').removeClass('hide');
			
			}
		else{
			$('.btn-danger').addClass('hide');
			
			}
	})


	$('.btn-danger').click(function(){
		if(confirm("Are you sure to remove these employees?")){
					jsonObj = [];
			$('table').find(':checked').each(function(){
			jsonObj.push({
				'item_id':$(this).parent().parent().attr('id')
			})

		})
		jsonObj=JSON.stringify(jsonObj);
		console.log(jsonObj);
			$.ajax({
                     type: "POST",
                     url: "delete.php",
                     data: {jsonObj:jsonObj },
					success: function(msg) {
							location.reload();
						}
					})
		}


		
	})
	
	
	$('#new_emp_form_btn').one('click',function(){
		$(this).addClass('new_load');
		$('.form_new').load("new_emp.php");
	})
	
	$(document).on('click','.new_load',function(){
		$('#update_emp').hide();
		$('#new_emp').toggle();
		$(this).text(function(i, text){
          return text === "Add a new employee" ? "Show employees" : "Add a new employee";
      })
})
	
$('.edit-link').one('click',function(){
	
		$(this).addClass('edit_load');

	})

$(document).on('click','.edit_load',function(){
		var edit_id= $(this).parent().attr('id');

     $(".form_upd").load('update_emp.php?edit_id='+edit_id);

		
		$('#new_emp').hide();
		$('#new_emp_form_btn').hide();
		$('#upd_emp_form_btn').show();
		$('#update_emp').show();
	
})	
	$('#upd_emp_form_btn').click(function(){
		$('#new_emp_form_btn').show();
		$('#update_emp').toggle();
		$(this).hide();
	})
	
	///submitting
	
	$('#form_new_emp').submit(function(e){
		e.preventDefault();
		
		var $form = $( this ),
          url = $form.attr( 'action' );
		  
		  var posting = $.post( url, 
		  { first_name: $('#first_name').val(), 
			last_name: $('#last_name').val(),	
			age: $('#age').val(),
			city: $('#city').val(),
			email: $('#email').val(),
			country: $('#country').val(),
			bank_acc: $('#bank_acc').val(),
			card_num: $('#card_num').val(),
			phones: $('#phones').val(),
			addresses: $('#addresses').val()
			
			} );

		posting.done(function( data ) {
        alert('success');
      });
	})
	
		$(document).on('click','#btn-upd',function(){
					
					$.ajax({
			
                    type: "POST",
                    url: "update_data.php",
              		data: {id_row: $('#form_upd_emp #row_id').val(), 
							first_name: $('#form_upd_emp #first_name').val(), 
							last_name: $('#form_upd_emp #last_name').val(),	
							age: $('#form_upd_emp #age').val(),
							city: $('#form_upd_emp #city').val(),
							email: $('#form_upd_emp #email').val(),
							country: $('#form_upd_emp #country').val(),
							bank_acc: $('#form_upd_emp #bank_acc').val(),
							card_num: $('#form_upd_emp #card_num').val(),
							phones: $('#form_upd_emp #phones').val(),
							addresses: $('#form_upd_emp #addresses').val()},
							
					success: function(data) {
							alert(data);
							location.reload();
					}
		})

	})
	
</script>
</body>
</html>