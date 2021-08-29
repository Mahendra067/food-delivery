<?php include('partials/menu.php')?>

        <!--main content section start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        $sql = "SELECT * FROM tbl_categories";
                        //execute the query
                        $res = mysqli_query($conn, $sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    </br>
                    Categories
                </div>

                 <div class="col-4 text-center">

                 <?php 
                        $sql2 = "SELECT * FROM tbl_food";
                        //execute the query
                        $res2 = mysqli_query($conn, $sql2);
                        //count rows
                        $count2 = mysqli_num_rows($res2);
                    ?>
     

                    <h1><?php echo $count2; ?></h1></br>
                    Foods
                </div>

                 <div class="col-4 text-center">
                    
                    <?php 
                        $sql3 = "SELECT * FROM tbl_order";
                        //execute the query
                        $res3 = mysqli_query($conn, $sql3);
                        //count rows
                        $count3 = mysqli_num_rows($res3);
                    ?>
     

                    <h1><?php echo $count3; ?></h1></br>


                    Total Orders
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //create sql query to get total revanue
                        //aggregreate function
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //execute the query
                        $res4 = mysqli_query($conn, $sql4);

                        //get the values 
                        $row4 = mysqli_fetch_assoc($res4);

                        //GET the total revanue
                        $total_revenue = $row4['Total'];
                    ?>

                 
                    <h1>$<?php echo $total_revenue; ?></h1></br>
                    Revenue-generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!--main content section end-->

<?php include('partials/footer.php') ?>