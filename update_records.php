<?php
	session_start();
	include("dbconni.php");
	date_default_timezone_set('Asia/Manila');
	error_reporting(0); 

	$trans = $_GET['trans'];

	switch ($trans) {
		case 'updatebus':

		$bus = $con->real_escape_string($_GET['bus']);
		$bus_id = $con->real_escape_string($_GET['bus_id']);
		
		$str_update_customer = $con->prepare("UPDATE tbl_bus SET bus_unit=? WHERE id=?");
		$str_update_customer->bind_param("si",$bus,$bus_id);
		$str_update_customer->execute();

		if($str_update_customer->affected_rows == 0){
			echo "Record not update";
		}else{
			 echo "Record updated";
		}


		break;

		case 'updateuser':

		$username = $con->real_escape_string($_GET['username']);
		$password = $con->real_escape_string($_GET['password']);
		$usertype = $con->real_escape_string($_GET['usertype']);
		$user_id = $con->real_escape_string($_GET['user_id']);

		$dtoday = date("Y-m-d H:i:s");
		$encpassword = md5($passwoord);
		
		$str_update_customer = $con->prepare("UPDATE tbl_user SET username=?, password=?, usertype=? WHERE id_number=?");
		$str_update_customer->bind_param("sssi",$username,$encpassword,$usertype,$user_id);
		$str_update_customer->execute();

		if($str_update_customer->affected_rows == 0){
			echo "Record not update";
		}else{
			 echo "Record updated";
		}


		break;

		
	}

?> 
