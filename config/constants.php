<?php 
    //start session
    session_start();

     //devlopement connection
    //create constants to store non repeating value
    // define('SITEURL', 'http://localhost/food-order/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'food-order');

    //Remote Database Connection
    define('SITEURL', 'http://remotemysql.com/DI2ESSb1O4/');
    define('LOCALHOST', 'remotemysql.com');
    define('DB_USERNAME', 'DI2ESSb1O4');
    define('DB_PASSWORD', 'kJnkKp8vO2');
    define('DB_NAME', 'DI2ESSb1O4');

    //execute query and save data in database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>
