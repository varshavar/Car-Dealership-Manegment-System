<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $car_id=$_GET['car_id'];

    //sql query
    $sql="DELETE FROM car_table WHERE car_id=$car_id";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Car Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/cars.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>Car deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/cars.php');
    }

?>