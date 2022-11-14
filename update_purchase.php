<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Purchase</title>
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
                <h1>Update Purchase</h1>
        </div>
    </div>
    <?php
        //get id
        $car_id=$_GET['car_id'];

        //sql query
        $sql="SELECT * FROM purchases_table WHERE car_id=$car_id";

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

                        $cust_id=$rows['cust_id'];
                        $type_pay=$rows['type_pay'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/purchase.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">   
    <?php
                $br="SELECT * FROM customers_table";
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Customer ID</label><br>
                <select name="cust_id"  required>
                    <option><?php echo $cust_id;?></option>
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
        <p>Enter the type of payment :</p>
        <input type="text" name="type" id="button" value="<?php echo $type_pay;?>" /><br><br>
        
        <input type="hidden" name="car_id" value="<?php echo $car_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Purchase">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $car_id=$_POST['car_id'];
                $cust_id=$_POST['cust_id'];
                $type_pay=$_POST['type'];

                //set the values
                $sql="UPDATE purchases_table SET
                cust_id ='$cust_id',
                type_pay ='$type_pay'
                WHERE car_id='$car_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Purchase Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/purchase.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Purchase Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/purchase.php');

                }

        }
    ?>

    </body>
</html>
