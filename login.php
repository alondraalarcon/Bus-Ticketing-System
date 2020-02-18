
<?php
//$db_name = "yellowdot";
//session_start();
include("dbconni.php");
$username= $_POST["user_name"];
$password =$_POST["pass_word"];
//$server_name = "localhost";
//$conne = mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);
$mysql_query = "Select * from tbl_users where USERNAME like '$username' and PASSWORD like '$password'";
$result = mysqli_query($conn,$mysql_query);

if(mysqli_num_rows($result) > 0){
//	$Status = "failed";
	//echo json_encode(array("response"=>$Status));
	$logged_in_user = mysqli_fetch_assoc($result);
	
	if ($logged_in_user['USERTYPE'] == 'Administrator') {

				echo "Successfully Logged in as Administrator";
					  
			}
			else if ($logged_in_user['USERTYPE'] == 'User') {

				echo "Successfully Logged in as User";
					  
			}else if ($logged_in_user['USERTYPE'] == 'Supervisor') {

				echo "Successfully Logged in as Supervisor";
					  
			}else if ($logged_in_user['USERTYPE'] == 'Conductor') {

				echo "Successfully Logged in as Conductor";
					  
			} 
			else{
				echo "No User Login";
					  
			}
	//$mysql_query = "Select USERTYPE from tbl_users where USERNAME like '$username' and PASSWORD like '$password'";
	
}
else{
	//$row = mysqli_fetch_assoc($result);
	//$name = $row['USERNAME'];
echo "Logging in failed";
	//$Status = "ok";
	//echo json_encode(array("response"=>$Status,"Name:"=>$name));
}
?>