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
                    <li><a href="../add/add_car_reg.php" style="font-size:13px">Add Car Registration</a></li>
                    <li>
                            <form action="../add/search_reg.php" method="POST">
                                <p style="font-size:15px;color:tomato">Enter the Car id :</p>
                                <input type="number" name="id" id="button" placeholder="car id" />
                                <input type="Submit" name="search" value="Search" class="btn-primary">
                            </form>
                    </li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">Car registeration details</h1>

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
                        <th>Car-model-ID</th>
                        <th>Registration-no.</th>
                        <th>Registered State</th>
                        <th>Registered RTO</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * from reg_table";

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
                                    $car_id=$rows['car_id'];
                                    $reg_id=$rows['reg_id'];
                                    $reg_state=$rows['reg_state'];
                                    $reg_rto=$rows['reg_rto'];

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $car_id; ?></td>
                                        <td><?php echo $reg_id; ?></td>
                                        <td><?php echo $reg_state; ?></td>
                                        <td><?php echo $reg_rto; ?></td>
                                        <td>
                                            <a href="../add/update_reg.php?car_id=<?php echo $car_id;?>" class="btn-primary">Update</a>
                                            <a href="../add/delete_reg.php?car_id=<?php echo $car_id;?>" class="btn-secondary">Delete</a>
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