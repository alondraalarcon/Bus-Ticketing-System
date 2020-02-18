<?php
	session_start();
	include("dbconni.php");
	date_default_timezone_set('Asia/Manila');
	ini_set('display_errors', 1);

	$trans = $_GET['trans'];

	switch ($trans) {
		case 'addnumber':

		$number = $con->real_escape_string($_GET['number']);
	



		$number_check = $con->prepare("SELECT registered_numbers FROM tbl_number WHERE registered_numbers=?");
		$number_check->bind_param("s",$number);
		$number_check->execute();


				$desc=$number_check->fetch();
				if($desc){
					  echo "Card Number is already registered!";
				 }else{

				 		$str_insert_number = $con->prepare("INSERT INTO tbl_number(registered_numbers) VALUES (?)");
						$str_insert_number->bind_param("s",$number);
						$str_insert_number->execute();

						if($str_insert_number->affected_rows == 0){
							echo "Record not saved";
						}else{
							 echo "Record saved";
						}

				 }


		


		break;

		case 'addbus':

		$bus_unit = $con->real_escape_string($_GET['bus_unit']);
	



		$bus_check = $con->prepare("SELECT bus_unit FROM tbl_bus WHERE bus_unit=?");
		$bus_check->bind_param("s",$bus_unit);
		$bus_check->execute();


				$bus=$bus_check->fetch();
				if($bus){
					  echo "Bus unit is already registered!";
				 }else{

				 		$str_insert_number = $con->prepare("INSERT INTO tbl_bus(bus_unit) VALUES (?)");
						$str_insert_number->bind_param("s",$bus_unit);
						$str_insert_number->execute();

						if($str_insert_number->affected_rows == 0){
							echo "Record not saved";
						}else{
							 echo "Record saved";
						}

				 }


		


		break;

		case 'adduser':
   	$username = $con->real_escape_string($_GET['username']);
	
	



		$number_check = $con->prepare("SELECT registered_numbers FROM tbl_number WHERE registered_numbers=?");
		$number_check->bind_param("s",$username);
		$number_check->execute();


				$desc=$number_check->fetch();
				if($desc){
                //    $username1 = $con->real_escape_string($_GET['username']);
	    $password = $con->real_escape_string($_GET['password']);
		$usertype = $con->real_escape_string($_GET['usertype']);
		$dtoday = date("Y-m-d H:i:s");
		$encpassword = md5($password);
	

		$str_add_user = $con->prepare("INSERT INTO tbl_user(username,password,usertype,date) VALUES (?,?,?,?)");
		$str_add_user->bind_param("sssd",$username,$encpassword,$usertype,$dtoday);
		$str_add_user->execute();

		if($str_add_user->affected_rows == 0){
			echo "Record not saved";
		}else{
			 echo "Record saved";
		}
          }
                else{
                    echo "Account not on Registered Numbers";
                }

		break;
	
	}

?> 
