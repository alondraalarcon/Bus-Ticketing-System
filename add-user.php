<?php
session_start();
ini_set('display_errors', 1);
include("dbconni.php");
if(isset($_SESSION["username"])){
      include("dbconni.php");
      $username = $_SESSION["username"];
}else{
        header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Yellow Dot</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #ffff7e">
        <a class="navbar-brand brand-logo" href="home.php">YellowDot</a>
        <a class="navbar-brand brand-logo-mini" href="home.php"><img src="images/logo.png" alt="logo" style="width:30px;height: 30px;"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item preview-item" href="logout.php">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/boss.png">
          </div>
          <div class="user-name" style="color:#555;">
              Administrator
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="fas fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list-number.php">
              <i class="fas fa-list-ol menu-icon"></i>
              <span class="menu-title">Registered Numbers</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="list-bus.php">
             <i class="fas fa-bus-alt menu-icon"></i>
              <span class="menu-title">Manage Bus</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accounts" aria-expanded="false" aria-controls="ui-basic">
             <i class="fas fa-user-lock menu-icon"></i>
              <span class="menu-title">Manage Accounts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="accounts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-user.php">Add User</a></li>
                <li class="nav-item"> <a class="nav-link" href="list-user.php">View User</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="archive.php">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Archive</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add User Account</h4>
                  <br/>
                 <div class="alert alert-success" role="alert" id="ajaxDiv" style="display:none;"></div>
                  <div class="alert alert-danger" role="alert" id="ajaxDiv2" style="display:none;"></div>
                    <div class="row">
                      <div class="col">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="username">
                        <span id="errorusername" style="color:red;"></span>
                      </div>
                      <div class="col">
                        <label for="exampleInputUsername1">Password</label>
                        <input type="password" class="form-control" id="password">
                        <span id="errorpassword" style="color:red;"></span>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="exampleInputUsername1">User Type</label>
                       <select class="form-control" id="usertype">
                        <option value="0">Please Select</option>
                        <option value="1">Administrator</option>
                        <option value="2">Conductor</option>
                        <option value="3">User</option>
                      </select>
                        <span id="erroruser" style="color:red;"></span>
                      </div>
                  
                      
                    </div>
                  
                    <br/>
                    
                    <button type="button" class="btn btn-primary mr-2" onclick="savenumber()">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
           <!--  -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
    function savenumber(){


      var request;
          try {
            request = new XMLHttpRequest();
          } catch(err) {
            try {
              request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(err) {
              try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
              } catch(err) {
                alert("Your browser does not support XMLHTTP!");
                return false;
              }
            }
          }
          
        request.onreadystatechange = function(){
            if(request.readyState == 4){
              var ajaxDisplay = document.getElementById('ajaxDiv');
              ajaxDisplay.innerHTML = request.responseText.replace(/^\s+|\s+$/gm,'');
              var wresponse = request.responseText.replace(/^\s+|\s+$/gm,'');
              
              if(wresponse=='Record saved'){
                    window.location.href='list-user.php';
              }
              $("#ajaxDiv").fadeTo(200,50);
            }
          }

          var errorusername = document.getElementById('errorusername');
          errorusername.innerHTML ="";
          var username = document.getElementById('username').value;
          if(username==""){
            errorusername.innerHTML = "Please fill out this field!";
            document.getElementById('username').style.border = "1px solid red";
            return;
          }else{
            document.getElementById('username').style.border = "1px solid #f2f2f2";
         
          }

          var errorpassword = document.getElementById('errorpassword');
          errorpassword.innerHTML ="";
          var password = document.getElementById('password').value;
          if(password==""){
            errorpassword.innerHTML = "Please fill out this field!";
            document.getElementById('password').style.border = "1px solid red";
            return;
          }else{
            document.getElementById('password').style.border = "1px solid #f2f2f2";
            
          }

          var erroruser = document.getElementById('erroruser');
          erroruser.innerHTML ="";
          var usertype = document.getElementById('usertype').value;
          if(usertype==0){
            erroruser.innerHTML = "Please fill out this field!";
            document.getElementById('usertype').style.border = "1px solid red";
            return;
          }else{
            document.getElementById('usertype').style.border = "1px solid #f2f2f2";
            
          }

          var queryString = "?trans=adduser&username=" + username + "&password=" + password + "&usertype=" + usertype;
          request.open("GET", "save_records.php" + queryString, true);
          request.send(null); 
    }
  </script>
</body>

</html>
