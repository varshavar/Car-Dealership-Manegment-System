<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Car</title>
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
                <h1>Add Cars</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST"> 
        <p>Enter the Car-name :</p>
        <input type="text" name="car_name" id="button" placeholder="Car Name" />
        <p>Enter the Manufacturer-name :</p>
        <input type="text" name="manuf_name" id="button" placeholder="manufacturer Name" />
        <p>Enter the Year-of-Manufacture:</p>
        <input type="text" name="year" id="button" placeholder="year" /> 
        <p>No. of seats :</p>
        <input type="text" name="seats" id="button" placeholder="no of seats" /> 
        <p>Types of fuels :</p>
        <input type="text" name="fuel" id="button" placeholder="fuel" /> 
        <p>Enter the Car Price :</p>
        <input type="number" name="car_price" id="button" placeholder="price" /><br><br>
        
        <input type="Submit" name="submit" value="Add Car">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $car_name=$_POST['car_name'];
            $manuf_name=$_POST['manuf_name'];
            $year=$_POST['year'];
            $seats=$_POST['seats'];
            $fuel=$_POST['fuel'];
            $car_price=$_POST['car_price'];

            //sql query to save data into database
            $sql="INSERT INTO car_table SET
            car_name ='$car_name',
            car_manufacturer ='$manuf_name',
            year ='$year',
            no_of_seats ='$seats',
            fuel ='$fuel',
            car_price ='$car_price'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Car added succesfully</div>";
                header('location:http://localhost/DBMS/admin/cars.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/cars.php');
            }
        }
    ?>

    </body>
</html>

    </body>
</html>

