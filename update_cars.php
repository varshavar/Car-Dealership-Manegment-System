<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Car Details</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/cars.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Update Car Details</h1>
        </div>
    </div>
    <?php
        //get id
        $car_id=$_GET['car_id'];

        //sql query
        $sql="SELECT * FROM car_table WHERE car_id=$car_id";

        //execute
        $res = mysqli_query($conn,$sql);

        //check whether query is executed or not
        if($res==TRUE){
                //check whether data availabe or not
                $count=mysqli_num_rows($res);

                if($count==1){
                        //get details
                        //echo 'available';
                        $rows=mysqli_fetch_assoc($res);

                        $car_name=$rows['car_name'];
                        $car_manufacturer=$rows['car_manufacturer'];
                        $year=$rows['year'];
                        $no_of_seats=$rows['no_of_seats'];
                        $fuel=$rows['fuel'];
                        $car_price=$rows['car_price'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/cars.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">    
        <p>Enter the Car name :</p>
        <input type="text" name="car_name" id="button" value="<?php echo $car_name;?>" />
        <p>Enter the Car Manufacturer :</p>
        <input type="text" name="car_manufacturer" id="button"  value="<?php echo $car_manufacturer;?>"/> 
        <p>Enter the Year of manufacture :</p>
        <input type="text" name="year" id="button" value="<?php echo $year;?>" />
        <p>Enter the Number of seats :</p>
        <input type="text" name="no_of_seats" id="button" value="<?php echo $no_of_seats;?>" />
        <p>Enter the fuel :</p>
        <input type="text" name="fuel" id="button" value="<?php echo $fuel;?>" />
        <p>Enter the Price of the car :</p>
        <input type="number" name="car_price" id="button" value="<?php echo $car_price;?>" /><br><br>
        
        <input type="hidden" name="car_id" value="<?php echo $car_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Car Details">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $car_id=$_POST['car_id'];
                $car_name=$_POST['car_name'];
                $car_manufacturer=$_POST['car_manufacturer'];
                $year=$_POST['year'];
                $no_of_seats=$_POST['no_of_seats'];
                $fuel=$_POST['fuel'];
                $car_price=$_POST['car_price'];

                //set the values
                $sql="UPDATE car_table SET
                car_name ='$car_name',
                car_manufacturer ='$car_manufacturer',
                year ='$year',
                no_of_seats ='$no_of_seats',
                fuel ='$fuel',
                car_price ='$car_price'
                WHERE car_id='$car_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Car Details Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/cars.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Car Details Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/cars.php');

                }

        }
    ?>

    </body>
</html>
