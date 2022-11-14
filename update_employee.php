<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Employee</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/employee.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Update Employee</h1>
        </div>
    </div>
    <?php
        //get id
        $emp_id=$_GET['emp_id'];

        //sql query
        $sql="SELECT * FROM employee_table WHERE emp_id=$emp_id";

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

                        $emp_name=$rows['emp_name'];
                        $emp_dob=$rows['emp_dob'];
                        $emp_gender=$rows['emp_gender'];
                        $emp_salary=$rows['emp_salary'];
                        $emp_address=$rows['emp_address'];
                        $emp_phno=$rows['emp_phno'];
                        $emp_email=$rows['emp_email'];
                        $emp_branchid=$rows['emp_branchid'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/employee.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">    
        <p>Enter the name :</p>
        <input type="text" name="emp_name" id="button" value="<?php echo $emp_name;?>" />
        <p>Enter the Date of Birth :</p>
        <input type="date" name="emp_dob" id="button"  value="<?php echo $emp_dob;?>"/> 
        <p>Gender :</p>
        <input type="text" name="gender" id="button" value="<?php echo $emp_gender;?>" />
        <p>Enter the salary :</p>
        <input type="number" name="emp_salary" id="button" value="<?php echo $emp_salary;?>" />
        <p>Enter the employee-address:</p>
        <input type="text" name="emp_address" id="button" value="<?php echo $emp_address;?>" />
        <p>Enter the phone number :</p>
        <input type="phone" name="emp_ph" id="button" value="<?php echo $emp_phno;?>" />
        <p>Enter your email-id :</p>
        <input type="email" name="emp_email" id="button"  value="<?php echo $emp_email;?>"/><br>
        <?php
            $br="SELECT * FROM branch_table";
            $run = mysqli_query($conn,$br);

            if(mysqli_num_rows($run)>0)
            {
        ?>
            <label>Enter Branch ID</label><br>
            <select name="emp_branch" required>
                <option><?php echo $emp_branchid; ?></option>
                <?php
                    foreach($run as $row)
                    {
                ?>
                <option value="<?php echo $row['b_id'];?>"> <?php echo $row['b_id']; ?></option>
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
        
        <input type="hidden" name="emp_id" value="<?php echo $emp_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Employee">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $emp_id=$_POST['emp_id'];
                $emp_name=$_POST['emp_name'];
                $emp_dob=$_POST['emp_dob'];
                $emp_gender=$_POST['gender'];
                $emp_salary=$_POST['emp_salary'];
                $emp_address=$_POST['emp_address'];
                $emp_phone=$_POST['emp_ph'];
                $emp_email=$_POST['emp_email'];
                $emp_branch=$_POST['emp_branch'];

                //set the values
                $sql="UPDATE employee_table SET
                emp_name ='$emp_name',
                emp_dob ='$emp_dob',
                emp_gender ='$emp_gender',
                emp_salary ='$emp_salary',
                emp_address ='$emp_address',
                emp_phno ='$emp_phone',
                emp_email ='$emp_email',
                emp_branchid ='$emp_branch'
                WHERE emp_id='$emp_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Employee Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/employee.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Employee Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/employee.php');

                }

        }
    ?>

    </body>
</html>


