<?php

include 'database.php';



?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="upload/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .95">
        <span class="brand-text font-weight-light">Shazaib Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="./index.php" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="./details_employee.php" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Employee Details
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./add_employee.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Employee
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./details_employee.php" class="nav-link">
                        <i class="nav-icon fas fa-trash-alt"></i>
                        <p>
                            Delete Employee
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./details_employee.php" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Update Employee
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>