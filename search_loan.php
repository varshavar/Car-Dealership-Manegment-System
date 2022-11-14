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
                    <li><a href="../admin/loan.php">Back</a></li>
                </ul>
        </div>
        <div class="main search">
            <div class="wrapper">
                <h1>Details of loans :</h1>

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
                        if(isset($_POST['search']))
                        {
                            $cust_id=$_POST['id'];
                            $sql3="SELECT * FROM loan_table WHERE cust_id='$cust_id' ";
                            $res = mysqli_query($conn,$sql3);
                            if($res==TRUE){
                                //check whether data availabe or not
                                $count=mysqli_num_rows($res);
                
                                if($count==1){
                                        //get details
                                        //echo 'available';
                                        $rows=mysqli_fetch_assoc($res);
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
                                else
                                {
                                    $_SESSION['search']="<div class='fail'>ID is not present</div>";
                                    header('location:http://localhost/DBMS/admin/loan.php');
                                }
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>