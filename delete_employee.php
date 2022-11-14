<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $emp_id=$_GET['emp_id'];

    //sql query
    $sql="DELETE FROM employee_table WHERE emp_id=$emp_id";

    //execute
    $res=mysqli_query($conn,$sql);
 
    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Employee Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/employee.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>Employee deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/employee.php');
    }

?>