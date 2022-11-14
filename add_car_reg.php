<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Employee</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/car_reg.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Add Car Registration details</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST"> 
    <?php
                $br="SELECT * FROM car_table";
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Car ID</label><br>
                <select name="car_id" required>
                    <option>--Select--</option>
                    <?php
                        foreach($run as $row)
                        {
                    ?>
                    <option value="<?php echo $row['car_id'];?>"> <?php echo $row['car_id']; ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>     
                <?php
                }
                else
                {
                    echo "no data available";
                }
        ?>      
        <p>Enter the car-registration-no. :</p>
        <input type="text" name="reg_no" id="button" placeholder="Registration number" />
        <p>Enter the Registered State :</p>
        <input type="text" name="regstate" id="button" placeholder="Registered State" />
        <p>Enter the Registered RTO:</p>
        <input type="text" name="rto" id="button" placeholder="registered rto" /><br><br>
        <input type="Submit" name="submit" value="Add Reg. Details">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $car_id=$_POST['car_id'];
            $reg_no=$_POST['reg_no'];
            $regstate=$_POST['regstate'];
            $regrto=$_POST['rto'];

            //sql query to save data into database
            $sql="INSERT INTO reg_table SET
            car_id ='$car_id',
            reg_id ='$reg_no',
            reg_state ='$regstate',
            reg_rto ='$regrto'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Registration details added succesfully</div>";
                header('location:http://localhost/DBMS/admin/car_reg.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/car_reg.php');
            }
        }
    ?>

    </body>
</html>