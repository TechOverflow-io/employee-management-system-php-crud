<?php

include_once("database.php");

$letest10 = "SELECT * FROM employee_details ORDER BY emp_id DESC LIMIT 10";
$result_latest = mysqli_query($conn, $letest10);


$query = "SELECT * FROM employee_details";
$result = mysqli_query($conn, $query);
$result_total = mysqli_num_rows($result);

$query_male = "SELECT * FROM employee_details WHERE gender='Male'";
$result_male = mysqli_query($conn, $query_male);
$result_male_total = mysqli_num_rows($result_male);

$query_female = "SELECT * FROM employee_details WHERE  gender='Female'";
$result_female = mysqli_query($conn, $query_female);
$result_female_total = mysqli_num_rows($result_female);

$query_lahore = "SELECT * FROM employee_details";
$result_lahore = mysqli_query($conn, $query_lahore);
$result_lahore_total = mysqli_num_rows($result_lahore);

//  $get_events="SELECT * FROM events ORDER BY event_id DESC LIMIT 5";
//  $get_events_run=mysqli_query($conn,$get_events);
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
                            <h1 class="m-0">Home</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $result_total; ?></h3>
                                    <p>Total Employees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="details_employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $result_male_total; ?></h3>

                                    <p>Total Male Employees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="details_employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $result_female_total; ?></h3>

                                    <p>Total Female Employees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="details_employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $result_lahore_total; ?></h3>
                                    <p>Total Employees from Lahore</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="details_employee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <!-- /.row -->



                    <!-- /.row -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h3 class="card-title">10 Latest Joined Employess</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Profile Picture</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>ID Card</th>
                                                <th>Education</th>
                                                <th>Height</th>
                                                <th>Weight</th>
                                                <th>Blood Group</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            if (mysqli_num_rows($result_latest) > 0) {
                                                while ($row = mysqli_fetch_assoc($result_latest)) { ?>
                                                    <tr>
                                                        <td><img class="profile-user-img img-fluid img-square" src="<?php echo $row['profilepic']; ?>" alt="User profile picture" style="width:30px; height:auto"> </td>
                                                        <td><?php echo $row['firstName']; ?></td>
                                                        <td><?php echo $row['lastName']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td><?php echo $row['mobilePhone']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['idCard']; ?></td>
                                                        <td><?php echo $row['education']; ?></td>
                                                        <td><?php echo $row['height']; ?></td>
                                                        <td><?php echo $row['weight']; ?></td>
                                                        <td><?php echo $row['bloodGroup']; ?></td>
                                                    </tr>
                                            <?php  }
                                            }
                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->

                    <!-- /.row (main row) -->
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
</body>

</html>