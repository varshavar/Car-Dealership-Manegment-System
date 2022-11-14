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
                    <li><a href="../admin/purchase.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>The car purchased details</h1>
 
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
                        if(isset($_POST['search']))
                        {
                            $car_id=$_POST['id'];
                            $sql3="SELECT * FROM purchases_table WHERE car_id='$car_id' ";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);
                                        
                                        //getting data
                                        $cust_id=$rows['cust_id'];
                                        $car_id=$rows['car_id'];
                                        $pay=$rows['type_pay'];
                                

                                        ?>
                                        <tr class="output">
                                            <td><?php echo $cust_id; ?></td>
                                            <td><?php echo $car_id; ?></td>
                                            <td><?php echo $pay; ?></td>
                                            <td>
                                                <a href="../add/update_purchase.php?car_id=<?php echo $car_id;?>" class="btn-primary">Update</a>
                                                <a href="../add/delete_purchase.php?car_id=<?php echo $car_id;?>" class="btn-secondary">Delete</a> 
                                                <a href="../add/details.php?car_id=<?php echo $car_id;?>&cust_id=<?php echo $cust_id;?>&pay=<?php echo $pay;?>" class="btn-third">Details</a>
                                            </td>
                                        </tr>
                                    
                                    <?php
                                    }
                                    else
                                    {
                                        $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                        header('location:http://localhost/DBMS/admin/purchase.php');
                                    }
                                }
                        }
                    ?>


                </table>
            </div>
        </div>
    </body>
</html>