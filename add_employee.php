<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Employee</title>
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
                <h1>Add Employee</h1>
        </div>
    </div>

    
            
    <form class="add text-center" align=center action="" method="POST">    
        <p>Enter the name :</p>
        <input type="text" name="emp_name" id="button" placeholder="Full Name" required/>
        <p>Enter the Date of Birth :</p>
        <input type="date" name="emp_dob" id="button" placeholder="Date of birth" /> 
        <p>Gender :</p>
        <input type="text" name="gender" id="button" placeholder="gender" required/>
        <p>Enter the salary :</p>
        <input type="number" name="emp_salary" id="button" placeholder="Salary" />
        <p>Enter the employee-address:</p>
        <input type="text" name="emp_address" id="button" placeholder="Emp-Adress" />
        <p>Enter the phone number :</p>
        <input type="number" name="emp_ph" id="button" placeholder="phone" />
        <p>Enter your email-id :</p>
        <input type="email" name="emp_email" id="button" placeholder="Email-ID" /><br>
        <?php
            $br="SELECT * FROM branch_table";
            $run = mysqli_query($conn,$br);

            if(mysqli_num_rows($run)>0)
            {
        ?>
            <label>Enter Branch ID</label><br>
            <select name="emp_branch" required>
                <option>--Select--</option>
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
        <input type="Submit" name="submit" value="Add Employee">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $emp_name=$_POST['emp_name'];
            $emp_dob=$_POST['emp_dob'];
            $emp_gender=$_POST['gender'];
            $emp_salary=$_POST['emp_salary'];
            $emp_address=$_POST['emp_address'];
            $emp_phone=$_POST['emp_ph'];
            $emp_email=$_POST['emp_email'];
            $emp_branch=$_POST['emp_branch'];

            //sql query to save data into database
            $sql="INSERT INTO employee_table SET
            emp_name ='$emp_name',
            emp_dob ='$emp_dob',
            emp_gender ='$emp_gender',
            emp_salary ='$emp_salary',
            emp_address ='$emp_address', 
            emp_phno ='$emp_phone',
            emp_email ='$emp_email',
            emp_branchid ='$emp_branch'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));
 
            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Employee added succesfully</div>";
                header('location:http://localhost/DBMS/admin/employee.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/employee.php');
            }

        }
    ?>

    </body>
</html>