<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Customers</title>
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
                <h1>Add Customers</h1>
        </div>
    </div>

    <form class=" add text-center" align=center action="" method="POST">       
        <p>Enter the Customer-name :</p>
        <input type="text" name="cust_name" id="button" placeholder="Customer Name" required /> 
        <p>Gender :</p>
        <input type="text" name="gender" id="button" placeholder="gender" />
        <p>Enter the occupation :</p>
        <input type="text" name="occ" id="button" placeholder="Occupation" />
        <p>Enter the Customer-address:</p>
        <input type="text" name="cust_add" id="button" placeholder="Cust-Adress" required />
        <p>Enter the phone number :</p>
        <input type="phone" name="ph_no" id="button" placeholder="phone" required/>
        <p>Enter the driving license number :</p>
        <input type="text" name="dl_no" id="button" placeholder="dl-no" />
        <p>Enter your email-id :</p>
        <input type="email" name="email" id="button" placeholder="Email-ID" /><br>
        <?php
                $br="SELECT * FROM employee_table"; 
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Assisted Employee ID</label><br>
                <select name="emp_id" required>
                    <option>--Select--</option>
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
        <input type="Submit" name="submit" value="Add Customer">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $cust_name=$_POST['cust_name'];
            $cust_gender=$_POST['gender'];
            $cust_occ=$_POST['occ'];
            $cust_address=$_POST['cust_add'];
            $dlno=$_POST['dl_no'];
            $cust_ph=$_POST['ph_no'];
            $cust_email=$_POST['email'];
            $ce_id=$_POST['emp_id'];

            //sql query to save data into database
            $sql="INSERT INTO customers_table SET
            cust_name ='$cust_name',
            cust_gender ='$cust_gender',
            cust_occ ='$cust_occ',
            cust_address ='$cust_address',
            dl_no ='$dlno',
            ph_no ='$cust_ph',
            email_id ='$cust_email',
            assisted_emp ='$ce_id'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Customer added succesfully</div>";
                header('location:http://localhost/DBMS/admin/customer.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/customer.php');
            }
        }
    ?>

    </body>
</html>