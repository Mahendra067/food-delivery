<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("remotemysql.com","DI2ESSb1O4","kJnkKp8vO2","DI2ESSb1O4");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
