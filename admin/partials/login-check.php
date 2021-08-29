<?php
    //Authorization - Access control 
    //check wether the user is logged in or not
    if(!isset($_SESSION['user']))//IF user session is not set
    {
        //user is not logged in
        //redirect to login page with massage
        $_SESSION['no-login-massage'] = "<div class='error text-center'>Please login to access admin panel.</div>";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');

    }
?>