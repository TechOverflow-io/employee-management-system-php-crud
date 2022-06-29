<?php

include_once("database.php");

$insert_result = false;

if (isset($_FILES['pic']['name'])) {
    $fileName  = $_FILES['pic']['name'];
}


// $query = "SELECT * FROM `employee_details` WHERE id = ( SELECT max(id) FROM `employee_details` )";



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
    $referenceName            = $_POST["referenceName"];
    $referenceRelationship    = $_POST["referenceRelationship"];
    $companyOrPosition        = $_POST["companyOrPosition"];
    $refrencephone            = $_POST["refrencephone"];
    $emergencyName            = $_POST["emergencyName"];
    $emergencyrelationship    = $_POST["emergencyrelationship"];
    $emergencyContact         = $_POST["emergencyContact"];
    // $profilepic               = $_POST["pic"];

    // $profilepic = "";
    // Uploading Profile Picture
    // $profilepic               = $_POST["profilepic"];
    // echo "Shazaib Sarwar <br>";

    // echo $fileName;
    // die();
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

        //  Inserting All Records is Database
        $insert_query = "INSERT INTO `employee_details` (`firstName`, `lastName`, `gender`, `dob`, `height`, `bloodGroup`, `email`, `mobilePhone`, `weight`, `idCard`, `education`, `major`, `radd`, `raddPostalCode`, `padd`, `paddPostalCode`, `profilepic`, `referenceName`, `referenceRelationship`, `companyOrPosition`, `refrencephone`, `emergencyName`, `emergencyrelationship`, `emergencyContact`) VALUES ('$firstName', '$lastName', '$gender', '$dob', '$height', '$bloodGroup', '$email', '$mobilePhone', '$weight', '$idCard', '$education', '$major', '$radd', '$raddPostalCode', '$padd', '$paddPostalCode', '$profilepic', '$referenceName', '$referenceRelationship', '$companyOrPosition', '$refrencephone', '$emergencyName', '$emergencyrelationship', '$emergencyContact');";
        $result = mysqli_query($conn, $insert_query);
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
                            Employee added successfully
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Employees</li>
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
                                    <h3 class="card-title">Add Employees </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="add_employee.php" method="post" enctype="multipart/form-data">
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
                                                            <input type="file" class="form-control pb-5" id="pic" name="pic" value="<?php //echo $emergencyContact;  
                                                                                                                                    ?>" placeholder="Choose Profile Picture" onchange="previewFile(this);">
                                                        </div>

                                                        <div class="v col-md-2 border border-dark float-right" style="max-width: 165px; height: 202px;">
                                                            <img id="previewImg" src="upload/avatar.png" alt="your image" style="width: 150px; height: 200px;" />
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <div class=" col col-md-12 mx-auto ">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Personal Data & Contacts</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">




                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="firstName">First Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php //echo $firstName; 
                                                                                                                                            ?>" placeholder="Enter First Name" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="lastName">Last Name</label>
                                                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php //echo $lastName; 
                                                                                                                                            ?>" placeholder="Enter Last Name">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="gender">Gender<span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="gender" name="gender" value="<?php // echo $gender; 
                                                                                                                            ?>" required>
                                                                <option value="sel">Slect Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>

                                                            </select>
                                                            <!-- <span class="error" style="color:red;">
                                                                <?php //echo $type_err; 
                                                                ?></span> -->
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="dob">Date of Birth <span style="color:red;"> * </span></label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?php // echo $dob; 
                                                                                                                                ?>" placeholder="Date of Birth" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="height">Height</label>
                                                            <input type="text" class="form-control" onkeypress="return /[0-9]/i.test(event.key)" id="height" name="height" value="<?php //echo $height; 
                                                                                                                                                                                    ?>" placeholder="Enter your height in cm">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="bloodGroup">Blood Type <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="bloodGroup" name="bloodGroup" value="<?php // echo $bloodGroup; 
                                                                                                                                    ?>" required>
                                                                <option value="chooseBG">Choose Blood Group</option>
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="O-">O-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                            </select>
                                                            <!-- <span class="error" style="color:red;">
                                                                <?php //echo $type_err; 
                                                                ?></span> -->
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="email">Email <span style="color:red;"> * </span></label>
                                                            <input type="email" class="form-control" id="email" name="email" value="<?php //echo $email; 
                                                                                                                                    ?>" placeholder="Enter Email" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mobilePhone">Moile Phone <span style="color:red;"> * </span></label>
                                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="mobilePhone" name="mobilePhone" value="<?php //echo $mobilePhone; 
                                                                                                                                                                                            ?>" placeholder="Enter Mobile Phone" required>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="weight">Weight</label>
                                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="weight" name="weight" value="<?php // echo $weight; 
                                                                                                                                                                                    ?>" placeholder="Enter Weight">

                                                        </div>

                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="idCard">ID Card <span style="color:red;"> * </span></label>
                                                            <input type="number" class="form-control" id="idCard" name="idCard" value="<?php //echo $idCard; 
                                                                                                                                        ?>" placeholder="Enter ID Card" required>
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="education">Education <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="education" name="education" value="<?php // echo $education; 
                                                                                                                                ?>" required>
                                                                <option value="chooseE">Choose Education</option>
                                                                <option value="Matric">Matric</option>
                                                                <option value="Intermediate">Intermediate</option>
                                                                <option value="Graduate">Graduate</option>
                                                                <option value="Masters">Masters</option>
                                                                <option value="PHD">PHD</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="major">Major <span style="color:red;"> * </span></label>
                                                            <select class="form-control" id="major" name="major" value="<?php // echo $major; 
                                                                                                                        ?>" required>
                                                                <option value="chooseM">Choose Major</option>
                                                                <option value="Arts">Arts</option>
                                                                <option value="Science">Science</option>
                                                                <option value="Software Engineering">Software Engineering</option>
                                                                <option value="Civil Engineering">Civil Engineering</option>
                                                                <option value="Electrical Engineering">Electrical Engineering</option>
                                                                <option value="Mechinical Engineering">Mechinical Engineering</option>
                                                                <option value="Computer Scinces">Computer Scinces</option>
                                                                <option value="City and Regional Planing">City and Regional Planing</option>
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
                                                            <textarea class="form-control" id="radd" rows="3" name="radd" required></textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="raddPostalCode">Postal Code</label>
                                                            <input type="number" class="form-control" id="raddPostalCode" name="raddPostalCode" value="" placeholder="Postal code ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <label for="padd">Present
                                                                Address <span style="color:red;"> * </span></label>
                                                            <textarea class="form-control" id="padd" rows="3" name="padd" required></textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="paddPostalCode">Present Address</label>
                                                            <input type="number" class="form-control" id="paddPostalCode" name="paddPostalCode" value="" placeholder="Postal code">
                                                        </div>
                                                    </div>


                                                    <!-- <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="profilepic">Profile Pic <span style="color:red;"> * </span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required>
                                                                    <label class="custom-file-label" for="profilepic"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->


                                                    <!-- <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Profile
                                                                    Picture</label>
                                                                <input class="form-control" type="file" id="formFile">
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <!-- <div class="form-group">
                                                        <label for="profilepic">File input</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="profilepic" name="profilepic">
                                                                <label class="custom-file-label" for="profilepic">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div> -->




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
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="referenceName">Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="referenceName" name="referenceName" value="<?php //echo $emergencyName; 
                                                                                                                                                    ?>" placeholder="Enter Reference Contact Name">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="referenceRelationship">Relationship <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="referenceRelationship" name="referenceRelationship" value="<?php //echo $emergencyContact; 
                                                                                                                                                                    ?>" placeholder="Enter Reference Contact's Relationship">
                                                        </div>

                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label for="companyOrPosition">Working Company/Position</label>
                                                            <input type="text" class="form-control" id="companyOrPosition" name="companyOrPosition" value="<?php //echo $emergencyName; 
                                                                                                                                                            ?>" placeholder="Enter Working Company Name or Position">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="refrencephone">Phone Number <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="refrencephone" name="refrencephone" value="<?php //echo $refphone; 
                                                                                                                                                    ?>" placeholder="Enter Reference Contact's phone Number">
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
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="emergencyName">Name <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyName" name="emergencyName" value="<?php //echo $emergencyName; 
                                                                                                                                                    ?>" placeholder="Enter Emergency Contact Name">
                                                            <!-- <span class="error" style="color:red;">
                                                               // <?php // echo $ingridiant_err; 
                                                                    ?></span> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="emergencyrelationship">Relationship <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyrelationship" name="emergencyrelationship" value="<?php //echo $emergencyContact; 
                                                                                                                                                                    ?>" placeholder="Enter Emergency Contact's Relationship">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="emergencyContact">Phone Number <span style="color:red;"> * </span></label>
                                                            <input type="text" class="form-control" id="emergencyContact" name="emergencyContact" value="<?php //echo $emergencyContact; 
                                                                                                                                                            ?>" placeholder="Enter Emergency Contact's Phone No.">

                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>


                                        <div class="d-grid gap-1 d-md-flex justify-content-center">
                                            <button type="submit" class="btn bg-danger mt-5 col-3 mx-auto" name="submit">Add Employee</button>
                                            <button type="reset" id="reset" class="btn bg-danger mt-5 col-2 mx-auto">Clear</button>
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
                title: 'Employee Has been Aded Successfuly',
                showConfirmButton: false,
                timer: 2200
            })



            function imagePreview(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var fileReader = new FileReader();
                    fileReader.onload = function(event) {
                        $('#preview').html('<img src="' + event.target.result + '" width="300" height="auto"/>');
                    };
                    fileReader.readAsDataURL(fileInput.files[0]);
                }
            }

            $("#image").change(function() {
                imagePreview(this);
            });
        </script>

    <?php
    }
    ?>
    </script>
</body>

</html>