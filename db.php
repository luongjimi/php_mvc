<?php 
    $conn = mysqli_connect("localhost","root","","test");
    
    //$conn = mysqli_connect("sql109.infinityfree.com","epiz_33885533","voxwWK3VAhb","epiz_33885533_dmnv");
    //database in hosting

    mysqli_set_charset($conn, 'UTF8');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('d-m-Y H:i:s');
    $now = strtotime($time);
    $day = date('d-m-Y');
    $ip = $_SERVER['REMOTE_ADDR'];

?>
