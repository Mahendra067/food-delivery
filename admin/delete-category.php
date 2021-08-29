<?php
    //include constants file
    include('../config/constants.php');


    //echo "delete page";
    //check wether the id image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "get the value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is available
        if($image_name != "")
        {
            //image is available. so remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);
            
            //if faled to remove image then add an error massage and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();

            }
        }

        //delete data from database
        //SQL query to delete data from database
        $sql = "DELETE FROM tbl_categories WHERE id=$id";

        //executes the query
        $res = mysqli_query($conn, $sql);

        //check wether the data is delete from database or not
        if($res==TRUE)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'> Category Deleted Successfully.</div>";
            //redirect to manage category 
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set failed massage and redirect
            //set success message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
            //redirect to manage category 
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //redirect to manage category page with message


    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }