<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");

}
// Include config file
require_once "config.php";
$id = (int)$_GET['id'];
 
 
$sql = "UPDATE residents SET FIRSTNAME=:fname,MIDNAME=:midname,FAMNAME=:lname,ALIAS=:alias,FACEMARKS=:facemarks,BIRTHDATE=:birthdate,
SEX=:sex,CIVILSTAT=:civil,NATIONALITY=:nationality,RELIGION=:religion,OCCUPATION=:occupation,SPOUSENAME=:spouse,SPOUSEOCC=:spouseocc,VOTERSTAT:voter,BIRTHPLACE=:birthplace
 WHERE ID=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(":fname", $fname);
$stmt->bindParam(":midname", $midname);
$stmt->bindParam(":lname", $lname);
$stmt->bindParam(":alias", $alias);
$stmt->bindParam(":facemarks", $facemarks);
$stmt->bindParam(":birthdate", $birthdate);
$stmt->bindParam(":sex", $sex);
$stmt->bindParam(":civil", $civil);
$stmt->bindParam(":nationality", $nationality);
$stmt->bindParam(":religion", $religion);
$stmt->bindParam(":occupation", $occupation);
$stmt->bindParam(":spouse", $pspouse);
$stmt->bindParam(":spouseocc", $spouseocc);
$stmt->bindParam(":voter", $voter);
$stmt->bindParam(":birthplace", $birthplace);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="dash.php"
        >
          <div class="sidebar-brand-icon">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="sidebar-brand-text mx-6" style="font-size: 0.6em;">Resident Information Management System</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="dash.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading text-gray-100">Barangay Records</div>

        <!-- Resident Info -->
        <li class="nav-item">
         <a class="nav-link" href="residentinfo.php">
            <i class="fas fa-users text-gray-100"></i>
            <span>Resident Information</span></a
          >
        </li>

        <!-- Blotter Records -->
        <li class="nav-item">
          <a class="nav-link" href="blotterrecords.php">
            <i class="fas fa-clipboard text-gray-100"></i>
            <span>Blotter Records</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading text-gray-100">Services</div>

        <!-- Schedule-->
        <li class="nav-item">
          <a class="nav-link" href="settlementsched.html">
            <i class="fas fa-calendar-alt text-gray-100"></i>
            <span>Settlement Schedules</span></a
          >
        </li>

        <!-- Certificate -->
        <li class="nav-item">
          <a class="nav-link" href="certificateIssuance.php">
            <i class="fas fa-stamp text-gray-100"></i>
            <span>Certificate of Issuance</span></a
          >
        </li>

         <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading text-gray-100">Settings</div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="accounts.php">
            <i class="fas fa-user-cog text-gray-100"></i>
            <span>Accounts</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="barangayconfig.php">
            <i class="fas fa-cogs text-gray-100"></i>
            <span>Barangay Config</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        
      
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="
              navbar navbar-expand navbar-light
              bg-white
              topbar
              mb-4
              static-top
              shadow
            "
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>
  <ul class="nav flex-column">
               <a class="navbar-brand" href="dash.php">
      <img src="img/Barangay.png" alt="" width="60" height="60">
    </a>
</ul>
            <!-- Topbar Search -->
             <ul class="nav flex-column">
  <li class="nav-item">
    <h1 class="h3 mb-0 text-gray-800">Barangay Tibay</h1>
  </li>
  <li class="nav-item">
    <h1 class="h6 mb-0 text-gray-800">Republic of the Philippines</h1>
  </li>
 
</ul>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
         
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="
                    dropdown-menu dropdown-menu-right
                    p-3
                    shadow
                    animated--grow-in
                  "
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Ivana Alawi</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="
                    dropdown-menu dropdown-menu-right
                    shadow
                    animated--grow-in
                  "
                  aria-labelledby="userDropdown"
                >
                  
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Content here -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Update Resident</h1>    
        </div>
          <!-- content here -->

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p>Please edit the input values and submit to update the employee record.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <div class="form-group">
                                <label>Family Name</label>
                                <input type="text" name = "lname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name ="fname"class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name ="midname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alias</label>
                                <input type="text" name = "alias"class="form-control" required>
                            </div>	
                            <div class="form-group">
                                            <label>Facemarks</label>
                                            <input type="text" name = "facemarks"class="form-control" required>
                                        </div>	
                            <div class="form-group">
                                <label>Sex</label>
                                <select class ="form-select" name="sex" id="gender" required>
                                    <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>	
                            <div class="form-group">
                                            <label>Religion</label>
                                            <input type="text" name = "religion"class="form-control" required>
                            </div>
                            <div class="form-group">
                                            <label>Nationality</label>
                                            <input type="text" name = "nationality"class="form-control" required>
                            </div>		
                            <div class="form-group">
                                            <label>Occupation</label>
                                            <input type="text" name = "occupation"class="form-control" required>
                            </div>
                            <div class="form-group">
                                            <label>Spouse Name</label>
                                            <input type="text" name = "spouse"class="form-control" required>
                            </div>
                            <div class="form-group">
                                            <label>Spouse Occupation</label>
                                            <input type="text" name = "spouseocc"class="form-control" required>
                                        </div>			
                            <div class="form-group">
                                <label>Voter Status</label>
                                <select class ="form-select" name="voter" id="gender" required>
                                        <option value="Yes" >Yes</option>
                                        <option value="No" >No</option>
                                </select>
                            </div>	
                            <div class="form-group">
                                            <label>Civil Status</label>
                                <select class ="form-select" name="civil" id="gender" required>
                                        <option value="Single" >Single</option>
                                        <option value="Married" >Married</option>
                                        <option value="Widow">Widow</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <select name="month"class="form-select" id="select-month" required>
                                        <option value="" disabled selected>Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                        
                                    </select>    
                            </div>
                            <div class="form-group">
                                <select name ="day"class="form-select" id="select-day" required> 
                                  option value="" disabled selected>Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>    
                            </div>
                            <div class="form-group">
                                <select name ="year"class="form-select" id="select-year" required>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label>Birthplace</label>
                                <input type="text" name = "birthplace"class="form-control" required>
                            </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>        
                </div>
            </div>
          

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2021</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
