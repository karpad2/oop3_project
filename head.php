<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 19:59
 */
session_start();
include "var.php";
$loggedin=false;

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) $loggedin=true;
?>
<!DOCTYPE html>
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
    <meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
<div class="all_container">