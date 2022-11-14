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
                    <li><a href="../add/add_branch.php" style="font-size:18px">Add Branch</a></li>
                    <li>
                            <form action="../add/search_branch.php" method="POST">
                                <p style="font-size:15px;color:tomato">Enter the Branch id :</p>
                                <input type="number" name="id" id="button" placeholder="branch id" />
                                <input type="Submit" name="search" value="Search" class="btn-primary">
                            </form>
                    </li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">Branches of the Car Database</h1>

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
                        $sql="SELECT * from branch_table";

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