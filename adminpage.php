<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>CAR DEALERSHIP MANAGEMENT</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!--menu section starts-->
        <div class="menu text-center">
                <ul>
                    <li><a href="index.php">Back</a></li>
                    <li><a href="../add/add_admin.php" style="font-size:18px">Add Admin</a></li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">Manage Admin</h1>

                <?php
                    if(isset($_SESSION["add"]))
                    {
                        echo $_SESSION["add"];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION["delete"]))
                    {
                        echo $_SESSION["delete"];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION["update"]))
                    {
                        echo $_SESSION["update"];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION["pwd-not-match"]))
                    {
                        echo $_SESSION["pwd-not-match"];
                        unset($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION["user-not-found"]))
                    {
                        echo $_SESSION["user-not-found"];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION["change"]))
                    {
                        echo $_SESSION["change"];
                        unset($_SESSION['change']);
                    }
                ?>

                <table class="tb-full">
                    <tr>
                        <th>sl no</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * from admin_table";

                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            //count rows
                            $count=mysqli_num_rows($res);
                            //fucn to get rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res)){
                                    
                                    //getting data
                                    $slno=$rows['slno'];
                                    $username=$rows['username'];
                                    $password=$rows['password'];

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $slno; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $password; ?></td>
                                        <td>
                                            <a href="../add/change_password.php?slno=<?php echo $slno;?>" class="btn-primary">Change Password</a><br>
                                            <a href="../add/delete_admin.php?slno=<?php echo $slno;?>" class="btn-secondary">Delete</a>
                                        </td>
                                    </tr>
                                
                                <?php
                                }
                            }
                            else
                            {

                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>