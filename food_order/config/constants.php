<?php
        ob_start();
        session_start();

        define('SITEURL', 'http://localhost/food_order/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'food_order');

        $conn = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>