<?php
	session_start();
	include("dbconni.php");
	date_default_timezone_set('Asia/Manila');
	error_reporting(0); 

	$trans = $_GET['trans'];

	switch ($trans) {
		case 'deletebus':

		$bus_id = $con->real_escape_string($_GET['bus_id']);
		
		$str_update_customer = $con->prepare("UPDATE tbl_bus SET type=1 WHERE id=?");
		$str_update_customer->bind_param("i",$bus_id);
		$str_update_customer->execute();

		if($str_update_customer->affected_rows == 0){
			echo "Record not deleted";
		}else{
			 echo "Record deleted";
		}


		break;

		case 'deleteuser':

		$user_id = $con->real_escape_string($_GET['user_id']);
		
		$str_delete_user = $con->prepare("UPDATE tbl_user SET type=1 WHERE id_number=?");
		$str_delete_user->bind_param("i",$user_id);
		$str_delete_user->execute();

		if($str_delete_user->affected_rows == 0){
			echo "Record not deleted";
		}else{
			 echo "Record deleted";
		}


		break;

		
	}

?> 
