<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Branch</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/branch.php">Back</a></li>
                </ul>
    </div>
    <div class="menu"> 
        <div class="wrapper">
                <h1>Update Branch</h1>
        </div>
    </div>
    <?php
        //get id
        $b_id=$_GET['branch_id'];

        //sql query
        $sql="SELECT * FROM branch_table WHERE b_id=$b_id";

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

                        $b_loc=$rows['b_loc'];
                        $b_phno=$rows['b_phno'];
                        $b_email=$rows['b_email'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/branch.php');
                }
        }


    ?>

    <form class="update text-center" align=center action="" method="POST">    
        <p>Enter the Branch location :</p>
        <input type="text" name="b_loc" id="button" value="<?php echo $b_loc;?>" />
        <p>Enter the phone number :</p>
        <input type="phone" name="b_phno" id="button" value="<?php echo $b_phno;?>" />
        <p>Enter your email-id :</p>
        <input type="email" name="b_email" id="button"  value="<?php echo $b_email;?>"/><br><br>
        
        <input type="hidden" name="b_id" value="<?php echo $b_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Branch">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $b_id=$_POST['b_id'];
                $b_name=$_POST['b_name'];
                $b_phone=$_POST['b_phno'];
                $b_email=$_POST['b_email'];

                //set the values
                $sql="UPDATE branch_table SET
                b_loc ='$b_loc',
                b_phno ='$b_phone',
                b_email ='$b_email'
                WHERE b_id='$b_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Branch Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/branch.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Branch Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/branch.php');

                }

        }
    ?>

    </body>
</html>