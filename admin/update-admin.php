<?php include('partials/menu.php')?>

<div class="mian-content">
    <div class="wrapper">
       <h1>Update Admin</h1>
       <br></br>

       <?php 
            //1.get the id of selected admin
            $id=$_GET['id'];

           /* //2.create sql query to  get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $res=mysqli_query($conn, $sql);

            //check wether the query is executed or not
            if($res==TRUE)
            {
                //check wether the data is available or not
                $count = mysqli_num_rows($res);
                //check wether we have admin data or not
                if($count==1)
                {
                    //get the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $user_name = $row['user_name'];
                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }*/
       ?>
       
       <form action="" method="post">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <!--<input type="text" name="full_name" value="<?//php echo $full_name; ?>">-->
                        <input type="text" name="full_name" placeholder="Enter Full name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <!--<input type="text" name="user_name" value="<?//php echo $user_name; ?>">-->
                        <input type="text" name="user_name" placeholder="Enter User name">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
       
       </form>
    </div>
</div>

<?php 
    //check wether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        //get all the values from form update 
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        //Create a sql query to update admin
        $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            user_name = '$user_name' 
            WHERE id='$id'
        ";

        //execute the query
          $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check wether the query executed successfully or not
        if($res==TRUE)
        {
            //query executed and amdin updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to update admin.</div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>


<?php include('partials/footer.php')?>