<?php
    
    //include constant.php file here
    include('../config/constants.php');

    //1. get the ID of admin to be deleted
    $id = $_GET['id'];

    //2.create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check wether the query executed successfully or not
    if($res==TRUE)
    {
        //query executed successfully and admin deleted
        //echo "Admin Deleted";
        //create session variable to display massage
        $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin. Try Again Later.</div> ";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }


    //3.redirect to manage admin page with massage (success/error)

?>