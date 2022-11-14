<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Customer</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/customer.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Update Customer</h1>
        </div>
    </div>
    <?php
        //get id
        $cust_id=$_GET['cust_id'];

        //sql query
        $sql="SELECT * FROM customers_table WHERE cust_id=$cust_id";

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

                        $cust_name=$rows['cust_name'];
                        $cust_gender=$rows['cust_gender'];
                        $cust_occ=$rows['cust_occ'];
                        $cust_address=$rows['cust_address'];
                        $ph_no=$rows['ph_no'];
                        $dl_no=$rows['dl_no'];
                        $email_id=$rows['email_id'];
                        $assisted_emp=$rows['assisted_emp'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/customer.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">    
        <p>Enter the customer name :</p>
        <input type="text" name="cust_name" id="button" value="<?php echo $cust_name;?>" />
        <p>Gender :</p>
        <input type="text" name="gender" id="button" value="<?php echo $cust_gender;?>" />
        <p>Enter the Occupation :</p>
        <input type="text" name="cust_occ" id="button" value="<?php echo $cust_occ;?>" />
        <p>Enter the customer-address:</p>
        <input type="text" name="cust_address" id="button" value="<?php echo $cust_address;?>" />
        <p>Enter the phone number :</p>
        <input type="phone" name="ph_no" id="button" value="<?php echo $ph_no;?>" />
        <p>Enter the driving-license number :</p>
        <input type="text" name="dl_no" id="button" value="<?php echo $dl_no;?>" />
        <p>Enter your email-id :</p>
        <input type="email" name="email_id" id="button"  value="<?php echo $email_id;?>"/><br>
        <?php
                $br="SELECT * FROM employee_table"; 
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Assisted Employee ID</label><br>
                <select name="emp_id" required>
                    <option><?php echo $assisted_emp;?></option>
                    <?php
                        foreach($run as $row)
                        {
                    ?>
                    <option value="<?php echo $row['emp_id'];?>"> <?php echo $row['emp_id']; ?></option>
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
        ?><br>
        
        <input type="hidden" name="cust_id" value="<?php echo $cust_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Customer">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $cust_id=$_POST['cust_id'];
                $cust_name=$_POST['cust_name']; 
                $cust_gender=$_POST['gender'];
                $cust_occ=$_POST['cust_occ'];
                $cust_address=$_POST['cust_address'];
                $ph_no=$_POST['ph_no'];
                $dl_no=$_POST['dl_no'];
                $email_id=$_POST['email_id'];
                $assisted_emp=$_POST['emp_id'];

                //set the values
                $sql="UPDATE customers_table SET
                cust_name ='$cust_name',
                cust_gender ='$cust_gender',
                cust_occ ='$cust_occ',
                cust_address ='$cust_address',
                ph_no ='$ph_no',
                dl_no ='$dl_no',
                email_id ='$email_id',
                assisted_emp ='$assisted_emp'
                WHERE cust_id='$cust_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Customer Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/customer.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Customer Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/customer.php');

                }

        }
    ?>

    </body>
</html>
