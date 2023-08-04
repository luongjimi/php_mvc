<?php 
    $conn = mysqli_connect("localhost","root","","test");
    
    mysqli_set_charset($conn, 'UTF8');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('d-m-Y H:i:s');
    $now = strtotime($time);
    $day = date('d-m-Y');
    $ip = $_SERVER['REMOTE_ADDR'];

?>
