<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Branch</title>
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
                <h1>Add Branch</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST"> 
        <p>Enter the Location :</p>
        <input type="text" name="loc" id="button" placeholder="Location" />
        <p>Enter the Branch phone number :</p>
        <input type="phone" name="ph" id="button" placeholder="Emp-ID" />
        <p>Enter your Branch email-id :</p>
        <input type="email" name="branch_email" id="button" placeholder="Email-ID" /><br><br>
        <input type="Submit" name="submit" value="Add Branch">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $branch_loc=$_POST['loc'];
            $branch_ph=$_POST['ph'];
            $branch_email=$_POST['branch_email'];

            //sql query to save data into database
            $sql="INSERT INTO branch_table SET
            b_loc ='$branch_loc',
            b_phno ='$branch_ph',
            b_email ='$branch_email'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Branch added succesfully</div>";
                header('location:http://localhost/DBMS/admin/branch.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/branch.php');
            }


        }
    ?>

    </body>
</html>