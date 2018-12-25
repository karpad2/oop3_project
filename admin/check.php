<?php
define("secret","mikroci");
include "../db_config.php";
/*
if(!isset($_SESSION["logged_in"])) session_start();

if(empty($_SESSION["user_id"])) header("Location:../login.php");

$loggedin=false;

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) $loggedin=true;*/
$p = $_GET['p'];

//if p is not set, then redirect the user

if(!isset($p))
    header("Location: index.php");

//if p=1 then the add student form was submitted
if($p==1){
    $index = $_POST["index"];
    $name = $_POST["name"];

    $sql = "INSERT INTO students(student_id, student_name) VALUES('$index', '$name')";
    
    if(mysqli_query($conn, $sql))
        header("Location: addstudent.php?s=1");

    else
        header("Location: addstudent.php?s=0");
}

//if p=2 then the add subject form was submitted
if($p==2){
    $subjid = $_POST["subjid"];
    $subjname = $_POST["subjname"];

    $sql = "INSERT INTO subjects(subject_id, subject_name) VALUES('$subjid', '$subjname')";
    
    if(mysqli_query($conn, $sql))
        header("Location: addsubject.php?s=1");

    else
        header("Location: addsubject.php?s=0");
}

//if p=3 then the modify student form was submitted
if($p==3){
    $index = $_POST["indexno"];
    $student = $_POST["studname"];

    $sql = "UPDATE students set student_name = '$student' WHERE student_id = '$index'";
    if (mysqli_query($conn, $sql)) 
        header("Location: modifystud.php");

    else 
        header("Location: modifystud.php");
}

//if p=4 then the modify subject form was submitted
if($p==4){
    $subjid = $_POST["subjid"];
    $subjname = $_POST["subjname"];

    $sql = "UPDATE subjects set subject_name = '$subjname' WHERE subject_id = '$subjid'";
    if (mysqli_query($conn, $sql)) 
        header("Location: modifysubj.php");

    else 
        header("Location: modifysubj.php");
}
?>