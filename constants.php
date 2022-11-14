<?php

     //start session
     session_start();
     //execute query and save data in database
     $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
     $db_select = mysqli_select_db($conn,'dbmsproject') or die(mysqli_error());//selecting database

?>