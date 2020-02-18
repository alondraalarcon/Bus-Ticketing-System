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
            <div class="col-lg-12">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Archived Data</h4>
                  <br/>
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#555">Bus</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:#555">User Accounts</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <br/>
                      <div class="alert" role="alert" style="background: #ffff7e;color:#555">Buses</div>
                      <div class="table-responsive">
                 <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                         <th>No</th>
                         <th>Bus Unit</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                        include("dbconni.php");
                        $ctr = 1;
                          $query = mysqli_query($con,"SELECT * FROM tbl_bus WHERE type=1");
                          while($row=mysqli_fetch_assoc($query)){
                          


                            echo '<tr>
                          <td>'.$ctr.'</td>
                          <td>'.$row['bus_unit'].'</td>

                          
                         
                        </tr>';

                        $ctr++;
                          }


                        ?>
                      
                      </tbody>
                    </table>
                  </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <br/>
                      <div class="alert" role="alert" style="background: #ffff7e;color:#555">User Accounts</div>
                      <div class="table-responsive">
                 <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                         <th>No</th>
                         <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                        include("dbconni.php");
                        $ctr = 1;
                          $query = mysqli_query($con,"SELECT * FROM tbl_user WHERE type=1");
                          while($row=mysqli_fetch_assoc($query)){
                          


                            echo '<tr>
                          <td>'.$ctr.'</td>
                          <td>'.$row['username'].'</td>

                          
                         
                        </tr>';

                        $ctr++;
                          }


                        ?>
                      
                      </tbody>
                    </table>
                  </div>
                    </div>
                    
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  <div id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h6 id="exampleModalLabel" class="modal-title" style="color:#555">Update Bus Information</h6>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
        <div class="modal-body">
          <div id="customer"></div>
        </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h6 id="exampleModalLabel" class="modal-title" style="color:#555">Delete User Information</h6>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
        <div class="modal-body">
          <div id="customerdelete"></div>
        </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
<style type="text/css">
  .pagination .page-item.active .page-link { background-color: #ffff7e;border-color: #ffff7e;color:#555; }

table {
  table-layout: fixed ;
  width: 100% ;
}
td {
  width: 25% ;
}
</style>
