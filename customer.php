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
                    <li><a href="index.php">Back</a></li>
                    <li><a href="../add/add_customers.php" style="font-size:18px">Add Customer</a></li>
                    <li>
                            <form action="../add/search_customer.php" method="POST">
                                <p style="font-size:15px;color:tomato">Enter the Customer id :</p>
                                <input type="number" name="id" id="button" placeholder="customer id" />
                                <input type="Submit" name="search" value="Search" class="btn-primary">
                            </form>
                    </li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">Customer Details</h1>

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
                        $sql="SELECT * from customers_table";

                        $res=mysqli_query($conn,$sql);

                        if($res==TRUE)
                        {
                            //count rows
                            $count=mysqli_num_rows($res);
                            //fucn to get rows
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res)){
                                    
                                    //getting data
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
                            }
                            else
                            {

                            }
                        }
                    ?>


                </table>
            </div>
        </div>
    </body>
</html>