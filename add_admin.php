<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Admin</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/adminpage.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Add Admin</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST">    
        <p>Enter the username :</p>
        <input type="text" name="username" id="button" placeholder="UserName" />
        <p>Enter the password:</p>
        <input type="text" name="password" id="button" placeholder="password" /><br><br>
        <input type="Submit" name="submit" value="Add Admin">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $username=$_POST['username'];
            $password=$_POST['password'];

            //sql query to save data into database
            $sql="INSERT INTO admin_table SET
            username ='$username',
            password ='$password'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error());
 
            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Admin added succesfully</div>";
                header('location:http://localhost/DBMS/admin/adminpage.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/adminpage.php');
            }

        }
    ?>

    </body>
</html>