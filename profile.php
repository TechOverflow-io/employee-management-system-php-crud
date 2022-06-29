<?php
$emp_id =  $_GET["emp_id"];

include_once("database.php");

$query = "SELECT * FROM  `employee_details` WHERE emp_id = '$emp_id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// $fetch_product = $row['product_name'];

$firstName = $row['firstName'];
$lastName = $row['lastName'];
$gender = $row['gender'];
$dob = $row['dob'];
$height = $row['height'];
$bloodGroup = $row['bloodGroup'];
$email = $row['email'];
$mobilePhone = $row['mobilePhone'];
$weight = $row['weight'];
$idCard = $row['idCard'];
$education = $row['education'];
$major = $row['major'];
$radd = $row['radd'];
$raddPostalCode = $row['raddPostalCode'];
$padd = $row['padd'];
$paddPostalCode = $row['paddPostalCode'];
$profilepic = $row['profilepic'];
$referenceName = $row['referenceName'];
$referenceRelationship = $row['referenceRelationship'];
$companyOrPosition = $row['companyOrPosition'];
$refrencephone = $row['refrencephone'];
$emergencyName = $row['emergencyName'];
$emergencyrelationship = $row['emergencyrelationship'];
$emergencyContact = $row['emergencyContact'];





?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php
include_once 'include/head.php'
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- Navbar -->
        <?php
        include_once 'include/navbar.php'
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once 'include/sidebar.php'
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">View Profile Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">View Profile Details</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->




            <div class="">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body mt-5 mb-5">


                        <!-- Profile Image -->
                        <div class="card card-success card-outline col col-md-6 mx-auto">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo $row['profilepic']; ?>" alt="User profile picture" style="width:300px; height:auto">
                                </div>

                                <h3 class="profile-username text-center mt-3"><strong> <?php echo $firstName . " " . $lastName ?></strong> </h3>

                                <p class="text-muted text-center"><?php echo $email ?></p>


                                <h4 class="mt-2 mb-2 text-success"><strong> Personal Information</strong></h4>

                                <ul class="list-group list-group-bordered mb-3">
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right"><?php echo $gender ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of Birth</b> <a class="float-right"><?php echo $dob ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Blood Group</b> <a class="float-right"><?php echo $bloodGroup ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile Number #</b> <a class="float-right"><?php echo $mobilePhone ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Weight </b> <a class="float-right"><?php echo $weight ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Height </b> <a class="float-right"><?php echo $height ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Education </b> <a class="float-right"><?php echo $education . " in " . $major ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Residential Address </b> <a class="float-right"><?php echo $radd ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Residential Postal Code </b> <a class="float-right"><?php echo $raddPostalCode ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Permanent Address </b> <a class="float-right"><?php echo $padd ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Permanent Postal Code </b> <a class="float-right"><?php echo $paddPostalCode ?></a>
                                    </li>
                                </ul>


                                <h4 class="mt-2 mb-2 text-success"><strong> Reference Person Information </strong></h4>

                                <!-- Reference Contact -->
                                <ul class="list-group list-group-bordered mb-3">
                                    <li class="list-group-item">
                                        <b>Referece Person Name</b> <a class="float-right"><?php echo $referenceName ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Referece Person Contact Number</b> <a class="float-right"><?php echo $refrencephone ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Referece Person Relationship</b> <a class="float-right"><?php echo $referenceRelationship ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Referece Designation or Company</b> <a class="float-right"><?php echo $companyOrPosition ?></a>
                                    </li>
                                </ul>


                                <h4 class="mt-2 mb-2 text-success"><strong> Emergency Person Information</strong></h4>

                                <!-- Emergency Contact -->
                                <ul class="list-group list-group-bordered mb-3">
                                    <li class="list-group-item">
                                        <b>Emergency Person Name</b> <a class="float-right"><?php echo $emergencyName ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Emergency Person Contact Number</b> <a class="float-right"><?php echo $emergencyContact ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Emergency Person Relationship</b> <a class="float-right"><?php echo $emergencyrelationship ?></a>
                                    </li>
                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <?php
        include_once 'include/footer.php'
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php
    include_once 'include/ex-links-includes.php'
    ?>
</body>

</html>