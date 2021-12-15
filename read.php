<?php

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: rename_index.php");
}

include 'configvr2.php';
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT NAME,ALIAS,FACEMARKS,BIRTHDATE,SEX,CIVILSTAT,NATIONALITY,RELIGION,OCCUPATION,SPOUSENAME,SPOUSEOCC,VOTERSTAT,BIRTHPLACE FROM residents WHERE ID = :id";
    
    if($stmt = $db->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $name = $row["NAME"];
                $address = $row["ALIAS"];
                $facemarks = $row["FACEMARKS"];
                $birthdte = $row["BIRTHDATE"];
                $sex = $row["SEX"];
                $civilstt = $row["CIVILSTAT"];
                $nationality = $row["NATIONALITY"];
                $religion = $row["RELIGION"];
                $occupation = $row["OCCUPATION"];
                $spousename = $row["SPOUSENAME"];
                $spouseocc = $row["SPOUSEOCC"];
                $voterstat = $row["VOTERSTAT"];
                $birthplace = $row["BIRTHPLACE"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($db);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
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
              <h1 class="h3 mb-0 text-gray-800">View Record</h1>
           </div>
          <!-- content here -->

    <div class="wrapper">
        <div>
            <div class="row justify-content-center">
            <div class="card shadow mb-4 col-sm-5 mx-5">
                
                <div class="card-body">
                    <div class="col-12">
                        <h1 class="mt-5 mb-3">View Record</h1>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label>Name</label>
                            <p><b><?php echo $row["NAME"]; ?></b></p>
</div>
                            <div class="col-sm-4">
                            <label>Alias</label>
                            <p><b><?php echo $row["ALIAS"]; ?></b></p>
                        </div>
                        <div class="col-sm-4">
                            <label>Facemarks</label>
                            <p><b><?php echo $row["FACEMARKS"]; ?></b></p>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                           <div class="col-sm-4">
                            <label>Birthdate</label>
                            <p><b><?php echo $row["BIRTHDATE"]; ?></b></p>
</div>
                             <div class="col-sm-4">
                            <label>Sex</label>
                            <p><b><?php echo $row["SEX"]; ?></b></p>
                        </div>
                         <div class="col-sm-4">
                            <label>Civil Status</label>
                            <p><b><?php echo $row["CIVILSTAT"]; ?></b></p>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label>Nationality</label>
                            <p><b><?php echo $row["NATIONALITY"]; ?></b></p>
</div>
                              <div class="col-sm-4">
                            <label>Religion</label>
                            <p><b><?php echo $row["RELIGION"]; ?></b></p>
                        </div>
                        <div class="col-sm-4">
                            <label>Occupation</label>
                            <p><b><?php echo $row["OCCUPATION"]; ?></b></p>
                        </div>
                        </div>
                      
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label>Spousename</label>
                            <p><b><?php echo $row["SPOUSENAME"]; ?></b></p>
</div>
                           <div class="col-sm-4">
                            <label>Spouse Occupation</label>
                            <p><b><?php echo $row["SPOUSEOCC"]; ?></b></p>
                        </div>
                       <div class="col-sm-4">
                            <label>Voter Status</label>
                            <p><b><?php echo $row["VOTERSTAT"]; ?></b></p>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label>BirthPlace</label>
                            <p><b><?php echo $row["BIRTHPLACE"]; ?></b></p>
                        </div>   
                    </div>
            </div>
            </div>
                
                
            </div>   
            <p><a href="residentinfo.php" class="btn btn-primary">Back</a></p>     
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

