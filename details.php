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
        <div class="main">
            <div class="wrapper">
                <h1>Sales details</h1>

                    <?php
                        $car_id=$_GET['car_id'];
                        $cust_id=$_GET['cust_id'];
                        $type_pay=$_GET['pay'];
                        $sql="SELECT * from purchases_table p,customers_table c,car_table cr
                              WHERE cr.car_id=$car_id AND c.cust_id=$cust_id";

                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            //count rows
                            $count=mysqli_num_rows($res);
                            //fucn to get rows
                            if($count>0)
                            {
                                if($rows=mysqli_fetch_assoc($res)){
                                    
                                    //getting data
                                    //$cust_id=$rows['cust_id'];
                                    //$car_id=$rows['car_id'];
                                    //$pay=$rows['type_pay'];
                                    $cust_name=$rows['cust_name'];
                                    $cust_phno=$rows['ph_no'];
                                    $car_name=$rows['car_name'];
                                    $year=$rows['year'];
                                    $car_price=$rows['car_price'];
                            

                                    ?>
                                    <form class="bg text-center" style="color:white" align=center > 
                                        <p><b>Customer ID :<?php echo $cust_id; ?><p><br>
                                        <p>Customer Name :<?php echo $cust_name; ?><p><br>
                                        <p>Customer Phone Number :<?php echo $cust_phno; ?><p><br>
                                        <p>Car ID :<?php echo $car_id; ?></p><br>
                                        <p>Car Name :<?php echo $car_name; ?><p><br>
                                        <p>Car Year of Manufacture :<?php echo $year; ?><p><br>
                                        <p>Car Price :<?php echo $car_price; ?><p><br>
                                        <p>Type of Payment :<?php echo $type_pay; ?></p><br>
                                    </form>
                                
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