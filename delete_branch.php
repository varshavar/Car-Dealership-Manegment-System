<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $branch_id=$_GET['b_id'];

    //sql query
    $sql="DELETE FROM branch_table WHERE b_id=$branch_id";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Branch Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/branch.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>Branch deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/branch.php');
    }

?>