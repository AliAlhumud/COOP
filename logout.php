<?php
    session_start();

if(isset($_SESSION['user']) and  $_SESSION['user']='admin')
    {
        session_unset();
        session_destroy();
        header("location: index.html");
        echo "Logout Successfully";
        exit();
    }
?>