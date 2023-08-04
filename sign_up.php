<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="img/logo1.png" type="image/x-icon" />
    <link rel="stylesheet" href="st.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>
    <div class="center_div">
        <div class="flx_cter_img"> <img src="img/logo2.png" alt="logo" title="logo"> </div>
    
        <div class="log_div">
            <h3 class="flx_cter_img" style="margin: 25px 0 ; color: green;"> Sign Up </h3>
            <form class="form_cter" method="post" enctype="application/x-www-form-urlencoded">

                <div style="width: 100%;">
                    <label for="tk">Email :</label><br>
                    <input type="email" class="input1" minlength="6" maxlength="40" id="tk" name="email" placeholder="Email"
                        required><br>
                </div>
                <br>
                <div style="width: 100%;">
                    <label for="mk">Password :</label><br>
                    <input type="password" class="input1" minlength="6" maxlength="35" id="mk" name="pw" placeholder="******"
                        required><br><br>
                </div>

                <div style="width: 100%;">
                    <label for="mk">Re-password :</label><br>
                    <input type="password" class="input1" minlength="6" maxlength="35" id="mk" name="pw1" placeholder="******"
                        required><br><br>
                </div>
                <div style="margin-bottom: 20px; margin-top: 15px;" class="g-recaptcha"
                    data-sitekey="6LeUJK8mAAAAALkc0bTaK24jJz9ae7tyDMv8UP4h"></div>
                <input type="submit" class="btn_log" name="reg" style="height:36px;" value=" Register ">
            </form>
            
            <div class="flx_cter_img" style="gap: 20px; margin: 30px 0 0 20px;">
                <a href="login.php" style="color: green;"> Sign In </a>
                -
                <a href="re_pw.php" style="color: green;"> Forgot Password ? </a>
            </div>
        </div>
    </div>
    <br>
</body>

</html>

<?php 

if (isset($_POST['reg'])) {               
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secret = '6LeUJK8mAAAAAM5XF29ltJHFLV4OrvWeDQRBxkte'; //Thay thế bằng mã Secret Key của bạn
        $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $response_data = json_decode($verify_response);
            if($response_data->success) {
                        // su li dang ki
                $tk = htmlspecialchars($_POST['email']);    
                $pw1 = md5($_POST['pw']);
                $pw2 = md5($_POST['pw1']);

                if($pw1 === $pw2){
                    include "db.php";
                    $ip2 = md5($ip);

                    $run2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `ip` = '$ip2' " ); 
                    $count2 = mysqli_num_rows($run2);

                    $run1 = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '".$tk."' ");
                    $count1 = mysqli_num_rows($run1);

                        if ($count2 > 0) {
                            ?> <script> alert("You can not registered"); </script> <?php
                        } elseif($count1 > 0){
                            ?> <script> alert("Email already in use"); </script> <?php
                        } else {
                            $run4 = mysqli_query($conn, "INSERT INTO users (`email`, `pw`, `ip`) VALUES ('$tk', '$pw1', '$ip2') ");
                            ?> <script> alert("Successful registration (2s)"); </script> <?php
                            header("refresh: 2; url=index.php?act=login");
                        }

                } else {
                    ?>
                        <script> alert("Password is not the same"); </script>
                    <?php
                }
            } else {
                header("location: check_us.php");
            }
    } else {
        ?>
            <script> alert("Captcha Required"); </script>
        <?php
    }
}
?>