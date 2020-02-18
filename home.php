<?php
session_start();
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
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
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
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Dashboard</h4>
              <br/>
            </div>

          </div>
          <div class="row">
          <div class="col-lg-4">
             <div class="card border-success mb-3">
            <div class="card-header bg-success" style="color:#fff;">Buses</div>
            <div class="card-body text-success">
              <?php
                    include("dbconni.php");

                    $query = mysqli_query($con,"SELECT COUNT(*) as total FROM tbl_bus WHERE type=0");
                    $row = mysqli_fetch_assoc($query);

                    
                ?>
               <h1 class="card-title text-center" style="font-size:30px;"><?php echo $row['total'];?></h1>
              <p class="card-text text-center">Total Numbers of Buses</p>
            </div>
          </div>
          </div>
          <div class="col-lg-4">
            <div class="card border-danger mb-3">
            <div class="card-header bg-danger" style="color:#fff;">Registered Numbers</div>
            <div class="card-body text-danger">
              <?php
                    include("dbconni.php");

                    $query = mysqli_query($con,"SELECT COUNT(*) as total FROM tbl_number");
                    $row = mysqli_fetch_assoc($query);

                    
                ?>
               <h1 class="card-title text-center" style="font-size:30px;"><?php echo $row['total'];?></h1>
              <p class="card-text text-center">Total Numbers of Registered Numbers</p>
            </div>
          </div>  
          </div>
          <div class="col-lg-4">
            <div class="card border-warning mb-3">
            <div class="card-header bg-warning" style="color:#fff;">User Accounts</div>
            <div class="card-body text-warning">
              <?php
                    include("dbconni.php");

                    $query = mysqli_query($con,"SELECT COUNT(*) as total FROM tbl_user WHERE type=0");
                    $row = mysqli_fetch_assoc($query);

                    
                ?>
               <h1 class="card-title text-center" style="font-size:30px;"><?php echo $row['total'];?></h1>
              <p class="card-text text-center">Total Numbers of User Account</p>
            </div>
          </div>  
          </div>
        </div>
        
          

         </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

