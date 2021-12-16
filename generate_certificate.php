<?php


if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT NAME,BIRTHPLACE,CIVILSTAT,NATIONALITY FROM residents WHERE ID = :id";
    
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
                $civil = $row["CIVILSTAT"];
                $nationality = $row["NATIONALITY"];

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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Tables</title>


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/residentinfo.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body>
    <body id="page-top">
        <div class="wrapper">
            <div class="main-panel">
                <div class="content">
                    <div class="panel-header bg-primary-gradient">
                        <div class="page-inner">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                <div>
                                    <h2 class="text-white fw-bold">Generate Certificate</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-inner">
                        <div class="row mt--2">
                            <div class="col-md-12">

                                <?php if (isset($_SESSION['message'])) : ?>
                                    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                        <?php echo $_SESSION['message']; ?>
                                    </div>
                                    <?php unset($_SESSION['message']); ?>
                                <?php endif ?>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title">Barangay Certificate</div>
                                            <div class="card-tools">
                                                <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                                                    <i class="fa fa-print"></i>
                                                    Print Certificate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body m-5" id="printThis">
                                        <div class="d-flex flex-wrap justify-content-center" style="border-bottom:1px solid red">
                                            <div class="text-center">
                                                <h3 class="mb-0">Republic of the Philippines</h3>
                                                <h3 class="mb-0">Province of San Jose </h3>
                                                <h3 class="mb-0"></h3>
                                                <h1 class="fw-bold mb-0"></i></h2>
                                                    <p><i>Mobile No. 09234612111 </i></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <div class="text-center p-3" style="border:2px dotted red">
                                                    <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="200" />
                                                    <?php if (!empty($officials)) : ?>
                                                        <?php foreach ($officials as $row) : ?>
                                                            <h3 class="mt-3 fw-bold mb-0 text-uppercase"><?= ucwords($row['name']) ?></h3>
                                                            <h5 class="mb-2 text-uppercase"><?= ucwords($row['position']) ?></h5>
                                                        <?php endforeach ?>
                                                    <?php endif ?>

                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="text-center">
                                                    <h2 class="mt-4 fw-bold">Barangay Tibay</h2>
                                                </div>
                                                <div class="text-center">
                                                    <h1 class="mt-4 fw-bold mb-5">BARANGAY CLEARANCE</h1>
                                                </div>
                                                <h2 class="mt-3" style="text-indent: 40px;">This is to certify <?php echo $name?><span class="fw-bold" style="font-size:25px"></span>, of legal age,<?php echo $civil?>, <?php echo $nationality?> Citizen whose
                                                    <span class="fw-bold" style="font-size:25px"></span> specimen signature appears below is a <b>PERMANENT RESIDENT</b> of this Barangay Tibay, Muntinlupa, Metro Mnila.
                                                </h2>
                                                <h2>
                                                    Based on records of this office, he/she has been residing at Barangay Tibay, Muntinlupa, Metro Manila.
                                                </h2>
                                                <h2 class="mt-3" style="text-indent: 40px;">This certification/clearance is hereby issued to the above-named person for whatever legal purpose it may serve him/her best.</h2>
                                                <h2 class="mt-5">Given this <span class="fw-bold" style="font-size:25px"><?= date('m/d/Y') ?>.</span></h2>
                                                <h2 class="text-uppercase" style="margin-top:180px;">NOT VALID WITHOUT SEAL:</h2>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="p-3 text-right mr-3">

                                                    <p class="mr-3">PUNONG BARANGAY</p>
                                                </div>
                                                <div class="p-3 text-left">
                                                    <h2 class="fw-bold mb-0 text-uppercase"><?= empty($sec['name']) ? 'Please Create Official with Secretary Position' : ucwords($sec['name']) ?></h2>
                                                    <p class="ml-2">BARANGAY SECRETARY</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex flex-wrap justify-content-end">
                                                <div class="p-3 text-center">
                                                    <div class="border mb-3" style="height:150px;width:290px">
                                                        <p class="mt-5 mb-0 pt-5">Right Thumb Mark</p>
                                                    </div>
                                                    <h2 class="fw-bold mb-0"><?= (isset($_POST['fname'], $_POST['midname'], $_POST['lname'], $_POST['alias'], $_POST['sex'], $_POST['month'], $_POST['day'], $_POST['year'], $_POST['civil'], $_POST['voter'])) ?></h2>
                                                    <p>Tax Payer's Signature</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Footer -->
                <?php include 'templates/main-footer.php' ?>
                <!-- End Main Footer -->
                <?php if (!isset($_GET['closeModal'])) { ?>

                    <script>
                        setTimeout(function() {
                            openModal();
                        }, 1000);
                    </script>
                <?php } ?>
            </div>

        </div>
        <?php include 'templates/footer.php' ?>
        <script>
            function openModal() {
                $('#pment').modal('show');
            }

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>

    </body>

</html>