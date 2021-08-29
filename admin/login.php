<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Login-food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-massage']))
                {
                    echo $_SESSION['no-login-massage'];
                    unset($_SESSION['no-login-massage']);
                }
            ?>
            <br><br>

            <!--Login Form Start Here-->
            <form action="" method="post" class ="text-center">
                Username:<br>
                <input type="text" name="user_name" placeholder="Enter Username"><br><br>

                Password:<br>
                <input type="password" name="password" placeholder="enter password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
            
            <!--Login Form end Here-->

            <p class="text-center">Created by - <a href="www.mahendrajadav.com">Mahendra</a></p>
        </div>
    </body>
</html>

<?php
    //check wether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1.get the data from login form
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        //2.sql to check wether the username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE user_name='$user_name' AND password='$password'";

        //3.execute the query
        $res = mysqli_query($conn, $sql);

        //4.count rows to check wether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $user_name;//To check wether the user is logged in or not and logout will unset it.


            //redirect to homepage/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available and login fail
            //user available and login success
            $_SESSION['login'] = "<div class='error text-center'>Username and password did not match.</div>";
            //redirect to homepage/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>