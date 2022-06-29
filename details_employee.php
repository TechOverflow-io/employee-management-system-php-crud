<?php

include_once("database.php");

$get_employees = "SELECT * FROM employee_details ORDER BY emp_id DESC";
$get_employees_run = mysqli_query($conn, $get_employees);


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
                            <!-- <h1 class="m-0">Ingridients</h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Employess</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Employee</h3>
                    <a href="add_employee.php" class="btn float-right btn-primary">Add New Employee</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>First Name </th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Email </th>
                                <th>ID Card </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($get_employees_run) > 0) {
                                while ($row = mysqli_fetch_assoc($get_employees_run)) { ?>
                                    <tr>
                                        <td class="align-middle"><img class="profile-user-img img-fluid img-square" src="<?php echo $row['profilepic']; ?>" alt="User profile picture" style="width:90px; height:auto"> </td>
                                        <td class="align-middle"><?php echo $row['firstName']; ?></td>
                                        <td class="align-middle"><?php echo $row['lastName']; ?></td>
                                        <td class="align-middle"><?php echo $row['gender']; ?></td>
                                        <td class="align-middle"><?php echo $row['mobilePhone']; ?></td>
                                        <td class="align-middle"><?php echo $row['email']; ?></td>
                                        <td class="align-middle"><?php echo $row['idCard']; ?></td>

                                        <td class="text-right align-middle">
                                            <a class="btn btn-success btn-sm" href="profile.php?emp_id=<?php echo $row["emp_id"]; ?>"><i class="fas fa-eye"> </i></a>
                                            <a class="btn btn-info btn-sm" href="update_employee.php?emp_id=<?php echo $row["emp_id"]; ?>"><i class="fas fa-pencil-alt"> </i></a>
                                            <a class="btn btn-danger btn-sm" href="delete_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php  }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Profile Picture</th>
                                <th>First Name </th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Email </th>
                                <th>ID Card </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
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