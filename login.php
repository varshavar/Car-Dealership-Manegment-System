<?php include('config/constants.php') ?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
        <div class="menu text-center">
                <ul>
                    <li><a href="home.php">Back</a></li>
                </ul>
        </div>
        <header>
                <form action="" method="post">    
                    <div id="login-box">
                    <div class="one-box cc">
                    <div class="cc">
                        <div style="color: white;position:absolute;top:2px;left:120px;width:100px;height: 60px;font-size: 50px;text-shadow: -1px 2px 2px #000;">
                        <span style="text-align: center"><b>CAR </b></span><span style="color: #C533FF;"><b>DEALERSHIP</b></span></div>
                    </div>
                    <h2>
                        <?php
                            if(isset($_SESSION["login"]))
                            {
                                echo $_SESSION["login"];
                                unset($_SESSION['login']);
                            }
                        ?>
                    </h2>
                    <h3>Username<br><br>
                    <input type="text" name="username" placeholder="Enter Username"/>
                    <br>
                    Password<br><br>
                    <input type="password" name="password" placeholder="Enter Password"/>
                    <br>
                    </h3>
                    <input type="submit" name="login" value="LOGIN"/><br>
                </form>
            </div>
        
        </header>
    </body>
    
</html>
<?php

    //check if login button clicked or not
    if(isset($_POST['login']))
    {
        //process for login
        //get value 
        $username=$_POST['username'];
        $password=$_POST['password'];

        //sql query
        $sql="SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

        //execute query
        $res=mysqli_query($conn,$sql);

        //count
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //user available
            $_SESSION['login']="";
            header('location:http://localhost/DBMS/admin/index.php');
        }
        else
        {
            //user not available
            $_SESSION['login']="Login failed";
            header('location:http://localhost/DBMS/login.php');
        }
    }
?>