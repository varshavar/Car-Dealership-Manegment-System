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
                    <li><a href="../admin/car_reg.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>Car registeration details</h1>

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
                        if(isset($_POST['search']))
                        {
                            $car_id=$_POST['id'];
                            $sql3="SELECT * FROM reg_table WHERE car_id='$car_id' ";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);

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
                                else
                                {
                                    $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                    header('location:http://localhost/DBMS/admin/car_reg.php');
                                }
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>