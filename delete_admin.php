<?php include('../config/constants.php') ?>
<?php

    //get id to be deleted
    $slno=$_GET['slno'];

    //sql query
    $sql="DELETE FROM admin_table WHERE slno=$slno";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        header('location:http://localhost/DBMS/admin/adminpage.php');
    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='fail'>Admin deletion failed.Try again later</div>";
        header('location:http://localhost/DBMS/admin/adminpage.php');
    }

?>