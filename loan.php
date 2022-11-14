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
                    <li><a href="../add/add_loan.php" style="font-size:18px">Add Loan</a></li>
                    <li>
                            <form action="../add/search_loan.php" method="POST">
                                <p style="font-size:15px;color:tomato">Enter the Cust id :</p>
                                <input type="number" name="id" id="button" placeholder="cust id" />
                                <input type="Submit" name="search" value="Search" class="btn-primary">
                            </form>
                    </li>
                </ul>
        </div>
        <div class="main display">
            <div class="wrapper">
                <h1 style="color:white">Details of loans :</h1>

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
                        <th>Bank acc. no.</th>
                        <th>Bank name</th>
                        <th>Amount Loaned</th>
                        <th>EMI tenure</th>
                        <th>EMI/month</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql="SELECT * from loan_table";

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
                                    $cust_id=$rows['cust_id'];
                                    $bank_name=$rows['bank_name'];
                                    $acc=$rows['acc_no'];
                                    $amount=$rows['amount'];
                                    $period=$rows['emi_period'];
                                    $emi=$rows['emi'];

                                    ?>
                                    <tr class="output">
                                        <td><?php echo $cust_id; ?></td>
                                        <td><?php echo $acc; ?></td>
                                        <td><?php echo $bank_name; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $period; ?></td>
                                        <td><?php echo $emi; ?></td>
                                        <td>
                                            <a href="../add/update_loan.php?cust_id=<?php echo $cust_id;?>" class="btn-primary">Update</a>
                                            <a href="../add/delete_loan.php?cust_id=<?php echo $cust_id;?>" class="btn-secondary">Delete</a>
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