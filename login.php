<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logo1.png" type="image/x-icon" />
    <link rel="stylesheet" href="st.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script> 
</head>

<body>

    <div class="center_div">
        <div class="flx_cter_img"> <img src="img/logo2.png" alt="logo" title="logo"> </div>
        
        <div class="log_div">
            <h3 class="flx_cter_img" style="margin: 25px 0 ; color: green;"> Sign In </h3>
            <form class="form_cter" method="post" enctype="application/x-www-form-urlencoded">

                <div style="width: 100%;">
                    <label for="tk">Email :</label><br>
                    <input type="email" class="input1" id="tk" maxlength="40" name="email" placeholder="Email" required><br>
                </div>
                <br>
                <div style="width: 100%;">
                    <label for="mk">Password :</label><br>
                    <input type="password" class="input1" minlength="6" maxlength="35" id="mk" name="pw" placeholder="******" required><br><br>
                </div>
                <div style="margin-bottom: 20px; margin-top: 15px;" class="g-recaptcha" data-sitekey="6LeUJK8mAAAAALkc0bTaK24jJz9ae7tyDMv8UP4h"></div>
                <input type="submit" class="btn_log" style="height:36px;" name="log" value="Login">

            </form>
            
            <div class="flx_cter_img" style="gap: 20px; margin: 30px 0 0 20px;">
                <a href="sign_up.php" style="color: green;"> Sign Up </a>
                -
                <a href="re_pw.php" style="color: green;"> Forgot Password ? </a>
            </div>
        </div>
    </div>
    <br> 
</body>

</html>

<?php 
    if (isset($_POST['log'])) {
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $secret = '6LeUJK8mAAAAAM5XF29ltJHFLV4OrvWeDQRBxkte'; //Thay thế bằng mã Secret Key của bạn
            $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $response_data = json_decode($verify_response);
                if($response_data->success) {
                    include "db.php";
                    // su li dang nhap 
                    $tk = htmlspecialchars($_POST['email']);
                    $mk = md5($_POST["pw"]);
                    $rows = mysqli_query($conn," SELECT * FROM `users` WHERE `email` = '".$tk."' AND `pw` = '".$mk."' AND `cad` = 0 ");
                    $count = mysqli_num_rows($rows);
                        if ($count == 1) {
                            $_SESSION['user'] = bin2hex($tk);
                            header ("Location: index.php?act=home");
                        } else {
                            ?> <script> alert("Wrong Login Information"); </script> <?php
                        }
                    }
                } else {
                    ?> <script> alert("Captcha Required"); </script> <?php
                }
            }
?>
