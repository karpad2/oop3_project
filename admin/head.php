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
<title><?php echo $title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="Run because it's fun, speed meter,">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 Week">
    <meta name="author" content="NaN">
    <meta name="distribution" content="global">
    <meta name="language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="rating" content="general">
<link rel="icon" href="../favicon.ico">
<link rel="stylesheet" href="../style.css">
<script src="../js/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="script.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.php">Hat Tyúk</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item <?php if($title!="About us")echo'active';?>">
                <a class="nav-link" href="index.php">Home<?php if($title!="About us")echo' <span class="sr-only">(current)</span>';?></a>
            </li>
            <li class="nav-item <?php if($title=="About us")echo'active';?>">
                <a class="nav-link" href="../about_us.php">About us</a>
            </li>
            <li class="nav-item">
            <button class="btn btn-primary bg-success" data-toggle="modal" data-target="#register-mod">Register</button>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="register-mod" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button></div>
            <form action="../login.php?mod=2" method="post">
                <div class="modal-body">
                    username: <input type="text" name="user" required="required" class="form-control"><br>
                    password: <input type="password" name="passwd1" required="required" class="form-control"><br>
                    password again:<input required="required" type="password" name="passwd2" class="form-control"><br></div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="reg_button" value="Regisztrálás">
                </div></form>
        </div>
    </div>
</div>