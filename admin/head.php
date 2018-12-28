<?php
/*
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 19:59
*/

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false) header("Location:../login/");

?>
<!doctype html>
<html lang="en">
<head>
    <title>
        <?php echo $title ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Run because it's fun, speed meter,">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 Week">
    <meta name="author" content="NaN">
    <meta name="distribution" content="global">
    <meta name="language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="rating" content="general">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="index.php">
            <img src="../img/logo.png" height="50" width="50" alt="logo" title="Swans"/>
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($title!="About us")echo'active';?>">
                <a class="nav-link" href="index.php">Home<?php if($title!="About us")echo' <span class="sr-only">(current)</span>';?></a>
            </li>
            <li class="nav-item <?php if($title=="About us")echo'active';?>">
                <a class="nav-link" href="../about_us.php">About us</a>
            </li>
        </ul>
        <button class="regbtn" data-toggle="modal" data-target="#register-mod">registration</button>
        <button class="regbtn" style="font-size: 30px; line-height: 30px; margin-left: 10px;" title="Sign out">
            <a href="logout.php" style="color: #fff;">
                <i class="fa fa-sign-out"></i>
            </a>
        </button>        
    </div>
</nav>
<div class="modal fade" id="register-mod" style="display: none; text-align: center;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modhead">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closetxt">×</span>
                </button>
            </div>
            <form action="../login.php?mod=2" method="post">
                <div class="modal-body">
                <h3 style="color: #fff; margin-bottom: 30px;">REGISTRATION</h3>
                    <span class="icons">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" name="user" required="required" maxlength="30" placeholder="USERNAME"><br>
                    <span class="icons">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" name="passwd1" required="required" maxlength="32" placeholder="PASSWORD"><br>
                    <span class="icons">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input required="required" type="password" name="passwd2" maxlength="32" placeholder="CONFIRM PASSWORD"><br>
                </div>
                <div class="modfoot">
                    <input type="submit" class="regbtn" id="reg_button" value="registration">
                </div>
            </form>
        </div>
    </div>
</div>