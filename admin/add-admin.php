<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add Admin</h1>
    <br></br>

    <?php
        if(isset($_SESSION['add'])) //checking wether the session is set or not
        {
            echo $_SESSION['add'];//Display the session massage if set
            unset($_SESSION['add']);//remove session massage
        }
    
    ?>

    <form action="" method="post">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter your name">
                </td>
            </tr>

            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="user_name" placeholder="Enter your Username">
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Enter your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

        </table>
    </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php
    //process the value from form and save in the Databases
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "button clicked";

        //1.get the data from form
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

       //2.sql queries to save the data from databases
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            user_name='$user_name',
            password='$password'
        ";

        //3. executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

         //4.check wether the(query is executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //data inserted
            //echo "data inserted";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //echo "failed to insert data";
            //failed to insert data
            $_SESSION['add'] = "<div class='error'>Failed To Add Admin. </div>";
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>
