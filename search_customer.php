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
                    <li><a href="../admin/customer.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1 style='color:white'>Customer Details</h1>

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
                        <th>Customer-ID</th>
                        <th>Customer-Name</th>
                        <th>Customer-Gender</th>
                        <th>Customer-Occupation</th>
                        <th>Customer-Address</th>
                        <th>Drving license no.</th>
                        <th>Phone number</th>
                        <th>Email-ID</th>
                        <th>Assited-emp-ID</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        if(isset($_POST['search']))
                        {
                            $cust_id=$_POST['id'];
                            $sql3="SELECT * FROM customers_table WHERE cust_id='$cust_id' ";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);

                                        $id=$rows['cust_id'];
                                        $name=$rows['cust_name'];
                                        $gender=$rows['cust_gender'];
                                        $occ=$rows['cust_occ'];
                                        $address=$rows['cust_address'];
                                        $dlno=$rows['dl_no'];
                                        $phno=$rows['ph_no'];
                                        $email=$rows['email_id'];
                                        $emp=$rows['assisted_emp'];

                                        ?>
                                        <tr class="output">
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php echo $occ; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $dlno; ?></td>
                                            <td><?php echo $phno; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $emp; ?></td>
                                            <td>
                                                <a href="../add/update_customer.php?cust_id=<?php echo $id;?>" class="btn-primary">Update</a>
                                                <a href="../add/delete_customer.php?cust_id=<?php echo $id;?>" class="btn-secondary">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                }
                                else
                                {
                                    $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                    header('location:http://localhost/DBMS/admin/customer.php');
                                }
                            }
                        }
                    ?>


                </table>
            </div>
        </div>
    </body>
</html>