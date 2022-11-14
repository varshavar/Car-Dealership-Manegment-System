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
                    <li><a href="../add/add_purchase.php" style="font-size:18px">Add Purchase</a></li>
                    <li>
                            <form action="../add/search_purchase.php" method="POST">
                                <p style="font-size:15px;color:tomato">Enter the Car id :</p>
                                <input type="number" name="id" id="button" placeholder="car id" />
                                <input type="Submit" name="search" value="Search" class="btn-primary">
                            </form>
                    </li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">The car purchased details</h1>
 
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
                        <th>Customer-ID</th>
                        <th>Car-ID</th>
                        <th>Type-of-payment</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * from purchases_table";

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
                                    $cust_id=$rows['cust_id'];
                                    $car_id=$rows['car_id'];
                                    $pay=$rows['type_pay'];
                            

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $cust_id; ?></td>
                                        <td><?php echo $car_id; ?></td>
                                        <td><?php echo $pay; ?></td>
                                        <?php $url = "car_id=car_id&cust_id=cust_id";?>
                                        <td>
                                            <a href="../add/update_purchase.php?car_id=<?php echo $car_id;?>" class="btn-primary">Update</a>
                                            <a href="../add/delete_purchase.php?car_id=<?php echo $car_id;?>" class="btn-secondary">Delete</a>
                                            <a href="../add/details.php?car_id=<?php echo $car_id;?>&cust_id=<?php echo $cust_id;?>&pay=<?php echo $pay;?>" class="btn-third">Details</a>
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