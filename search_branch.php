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
                    <li><a href="../admin/branch.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>Branches of the Car Database</h1>

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
                    if(isset($_SESSION["search"]))
                    {
                        echo $_SESSION["search"];
                        unset($_SESSION['search']);
                    }
                ?>

                <table class="tb-full">
                    <tr>
                        <th>Branch-ID</th>
                        <th>Branch-location</th>
                        <th>Branch-phno</th>
                        <th>Branch-email</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        if(isset($_POST['search']))
                        {
                            $b_id=$_POST['id'];
                            $sql3="SELECT * FROM branch_table WHERE b_id='$b_id' ";
                            $res = mysqli_query($conn,$sql3);

                            if($res==TRUE)
                            {
                                //count rows
                                $count=mysqli_num_rows($res);
                                //fucn to get rows
                                if($count==1)
                                {
                                    $rows=mysqli_fetch_assoc($res);
                                        
                                    //getting data
                                    $branch_id=$rows['b_id'];
                                    $branch_loc=$rows['b_loc'];
                                    $branch_phno=$rows['b_phno'];
                                    $branch_email=$rows['b_email'];

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $branch_id; ?></td>
                                        <td><?php echo $branch_loc; ?></td>
                                        <td><?php echo $branch_phno; ?></td>
                                        <td><?php echo $branch_email; ?></td>
                                        <td>
                                            <a href="../add/update_branch.php?branch_id=<?php echo $branch_id;?>" class="btn-primary">Update</a>
                                            <a href="../add/delete_branch.php?b_id=<?php echo $branch_id;?>" class="btn-secondary">Delete</a>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    }
                                    else
                                    {
                                        $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                        header('location:http://localhost/DBMS/admin/branch.php');
                                    }
                                }
                            }
                    ?>
                </table>

            </div>
        </div>

    </body>
</html>