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
                    <li><a href="../admin/employee.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>Employee Details</h1><br><br>

                <?php 
                    if(isset($_SESSION["add"]))
                    {
                        echo $_SESSION["add"];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION["delete"]))
                    {
                        echo $_SESSION["delete"];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION["update"]))
                    {
                        echo $_SESSION["update"];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION["search"]))
                    {
                        echo $_SESSION["search"];
                        unset($_SESSION['search']);
                    }
                ?>
 
                <table class="tb-full">
                    <tr>
                        <th>Employee-ID</th>
                        <th>Employee-Name</th>
                        <th>Employee-DOB</th>
                        <th>Employee-Gender</th>
                        <th>Employee-Salary</th>
                        <th>Employee-Address</th>
                        <th>Phone number</th>
                        <th>Email-ID</th>
                        <th>Branch-ID</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        if(isset($_POST['search']))
                        {
                            $emp_id=$_POST['id'];
                            $sql3="SELECT * FROM employee_table WHERE emp_id='$emp_id' ";
                            $res = mysqli_query($conn,$sql3);
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

                                        ?>

                                        <tr class="output">
                                        <td><?php echo $emp_id; ?></td>
                                        <td><?php echo $emp_name; ?></td>
                                        <td><?php echo $emp_dob; ?></td>
                                        <td><?php echo $emp_gender; ?></td>
                                        <td><?php echo $emp_salary; ?></td>
                                        <td><?php echo $emp_address; ?></td>
                                        <td><?php echo $emp_phno; ?></td>
                                        <td><?php echo $emp_email; ?></td>
                                        <td><?php echo $emp_branchid; ?></td>
                                        <td>
                                            <a href="../add/update_employee.php?emp_id=<?php echo $emp_id;?>" class="btn-primary">Update</a><br>
                                            <a href="../add/delete_employee.php?emp_id=<?php echo $emp_id;?>" class="btn-secondary">Delete</a>
                                        </td>
                                    </tr>


                                <?php
                                }
                                else{
                                    $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                    header('location:http://localhost/DBMS/admin/employee.php');
                                }
                        }
                    }


                    ?>
                </table>
            </div>
        </div>
    </body>
</html>