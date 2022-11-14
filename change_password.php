<?php include('../config/constants.php') ?>
 <html>
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="menu text-center">
                    <ul>
                        <li><a href="../admin/adminpage.php">Back</a></li>
                    </ul>
        </div>
        <div class="menu">
            <div class="wrapper">
                    <h1>Change Password</h1>
            </div>
        </div>


        <form class="main text-center" align=center action="" method="POST">    
            <p>Enter the old password :</p>
            <input type="text" name="oldpwd" id="button" placeholder="old password" />
            <p>Enter the new password:</p>
            <input type="text" name="newpwd" id="button" placeholder="new password"/>
            <p>Enter the confirm password:</p>
            <input type="text" name="confpwd" id="button" placeholder="confirm password"/><br><br>

            <input type="hidden" name="slno" value="<?php echo $slno;?>"/> 
            <input type="Submit" name="submit" class="btn-primary" value="Change password">

        </form>

        <?php

            if(isset($_POST['submit']))
            {
                //echo "clicked";
                $slno=$_GET['slno'];
                $cur=$_POST['oldpwd'];
                $new=$_POST['newpwd'];
                $conf=$_POST['confpwd'];

                $sql="SELECT * FROM admin_table WHERE slno='$slno' AND password='$cur' ";

                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //user exist and password can be changed
                            if($new==$conf)
                            {
                                //password match
                                $sql2="UPDATE admin_table SET
                                password='$new'
                                WHERE slno=$slno";

                                $res2=mysqli_query($conn,$sql2);

                                //check whether query executed
                                if($res2==TRUE)
                                {
                                    //success
                                    $_SESSION['change']="<div class='success'>Password Changed</div>";
                                    header('location:http://localhost/DBMS/admin/adminpage.php');
                                }
                                else
                                {
                                    //error
                                    $_SESSION['change']="<div class='fail'>Password not Changed</div>";
                                    header('location:http://localhost/DBMS/admin/adminpage.php');
                                }
                            }
                            else
                            {
                                $_SESSION['pwd-not-match']="<div class='fail'>Password does not match</div>";
                                header('location:http://localhost/DBMS/admin/adminpage.php');
                            }
                    }
                    else
                    {
                        //echo "user doesnt exist";
                        $_SESSION['user-not-found']="<div class='fail'>Error.Try again</div>";
                        header('location:http://localhost/DBMS/admin/adminpage.php');                
                    }
                }
            }
        ?>
    </body>
</html>