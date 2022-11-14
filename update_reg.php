<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Car Registration details</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/car_reg.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Update Car Registration Details</h1>
        </div>
    </div>
    <?php
        //get id
        $car_id=$_GET['car_id'];

        //sql query
        $sql="SELECT * FROM reg_table WHERE car_id=$car_id";

        //execute
        $res = mysqli_query($conn,$sql);

        //check whether query is executed or not
        if($res==TRUE){
                //check whether data availabe or not
                $count=mysqli_num_rows($res);

                if($count==1){
                        //get details
                        //echo 'available';
                        $rows=mysqli_fetch_assoc($res);

                        $reg_id=$rows['reg_id'];
                        $reg_state=$rows['reg_state'];
                        $reg_rto=$rows['reg_rto'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/car_reg.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">    
        <p>Enter the reg_id :</p>
        <input type="text" name="reg_id" id="button" value="<?php echo $reg_id;?>" />
        <p>Enter the registered State :</p>
        <input type="text" name="reg_state" id="button" value="<?php echo $reg_state;?>" />
        <p>Enter the registered rto location :</p>
        <input type="text" name="reg_rto" id="button" value="<?php echo $reg_rto;?>" /><br><br>
        
        <input type="hidden" name="car_id" value="<?php echo $car_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Reg Details">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $car_id=$_POST['car_id'];
                $reg_id=$_POST['reg_id'];
                $reg_state=$_POST['reg_state'];
                $reg_rto=$_POST['reg_rto'];

                //set the values
                $sql="UPDATE reg_table SET
                reg_id ='$reg_id',
                reg_state ='$reg_state',
                reg_rto ='$reg_rto'
                WHERE car_id='$car_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Car Registration Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/car_reg.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Car Registration Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/car_reg.php');

                }

        }
    ?>

    </body>
</html>
