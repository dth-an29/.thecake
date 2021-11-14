<?php
    define('DB_SERVERNAME','localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'project_ltweb');

    // Create connection
    $conn = new mysqli(DB_SERVERNAME, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset('utf8');//đưa tiếng việt vô CSDL được

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $check_connect = false;
    }else{
        $check_connect = true;
    }
    
    //Hàm alert
    function alert($content){
        echo "<script>alert('$content');</script>";
    }
?>