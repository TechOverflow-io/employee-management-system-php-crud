<?php
//including the database connection file
include("database.php");

//getting id of the data from url
$emp_id = $_GET['emp_id'];

//deleting the row from table
$query = "DELETE FROM employee_details WHERE emp_id=$emp_id";
$result = mysqli_query($conn, $query);

//redirecting to the display page (index.php in our case)
header("Location:details_employee.php");
