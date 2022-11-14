<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $car_id=$_GET['car_id'];

    //sql query
    $sql="DELETE FROM purchases_table WHERE car_id=$car_id";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Purchase details Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/purchase.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>Purchase details deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/purchase.php');
    }

?>