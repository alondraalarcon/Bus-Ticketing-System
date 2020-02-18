<?php
include("dbconni.php");
ini_set('display_errors', 1);

$username = $password ="";
  if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           // echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($con, $_POST["username"]);  
           $password = mysqli_real_escape_string($con, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT username,password FROM tbl_user WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($con, $query);  
           $row = mysqli_fetch_array($result);
           if(mysqli_num_rows($result) > 0)  
           {    
                     session_start();
                     $_SESSION['username'] = $username;
                        
                  echo "<script language='javascript'>alert('Correct Password! Logging in..')</script>";
                  
                  echo "<script>window.location.href='home.php'</script>";
                    
                    
           }  
           else  
           {  
                echo '<script>alert("Wrong username/password!")</script>';  
           }  
      } 



?>

<script>
  function validate(){
    var x = document.forms["myForm"]["email"].value;
    var y = document.forms["myForm"]["password"].value;


    if (x == ""){
      alert("Email is Required!");
      return false;
    }else if (y == ""){
      alert("Password is Required!");
      return false;
    }


  }

</script>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 <title>Yellow Dot</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body style="font-family: 'Poppins', sans-serif; ">

<form method="POST" name="myForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="container">

  <div id="login_form" class="well">
    <h3><center><img src="images/logo.png" height="180px" width="180px" style="border-radius:50px;"></center></h3>
    <br/>
    Username: <input type="text" name="username" id="uname" class="form-control"required>
    <div style="height: 10px;"></div>   
    Password: <input type="password" name="password" id="pass "class="form-control" required> 
    <div style="height: 10px;"></div><br>
    <button type="submit" id="btn" class="btn"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</button>
    </form>
    <div style="height: 15px;"></div>
    <div style="color: red; font-size: 15px;">
    </div>
  </div>
</div>
</body>
</html>



  <style>
  #login_form{
    width:350px;
    height:300px;
    position:relative;
    top:50px;
    margin: auto;
    padding: auto;
  }

  h3{
    font-family: century gothic;
    font-size: 15px;
  }


  #btn{
    background:#ffff7e;
    width: 100%;
    color:#555;
  }



  </style>

<script type="text/javascript">
  function btn{

    var fn = document.getElementById('')

  }

</script>