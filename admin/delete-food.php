<?php 

    //include constant page
    include('../config/constants.php');

    //echo "delete food page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //either use '&&' or 'AND'
    {
        //proccess to delete
        //echo "process to delete";

        //1. get id and image name 
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];


       //2. remove the image if available
        //check wether the image is available or not, if available then delete
        if($image_name != "")
        {
            //it has image and need to remove from folder
            //get the image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check wether image is remved or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                //redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process of deleting food
                die();
            }

        }

        //3.delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //execute the query 
        $res = mysqli_query($conn, $sql);

        //check wether the query executed or not and set the session message respectively
        //4.redirect to manage food with session message
        if($res==TRUE)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
            header('location:'.SIREURL.'admin/manage-food.php');
        }

        
    }
    else
    {
        //redirect to manage food page
        //echo "redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unaurhorize Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
?>