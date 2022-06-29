<?php
$emp_id =  $_GET["emp_id"];

include_once("database.php");

$insert_result = false;


if (isset($_FILES['pic']['name'])) {
    $fileName  = $_FILES['pic']['name'];
}

// Fetching Data From Database
$query = "SELECT * FROM  `employee_details` WHERE emp_id = '$emp_id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);



// Inserting into Database for Updation
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    // Gettig All Veriables 
    $firstName                = $_POST["firstName"];
    $lastName                 = $_POST["lastName"];
    $gender                   = $_POST["gender"];
    $dob                      = $_POST["dob"];
    $height                   = $_POST["height"];
    $bloodGroup               = $_POST["bloodGroup"];
    $email                    = $_POST["email"];
    $mobilePhone              = $_POST["mobilePhone"];
    $weight                   = $_POST["weight"];
    $idCard                   = $_POST["idCard"];
    $education                = $_POST["education"];
    $major                    = $_POST["major"];
    $radd                     = $_POST["radd"];
    $raddPostalCode           = $_POST["raddPostalCode"];
    $padd                     = $_POST["padd"];
    $paddPostalCode           = $_POST["paddPostalCode"];
    // $profilepic               = $_POST["pic"];
    $referenceName            = $_POST["referenceName"];
    $referenceRelationship    = $_POST["referenceRelationship"];
    $companyOrPosition        = $_POST["companyOrPosition"];
    $refrencephone            = $_POST["refrencephone"];
    $emergencyName            = $_POST["emergencyName"];
    $emergencyrelationship    = $_POST["emergencyrelationship"];
    $emergencyContact         = $_POST["emergencyContact"];

    $tempPath  =  $_FILES['pic']['tmp_name'];
    $fileSize  =  $_FILES['pic']['size'];

    if (empty($fileName)) {
        $errorMSG =  "please select image";
        echo $errorMSG;
    } else {
        $upload_path = 'upload/'; // set upload folder path 

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array(
            'jpeg', 'jpg', 'png', 'gif'
        );

        // allow valid image file formats
        if (in_array($fileExt, $valid_extensions)) {
            //check file not exist our upload folder path
            if (!file_exists($upload_path . $fileName)) {
                // check file size '5MB'
                if ($fileSize < 5000000) {
                    move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
                } else {
                    $errorMSG =  "Sorry, your file is too large, please upload 5 MB size";
                    echo $errorMSG;
                }
            } else {
                $errorMSG =  "Sorry, file already exists check upload folder";
                echo $errorMSG;
            }
        } else {
            $errorMSG =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            echo $errorMSG;
        }
    }

    // if no error caused, continue ....
    if (!isset($errorMSG)) {
        $profilepic = $upload_path . "" . $fileName;

        // $insert_query = "INSERT INTO `employee_details` (`firstName`, `lastName`, `gender`, `dob`, `height`, `bloodGroup`, `email`, `mobilePhone`, `weight`, `idCard`, `education`, `major`, `radd`, `raddPostalCode`, `padd`, `paddPostalCode`, `profilepic`, `referenceName`, `referenceRelationship`, `companyOrPosition`, `refrencephone`, `emergencyName`, `emergencyrelationship`, `emergencyContact`) VALUES ('$firstName', '$lastName', '$gender', '$dob', '$height', '$bloodGroup', '$email', '$mobilePhone', '$weight', '$idCard', '$education', '$major', '$radd', '$raddPostalCode', '$padd', '$paddPostalCode', '$profilepic', '$referenceName', '$referenceRelationship', '$companyOrPosition', '$refrencephone', '$emergencyName', '$emergencyrelationship', '$emergencyContact');";
        $update_querr = "UPDATE `employee_details` SET `firstName`= '$firstName', `lastName`= '$lastName', `gender`= '$gender', `dob`= '$dob', `height`= '$height', `bloodGroup`= '$bloodGroup', `email`= '$email', `mobilePhone`= '$mobilePhone', `weight`= '$weight', `idCard`= '$idCard', `education`= '$education', `major`= '$major', `radd`= '$radd', `raddPostalCode`= '$raddPostalCode', `padd`= '$padd', `paddPostalCode`= '$paddPostalCode', `profilepic`= '$profilepic', `referenceName`= '$referenceName', `referenceRelationship`= '$referenceRelationship', `companyOrPosition`= '$companyOrPosition', `refrencephone`= '$refrencephone', `emergencyName`= '$emergencyName', `emergencyrelationship`= '$emergencyrelationship', `emergencyContact`= '$emergencyContact' WHERE `employee_details`.`emp_id` = $emp_id";
        $result = mysqli_query($conn, $update_querr);
        if ($result) {
            $insert_result = true;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php
include_once 'include/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php
        // include_once 'include/preloader.php'
        ?>

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
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="2000" style="position: absolute;z-index: 2; right: 5%;">
                        <div class="toast-body bg-success py-4">
                            Employee Updated successfully
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Update Employees</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Update Employees </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">


                                        <h5 class="text-center"> <strong>Feilds with ( <span style="color:red; font-size: 25px;"> * </span> ) Are Compulsory </strong></h5> <br>

                                        <div class="col col-md-12 mx-auto">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Profile Picture Upload</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="form-group row">


                                                        <div class="col-md-10 float-left p-5">
                                                            <label for="pic">Profile Picture <span style="color:red;"> * </span></label>
                                                            <input type="file" class="form-control pb-5" id="pic" name="pic" value="<?php echo $row['profilepic']; ?>" placeholder="<?php echo $row['profilepic']; ?>" onchange="previewFile(this);">
                                                        </div>

                                                        <div class="v col-md-2 border border-dark float-right" style="max-width: 165px; height: 202px;">
                                                            <img id="previewImg" src="<?php echo $row['profilepic']; ?>" alt="your image" style="width: 150px; height: 200px;" />
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <div class="col col-md-12 mx-auto">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Personal Data & Contacts</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">




                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="firstName">First Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['firstName']; ?>" placeholder="Enter First Name" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="lastName">Last Name</label>
                                                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['lastName']; ?>" placeholder="Enter Last Name">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="gender">Gender<span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required>
                                                                <option value="sel">Slect Gender</option>
                                                                <option value="Male" <?php if ($row['gender'] == "Male") echo 'selected="selected"'; ?>>Male</option>
                                                                <option value="Female" <?php if ($row['gender'] == "Female") echo 'selected="selected"'; ?>>Female</option>
                                                                <option value="Other" <?php if ($row['gender'] == "Other") echo 'selected="selected"'; ?>>Other</option>

                                                            </select>
                                                            <!-- <span class="error" style="color:red;">
                                                                <?php //echo $type_err; 
                                                                ?></span> -->
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="dob">Date of Birth <span style="color:red;"> * </span></label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>" placeholder="Date of Birth" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="height">Height</label>
                                                            <input type="text" class="form-control" onkeypress="return /[0-9]/i.test(event.key)" id="height" name="height" value="<?php echo $row['height']; ?>" placeholder="Enter your height in cm">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="bloodGroup">Blood Type <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="bloodGroup" name="bloodGroup" value="<?php echo $row['bloodGroup']; ?>" required>
                                                                <option value="chooseBG">Choose Blood Group</option>
                                                                <option value="A+" <?php if ($row['bloodGroup'] == "A+") echo 'selected="selected"'; ?>>A+</option>
                                                                <option value="A-" <?php if ($row['bloodGroup'] == "A-") echo 'selected="selected"'; ?>>A-</option>
                                                                <option value="B+" <?php if ($row['bloodGroup'] == "B+") echo 'selected="selected"'; ?>>B+</option>
                                                                <option value="B-" <?php if ($row['bloodGroup'] == "B-") echo 'selected="selected"'; ?>>B-</option>
                                                                <option value="O-" <?php if ($row['bloodGroup'] == "O-") echo 'selected="selected"'; ?>>O-</option>
                                                                <option value="O+" <?php if ($row['bloodGroup'] == "O+") echo 'selected="selected"'; ?>>O+</option>
                                                                <option value="AB+" <?php if ($row['bloodGroup'] == "AB+") echo 'selected="selected"'; ?>>AB+</option>
                                                                <option value="AB-" <?php if ($row['bloodGroup'] == "AB-") echo 'selected="selected"'; ?>>AB-</option>
                                                            </select>
                                                            <!-- <span class="error" style="color:red;">
                                                                <?php //echo $type_err; 
                                                                ?></span> -->
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="email">Email <span style="color:red;"> * </span></label>
                                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mobilePhone">Moile Phone <span style="color:red;"> * </span></label>
                                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="mobilePhone" name="mobilePhone" value="<?php echo $row['mobilePhone']; ?>" placeholder="Enter Mobile Phone" required>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="weight">Weight</label>
                                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" placeholder="Enter Weight">

                                                        </div>

                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="idCard">ID Card <span style="color:red;"> * </span></label>
                                                            <input type="number" class="form-control" id="idCard" name="idCard" value="<?php echo $row['idCard']; ?>" placeholder="Enter ID Card" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="education">Education <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="education" name="education" value="<?php echo $row['education']; ?>" required>
                                                                <option value="chooseEd">Choose Education</option>
                                                                <option value="Matric" <?php if ($row['education'] == "Matric") echo 'selected="selected"'; ?>>Matric</option>
                                                                <option value="Intermediate" <?php if ($row['education'] == "Intermediate") echo 'selected="selected"'; ?>>Intermediate</option>
                                                                <option value="Graduate" <?php if ($row['education'] == "Graduate") echo 'selected="selected"'; ?>>Graduate</option>
                                                                <option value="Masters" <?php if ($row['education'] == "Masters") echo 'selected="selected"'; ?>>Masters</option>
                                                                <option value="PHD" <?php if ($row['education'] == "PHD") echo 'selected="selected"'; ?>>PHD</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="major">Major <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="major" name="major" value="<?php echo $row['major']; ?>" required>
                                                                <option value="chooseM">Choose Major</option>
                                                                <option value="Software Engineering" <?php if ($row['major'] == "Software Engineering") echo 'selected="selected"'; ?>>Software Engineering</option>
                                                                <option value="Civil Engineering" <?php if ($row['major'] == "Civil Engineering") echo 'selected="selected"'; ?>>Civil Engineering</option>
                                                                <option value="Electrical Engineering" <?php if ($row['major'] == "Electrical Engineering") echo 'selected="selected"'; ?>>Electrical Engineering</option>
                                                                <option value="Mechinical Engineering" <?php if ($row['major'] == "Mechinical Engineering") echo 'selected="selected"'; ?>>Mechinical Engineering</option>
                                                                <option value="Computer Scinces" <?php if ($row['major'] == "Computer Scinces") echo 'selected="selected"'; ?>>Computer Scinces</option>
                                                                <option value="City and Regional Planing" <?php if ($row['major'] == "City and Regional Planing") echo 'selected="selected"'; ?>>City and Regional Planing</option>
                                                                <option value="Other">Other</option>

                                                            </select>
                                                            <!-- <span class="error" style="color:red;">
                                                                <?php //echo $type_err; 
                                                                ?></span> -->
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <label for="radd">Residence
                                                                Address <span style="color:red;"> * </span></label>
                                                            <textarea class="form-control" id="radd" rows="3" name="radd" required><?php echo $row['radd']; ?></textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="raddPostalCode">Postal Code</label>
                                                            <input type="number" class="form-control" id="raddPostalCode" name="raddPostalCode" value="<?php echo $row['raddPostalCode']; ?>" placeholder="Postal code ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <label for="padd">Present
                                                                Address <span style="color:red;"> * </span></label>
                                                            <textarea class="form-control" id="padd" rows="3" name="padd" required><?php echo $row['padd']; ?></textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="paddPostalCode">Present Address</label>
                                                            <input type="number" class="form-control" id="paddPostalCode" name="paddPostalCode" value="<?php echo $row['paddPostalCode']; ?>" placeholder="Postal code">
                                                        </div>
                                                    </div>






                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>



                                        <div class="col col-md-12 mx-auto">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Refrence Family Member </h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="referenceName">Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="referenceName" name="referenceName" value="<?php echo $row['referenceName']; ?>" placeholder="Enter Reference Contact Name">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="referenceRelationship">Relationship <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="referenceRelationship" name="referenceRelationship" value="<?php echo $row['referenceRelationship']; ?>" placeholder="Enter Reference Contact's Relationship">
                                                        </div>

                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="companyOrPosition">Working Company/Position</label>
                                                            <input type="text" class="form-control" id="companyOrPosition" name="companyOrPosition" value="<?php echo $row['companyOrPosition']; ?>" placeholder="Enter Working Company Name or Position">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="refrencephone">Phone Number <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="refrencephone" name="refrencephone" value="<?php echo $row['refrencephone']; ?>" placeholder="Enter Reference Contact's phone Number">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>



                                        <div class="col col-md-12 mx-auto">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Emergency Contact</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="emergencyName">Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyName" name="emergencyName" value="<?php echo $row['emergencyName']; ?>" placeholder="Enter Emergency Contact Name">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="emergencyrelationship">Relationship <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyrelationship" name="emergencyrelationship" value="<?php echo $row['emergencyrelationship']; ?>" placeholder="Enter Emergency Contact's Relationship">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="emergencyContact">Phone Number <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyContact" name="emergencyContact" value="<?php echo $row['emergencyContact']; ?>" placeholder="Enter Emergency Contact's Phone No.">

                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                                            <button type="submit" class="btn bg-danger mt-5 col-3 mx-auto" name="submit">Update Employee</button>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
            </section>




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
    <?php
    if ($insert_result) {
    ?>
        <!-- <Script>
            $(document).ready(function() {
                $('.toast').toast('show');
            });
        </Script> -->
        <script>
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Employee Has been Updated Successfuly',
                showConfirmButton: false,
                timer: 2200
            })
        </script>
    <?php
    }
    ?>
    </script>
    < /body>

        < /html>