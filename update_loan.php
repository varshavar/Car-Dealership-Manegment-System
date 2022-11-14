<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Update Loan Details</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    <div class="menu text-center">
                <ul>
                    <li><a href="../admin/loan.php">Back</a></li>
                </ul>
    </div>
    <div class="menu">
        <div class="wrapper">
                <h1>Update Loan Details</h1>
        </div>
    </div>
    <?php
        //get id
        $cust_id=$_GET['cust_id'];

        //sql query
        $sql="SELECT * FROM loan_table WHERE cust_id=$cust_id";

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

                        $bank_name=$rows['bank_name'];
                        $acc_no=$rows['acc_no'];
                        $amount=$rows['amount'];
                        $emi_period=$rows['emi_period'];
                        $emi=$rows['emi'];
                }
                else{
                        //redirect
                        header('location:http://localhost/DBMS/admin/loan.php');
                }
        }


    ?>

    <form class=" update text-center" align=center action="" method="POST">    
        <p>Enter the Bank name :</p>
        <input type="text" name="bank_name" id="button" value="<?php echo $bank_name;?>" />
        <p>Enter the Bank account number :</p>
        <input type="text" name="acc_no" id="button" value="<?php echo $acc_no;?>" />
        <p>Enter the Amount Loaned :</p>
        <input type="number" name="amount" id="button" value="<?php echo $amount;?>" />
        <p>Enter the emi period :</p>
        <input type="number" name="emi_period" id="button" value="<?php echo $emi_period;?>" />
        <p>Enter the emi:</p>
        <input type="number" name="emi" id="button" value="<?php echo $emi;?>" /><br><br>
        
        <input type="hidden" name="cust_id" value="<?php echo $cust_id;?>"/> 
        <input type="Submit" name="submit" class="btn-primary" value="Update Loan Details">
    </form>

    <?php

        //check whether update button is clicked
        if(isset($_POST['submit']))
        {
                //echo "button clicked";
                $cust_id=$_POST['cust_id'];
                $bank_name=$_POST['bank_name'];
                $acc_no=$_POST['acc_no'];
                $amount=$_POST['amount'];
                $emi_period=$_POST['emi_period'];
                $emi=$_POST['emi'];

                //set the values
                $sql="UPDATE loan_table SET
                bank_name ='$bank_name',
                acc_no ='$acc_no',
                amount ='$amount',
                emi_period ='$emi_period'
                WHERE cust_id='$cust_id'
                ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                        $_SESSION['update']="<div class='success'>Loan Details Updated Successfully</div>";
                        header('location:http://localhost/DBMS/admin/loan.php');     
                }
                else
                {
                        $_SESSION['update']="<div class='fail'>Loan Details Updation Failed</div>";
                        header('location:http://localhost/DBMS/admin/loan.php');

                }

        }
    ?>

    </body>
</html>
