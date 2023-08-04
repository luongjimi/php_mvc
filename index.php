<?php 
    session_start();
    ob_start();
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo1.png" type="image/x-icon" />
    <title>Diblock.top</title>
    <link rel="stylesheet" href="st.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main">
        <div class="flx_nav">
            <nav class="sidebar" id="side">
                <div class="top_img_nav11">
                    <div class="img_nav" style="margin-bottom: 15px;">
                        <img src="img/logo2.png" alt="diblock.top">
                        <box-icon name='x' style="height: 28px; width: 28px;" id="close_bar"
                            onclick="closenav()"></box-icon>
                    </div>
                    <div
                        style="display: flex; align-items: center; justify-content: center; margin-top: -10px; padding-bottom: 6px;">
                        <box-icon name='chevron-down' style="width: 30px; height: 30px;"></box-icon>
                    </div>
                </div>
                <div class="menu">
                    <div class="menu_item">
                        <ul class="ul_menu">

                            <li class="item">
                                <a href="index.php?act=home" class="link_item">
                                    <box-icon name='home-alt' class="icon21"></box-icon>
                                    <span> Home </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="index.php?act=add_job" class="link_item">
                                    <box-icon name='book-add' class="icon21"></box-icon>
                                    <span> Add Job </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="index.php?act=job" class="link_item">
                                    <box-icon name='run' class="icon21"></box-icon>
                                    <span> Work </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="index.php?act=wallet" class="link_item">
                                    <box-icon name='wallet' class="icon21"></box-icon>
                                    <span> Wallet </span>
                                </a>
                            </li>

                            <li class="item">
                                <a href="index.php?act=user" class="link_item">
                                    <box-icon name='user-circle' class="icon21"></box-icon>
                                    <span> Account </span>
                                </a>
                            </li>

                            <li class="item" style="margin-top: 22px;">
                                <a href="index.php?act=lich_su" class="link_item">
                                    <box-icon name='history' class="icon21"></box-icon>
                                    <span> History </span>
                                </a>
                            </li>

                            <li class="item" style="margin-top: 22px;">
                                <a href="index.php?act=setting" class="link_item">
                                    <box-icon name='cog' class="icon21"></box-icon>
                                    <span> Setting </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="index.php?act=out" class="link_item">
                                    <box-icon name='log-out' class="icon21"></box-icon>
                                    <span> Log out </span>
                                </a>
                            </li>


                        </ul>

                    </div>
                </div>
            </nav>
            <nav class="nav_top">
                <div class="top_flx" style="justify-content: space-between;">


                    <div class="icon31" onclick="opennav()">
                        <box-icon name='menu'></box-icon>
                    </div>

                    <div class="top_flx">
                        <div class="dropdown">

                            <div class="icon31" onclick="drFunction()" class="dropbtn">
                                <box-icon name='bell'></box-icon>
                            </div>
                            <div id="myDropdown" class="dropdown-content">
                                <h3 class="h3drop">
                                    <p style="margin: 0;"> Notification </p>
                                    <box-icon name='x' onclick="drFunction()"
                                        style="width: 30px; height: 30px; cursor: pointer; "></box-icon>
                                </h3>

                                <?php for ($i=0; $i < 10 ; $i++) { 
                                    ?> <a>
                                    <p style="margin: 0; font-size: 12px;"> 05/04/2023 </p>
                                    You have successfully withdrawn 5$
                                </a>
                                <?php
                                } ?>
                            </div>
                        </div>

                        <div class="top_flx img_us_top" style="gap: 12px;">

                            <box-icon name='coin'></box-icon>

                            <span style="white-space: nowrap;">41.5$</span>

                        </div>



                    </div>
                </div>
                <hr>
                <div class="ndung_main">
                    <?php 
                        if(isset($_GET['act']) and $_GET['act'] != " "){
           
                                if( !isset($_SESSION['user']) ){
                                    if( ($_GET['act'] == "sign_up") or ($_GET['act'] == "login") ) {
                                        switch ($_GET['act']) {

                                            case 'login':
                                                header("location: login.php");
                                                break;
                                            
                                            case 'sign_up':
                                                header("location: sign_up.php");
                                                break;

                                        } 
                                    } else {
                                            header("location: index.php?act=login");
                                        }
                                } else {
                                    
                                    switch ($_GET['act']) {

                                    case 'home':
                                        include "view/home.php";
                                        break;

                                    case 'wallet':
                                        include "view/wallet.php";
                                        break;

                                    case 'job':
                                        include "view/job.php";
                                        break;

                                    case 'add_job':
                                        include "view/add_nv.php";
                                        break;

                                    case 'view_job':
                                        include "view/view_job.php";
                                        break;

                                    case 'user':
                                        include "view/user.php";
                                        break;

                                    case 'lich_su':
                                        include "view/lsu_nv.php";
                                        break;

                                    case 'out':
                                        unset($_SESSION['user']);
                                        unset($_SESSION['acc_run']);
                                        header("Location: index.php");
                                        break;
                                    
                                    case 'setting':
                                        include "view/setting.php";
                                        break;
                                    
                                }
                            }
                        } else {
                            header("location: index.php?act=home");
                        }
                    ?>
                    <br>
                </div>

            </nav>
        </div>
    </div>

    <script type="text/javascript">

        function opennav() {
            document.getElementById("side").style.display = "block";
        };
        function closenav() {
            document.getElementById("side").style.display = "none";
        };
        function drFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        };

    </script>

</body>

</html>