<?php 

require_once "config.php";

$fname = $midname = $lname = $alias = $gender = $birthdate = $civilstatus = $voterstatus = "" ;

if (isset($_POST['fname'],$_POST['midname'],$_POST['lname'],$_POST['alias'],$_POST['sex'],$_POST['month'],$_POST['day'],$_POST['year'],$_POST['civil'],$_POST['voter']))
{

  $fname = $_POST['fname'];
  $midname = $_POST['midname'];
  $lname = $_POST['lname'];
  $alias = $_POST['alias'];
  $facemarks = $_POST['facemarks'];
  $sex = $_POST['sex'];
  $month= $_POST['month'];
  $day = $_POST['day'];
  $year = $_POST['year'];
  $birthdate = $year.$month.$day;
  $civilstatus = $_POST['civil'];
  $voterstatus = $_POST['voter'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];
  $occupation = $_POST['occupation'];
  $spouse_name = $_POST['spouse'];
  $spouse_occ = $_POST['spouseocc'];
  $birthdate = date('Y-m-d', strtotime(str_replace('-', '/', $birthdate)));


  //SQL STATEMENT

  $sql = "INSERT INTO residents (FAMNAME,FIRSTNAME,MIDNAME,ALIAS,FACEMARKS,BIRTHDATE,SEX,CIVILSTAT,NATIONALITY,RELIGION,OCCUPATION,SPOUSENAME,SPOUSEOCC,VOTERSTAT) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$lname,$fname,$midname,$alias,$facemarks,$birthdate,$sex,$civilstatus,$nationality,$religion,$occupation,$spouse_name,$spouse_occ,$voterstatus]);
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
          href="dash.html"
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
          <a class="nav-link" href="dash.html">
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
          <a class="nav-link" href="residentinfo.html">
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
          <a class="nav-link" href="certificateIssuance.html">
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
          <a class="nav-link" href="accounts.html">
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
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
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
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-4">
						<h2>Resident <b>Record</b></h2>
					</div> 
          <div class="col-sm-4">
                            
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
					<div class="col-sm-4">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Resident</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Action</th>
						<th>ResidentID</th>
						<th>FirstName</th>
						<th>MiddleName</th>
            <th>LastName</th>
						<th>Alias</th>
            <th>Facemarks</th>
						<th>Birthdate</th>
            <th>Sex</th>
						<th>CivilStatus</th>
            <th>Nationality</th>
            <th>Religion</th>
            <th>Occupation</th>
            <th>Spouse Name</th>
            <th>Spouse Occupation</th>
						<th>VoterStatus</th>
          
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
            <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
            <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
						</td>
            <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
						</td>
            <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>					
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
            <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
					</tr> 
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
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
			<form>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
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
