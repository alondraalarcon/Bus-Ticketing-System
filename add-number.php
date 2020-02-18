<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Regal Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #ffff7e">
        <a class="navbar-brand brand-logo" href="index.html">YellowDot</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo.png" alt="logo" style="width:30px;height: 30px;"/></a>
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
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item">
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
            <a class="nav-link" href="index.html">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Registered Numbers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Manage Buses</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Add Bus</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">View Buses</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Manage Accounts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Add Bus</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">View Buses</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
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
                  <h4 class="card-title">Add Number</h4>
                  <br/>
                 <div class="alert alert-success" role="alert" id="ajaxDiv" style="display:none;"></div>
                  <div class="alert alert-danger" role="alert" id="ajaxDiv2" style="display:none;"></div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Number</label>
                      <input type="text" class="form-control" id="number">
                      <span id="errornumber" style="color:red;"></span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" onclick="savenumber()">Save</button>
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
                    window.location.href='list-number.php';
              }
              $("#ajaxDiv").fadeTo(200,50);
            }
          }

          var displayError = document.getElementById('ajaxDiv2');
          displayError.innerHTML ="";
          var number = document.getElementById('number').value;
          if(number==""){
            displayError.style.display = "block";
            displayError.innerHTML = "Please fill out this field!";
            document.getElementById('number').style.border = "1px solid red";
            return;
          }else{
            document.getElementById('number').style.border = "1px solid #f2f2f2";
          }

          var queryString = "?trans=addnumber&number=" + number;
          request.open("GET", "save_records.php" + queryString, true);
          request.send(null); 
    }
  </script>
</body>

</html>
