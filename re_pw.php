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
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>

    <div class="center_div">
        <div class="flx_cter_img"> <img src="img/logo2.png" alt="logo" title="logo"> </div>

        <div class="log_div">
            <h3 class="flx_cter_img" style="margin: 25px 0 ; color: green;"> Change Password </h3>
            <form class="form_cter" method="post" enctype="application/x-www-form-urlencoded">

                <div style="width: 100%;">
                    <label for="tk">Email:</label><br>
                    <input type="email" class="input1" id="tk" maxlength="40" name="email" placeholder="Email"
                        required><br>
                </div>
                <br>
                <div style="width: 100%;">
                    <label for="mk">New Password:</label><br>
                    <input type="password" class="input1" minlength="6" maxlength="35" id="mk" name="pw"
                        placeholder="******"><br><br>
                </div>
                <div style="width: 100%;">
                    <label for="mk">Code:</label><br>
                    <div class="code_div">
                        <input type="number" class="input1" minlength="6" maxlength="35" id="mk" name="code"
                            placeholder="123456">
                        <input style="width: 20%; white-space: nowrap;" type="submit" class="btn_log" value="Send"
                            name="send_code">
                    </div>
                    <br>
                </div>
                <div style="margin-bottom: 20px; margin-top: 15px;" class="g-recaptcha"
                    data-sitekey="6LeUJK8mAAAAALkc0bTaK24jJz9ae7tyDMv8UP4h"></div>
                <input type="submit" class="btn_log" style="height:36px;" name="repw" value="Change">

            </form>

            <div class="flx_cter_img" style="gap: 20px; margin: 30px 0 0 0;">
                <a href="sign_up.php" style="color: green;"> Sign Up </a>
                -
                <a href="login.php" style="color: green;"> Sign In </a>
            </div>
        </div>
    </div>
    <br>
</body>

</html>

<?php 

    if( isset($_POST['send_code']) ) {
        if( isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']) ) {
            ?> <script> alert("We have sent the code to your email"); </script> <?php
        } else {
            ?> <script> alert("Captcha Required"); </script> <?php
        }
    }
?>