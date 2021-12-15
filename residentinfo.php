<?php 

require_once "config.php";

$fname = $midname = $lname = $alias = $gender = $birthdate = $civilstatus = $voterstatus = "" ;

if (isset($_POST['fname'],$_POST['midname'],$_POST['lname'],$_POST['alias'],$_POST['sex'],$_POST['month'],$_POST['day'],$_POST['year'],$_POST['civil'],$_POST['voter']))
{

  $fname = $_POST['fname'];
  $midname = $_POST['midname'];
  $lname = $_POST['lname'];
  $name = $lname." ".$fname." ".$midname;
  $alias = $_POST['alias'];
  $facemarks = $_POST['facemarks'];
  $sex = $_POST['sex'];
  $month= $_POST['month'];
  $day = $_POST['day'];
  $year = $_POST['year'];
  $birthdate = $year.$month.$day;
  $birthplace = $_POST['birthplace'];
  $civilstatus = $_POST['civil'];
  $voterstatus = $_POST['voter'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];
  $occupation = $_POST['occupation'];
  $spouse_name = $_POST['spouse'];
  $spouse_occ = $_POST['spouseocc'];
  $birthdate = date('Y-m-d', strtotime(str_replace('-', '/', $birthdate)));


  //SQL STATEMENT

  $sql = "INSERT INTO residents (NAME,FAMNAME,FIRSTNAME,MIDNAME,ALIAS,FACEMARKS,BIRTHDATE,BIRTHPLACE,SEX,CIVILSTAT,NATIONALITY,RELIGION,OCCUPATION,SPOUSENAME,SPOUSEOCC,VOTERSTAT) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$name,$lname,$fname,$midname,$alias,$facemarks,$birthdate,$birthplace,$sex,$civilstatus,$nationality,$religion,$occupation,$spouse_name,$spouse_occ,$voterstatus]);
  if($result){
    echo 'Successfully saved';
  }else{
    echo 'There were errors while saving the data';
  }

  


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

    <title>SB Admin 2 - Tables</title>

    
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/residentinfo.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
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
          <div class="sidebar-brand-text mx-6" style="font-size: 0.6em">
            Resident Information Management System
          </div>
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
          <a class="nav-link" href="blotterrecords.html">
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
          <a class="nav-link" href="barangayconfig.html">
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
                    >User log-out</span
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

          <!-- Begin Page Content -->
  
</head>
<body>
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Residents</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Residents Information Table</h6>
            </div>
            <div class="card-body">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Resident</span></a>
                <div class="table-responsive">
                <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM residents";
                    $confim = "Are you sure?";
                    if($result = $db->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Alias</th>";
                                        echo "<th>Birthdate</th>";
                                        echo "<th>Birthplace</th>";
                                        echo "<th>Sex</th>";
                                        echo "<th>Nationality</th>";
                                        echo "<th>Religion</th>";
                                        echo "<th>Civil Status</th>";
                                        echo "<th>Voter Status</th>";
                                        echo "<th>Occupation</th>";
                                        echo "<th>Spouse Name</th>";
                                        echo "<th>Spouse Occupation</th>";
                                        echo "<th>Action</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['NAME'] . "</td>";
                                        echo "<td>" . $row['ALIAS'] . "</td>";
                                        echo "<td>" . $row['BIRTHDATE'] . "</td>";
                                        echo "<td>" . $row['BIRTHPLACE'] . "</td>";
                                        echo "<td>" . $row['SEX'] . "</td>";
                                        echo "<td>" . $row['NATIONALITY'] . "</td>";
                                        echo "<td>" . $row['RELIGION'] . "</td>";
                                        echo "<td>" . $row['CIVILSTAT'] . "</td>";
                                        echo "<td>" . $row['VOTERSTAT'] . "</td>";
                                        echo "<td>" . $row['OCCUPATION'] . "</td>";
                                        echo "<td>" . $row['SPOUSENAME'] . "</td>";
                                        echo "<td>" . $row['SPOUSEOCC'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['ID'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['ID'] .'" onclick="return confirm(\'Are you sure to delete this Resident?\');" title="Delete Record" data-toggle="tooltip" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                    
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
				<div class="modal-header">						
					<h4 class="modal-title">Add Resident</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
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
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
            method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
    <form action = "delete.php?id='. $row['ID'] .'" method = "post">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="residentinfo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
  </body>
</html>
