<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $cust_id=$_GET['cust_id'];

    //sql query
    $sql="DELETE FROM loan_table WHERE cust_id=$cust_id";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Loan details Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/loan.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>loan details deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/loan.php');
    }

?>