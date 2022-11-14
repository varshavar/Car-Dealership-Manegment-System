<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Add Employee</title>
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
                <h1>Add Customer-loan details</h1>
        </div>
    </div>

    <form class="add text-center" align=center action="" method="POST"> 
    <?php
                $br="SELECT * FROM purchases_table WHERE type_pay='loan'";
                $run = mysqli_query($conn,$br);

                if(mysqli_num_rows($run)>0)
                {
            ?>
                <label>Enter Customer ID</label><br>
                <select name="cust_id" required>
                    <option>--Select--</option>
                    <?php
                        foreach($run as $row)
                        {
                    ?>
                    <option value="<?php echo $row['cust_id'];?>"> <?php echo $row['cust_id']; ?></option>
                    <?php
                        }
                    ?>
                </select><br><br>     
                <?php
                }
                else
                {
                    echo "no loan taken";
                }
        ?>      
        <p>Enter the bank_name :</p>
        <input type="text" name="bank_name" id="button" placeholder="Bank Name" />
        <p>Enter the Bank acc no. :</p>
        <input type="text" name="accno" id="button" placeholder="Account number" />
        <p>Enter the Amount loaned:</p>
        <input type="number" name="amt" id="button" placeholder="amount" />
        <p>Enter the EMI period:</p>
        <input type="number" name="period" id="button" placeholder="no. of months" />
        <p>Enter the EMI per month :</p>
        <input type="number" name="emi" id="button" placeholder="EMI/month" /><br><br>
        <input type="Submit" name="submit" value="Add Loan">
    </form>

    <?php
        //process value from form and save in database
        //check if submit button is clicked
        if(isset($_POST['submit']))
        {
            //button clicked
            //echo "button clicked";
            $cust_id=$_POST['cust_id'];
            $bank_name=$_POST['bank_name'];
            $bank_acc=$_POST['accno'];
            $amt=$_POST['amt'];
            $emi_period=$_POST['period'];
            $emi=$_POST['emi'];

            //sql query to save data into database
            $sql="INSERT INTO loan_table SET
            cust_id ='$cust_id',
            bank_name ='$bank_name',
            acc_no ='$bank_acc',
            amount ='$amt',
            emi_period ='$emi_period',
            emi ='$emi'
            ";

            $res = mysqli_query($conn,$sql) or die (mysqli_error($conn));

            //check whether inserted or nor and display appropriate messege
            if($res==TRUE){
                //data inserted
                //echo "inserted";
                $_SESSION['add']="<div class='success'>Loan Details added succesfully</div>";
                header('location:http://localhost/DBMS/admin/loan.php');
            }
            else{
                //failed to inserted
                //echo "failed to insert";
                $_SESSION['add']="<div class='fail'>Failed to add</div>";
                header('location:http://localhost/DBMS/admin/loan.php');
            }
        }
    ?>

    </body>
</html>