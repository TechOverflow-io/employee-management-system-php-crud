<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php
include_once 'include/head.php';
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
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <!-- <li class="breadcrumb-item active">Update Ingridients</li> -->
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


                            <!-- Content Goes Here -->

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
    if ($add_brand) {
    ?>
        <Script>
            $(document).ready(function() {
                $('.toast').toast('show');
            });
        </Script>
    <?php
    }
    ?>
    </script>
</body>

</html>