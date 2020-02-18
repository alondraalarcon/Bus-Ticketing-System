<?php
//$db_name = "yellowdot";
//include("dbconni.php");
require "dbconni.php";
//$user_name = null;
//$last_name = null;
//$usertype = null;
$username = $_POST["first_name"];
$password = "123";
$usertype = "User";
//$date = date('Y-m-d H:i:s');



//$server_name = "localhost";
//$conn = mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);
$mysql_query = "Select * from tbl_number where registered_numbers like '$username'";

	
$result = mysqli_query($conn,$mysql_query);

if(mysqli_num_rows($result) > 0){
	//echo "wews";
	$mysql_query1 = "Select username from tbl_user where username like '$username' ";
	$res = mysqli_query($conn,$mysql_query1);
	//$rowCheck=mysqli_num_rows($mysql_query1);
	
if(mysqli_num_rows($res) > 0){
	echo "Account Already Registered";

	}else{
		$mysql_query2 = "Insert into tbl_user (username,password,usertype,date)
		values('$username', '$password','$usertype',CURRENT_TIMESTAMP)";
		if($conn->query($mysql_query2) === TRUE){
			
		
		//$result = $conn->query($mysql_query2);
			//$result = mysqli_query($conn,$mysql_query2);
		echo "Successfully Registered";
			
		//debug_print_backtrace();}
	}/*else{
			
			
			echo $mysql_query2. "br" .$conn->error;
		}*/
	//$Status = "Item not Registered";
	//}else{
  //echo $mysql_query2. "br" .$conn->error;
	}
}
	else{
		//echo $mysql_query. "br" .$conn->error;
		echo "Account Number is not on Registered numbers";
		debug_print_backtrace();
		
	}
return true;
//	}
	$conn->close();
	//
	//$result = mysqli_query($conn,$mysql_query1);
		//$result = mysqli_query($conn,$mysql_query2);
		//if(mysqli_query($conn->mysql_query2);
		//{
		
		//}
	/*	else{
			echo "Error";
		}
	}
	
}
	else{*/
//	else{
?>
	
	