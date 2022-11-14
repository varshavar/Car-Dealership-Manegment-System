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
                    <li><a href="../admin/cars.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>Details of the Cars available</h1>

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
                        <th>Car-Name</th>
                        <th>Car-manufacturer</th>
                        <th>Year-of-manufacture</th>
                        <th>No.-of-seats</th>
                        <th>Type-of-Fuel</th>
                        <th>Car-Price</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        if(isset($_POST['search']))
                        {
                            $car_id=$_POST['id'];
                            $sql3="SELECT * FROM car_table WHERE car_id='$car_id' ";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);
                                        $car_id=$rows['car_id'];
                                        $car_name=$rows['car_name'];
                                        $car_manuf=$rows['car_manufacturer'];
                                        $year=$rows['year'];
                                        $seats=$rows['no_of_seats'];
                                        $fuel=$rows['fuel'];
                                        $car_price=$rows['car_price'];

                                        ?>
                                        <tr class="output">
                                            <td><?php echo $car_id; ?></td>
                                            <td><?php echo $car_name; ?></td>
                                            <td><?php echo $car_manuf; ?></td>
                                            <td><?php echo $year; ?></td>
                                            <td><?php echo $seats; ?></td>
                                            <td><?php echo $fuel; ?></td>
                                            <td><?php echo $car_price; ?></td>
                                            <td>
                                                <a href="../add/update_cars.php?car_id=<?php echo $car_id;?>" class="btn-primary">Update</a>
                                                <a href="../add/delete_car.php?car_id=<?php echo $car_id;?>" class="btn-secondary">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                }
                                else
                                {
                                    $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                    header('location:http://localhost/DBMS/admin/cars.php');
                                }

                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>