<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Purchase Details</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/purchase.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Add Purchase Details</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST"> 
        <?php
                $br="SELECT * FROM customers_table";
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Customer ID</label><br>
                <select name="cust_id" required>
                    <option>--Select--</option>
                    <?php
                        foreach($run as $row)
                        {
                    ?>
                    <option value="<?php echo $row['cust_id'];?>"> <?php echo $row['cust_id']; ?></option>
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
        <?php
                $br="SELECT * FROM car_table";
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
            <label>Enter Car Model ID</label><br>
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
        <p>Enter the Type of Payment :</p>
        <input type="text" name="typay" id="button" placeholder="Payment method" /><br><br>
        <input type="Submit" name="submit" value="Add Purchase">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked"; 
            $cust_id=$_POST['cust_id'];
            $car_id=$_POST['car_id'];
            $payment=$_POST['typay'];

            //sql query to save data into database
            $sql="INSERT INTO purchases_table SET
            cust_id ='$cust_id',
            car_id ='$car_id',
            type_pay ='$payment'
            ";

            $res = mysqli_query($conn,$sql);

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Purchase details added succesfully</div>";
                header('location:http://localhost/DBMS/admin/purchase.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Purchase Details Failed to add</div>";
                header('location:http://localhost/DBMS/admin/purchase.php');
            }
        }
    ?>

    </body>
</html>