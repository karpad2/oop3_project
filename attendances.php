<?php
$title="Attendance";
include "head.php";
define("secret","mikroci");
include "db_config.php";

foreach($_POST as $key=>$item) $_POST[$key]=mysqli_escape_string($conn,$item);
if(isset($_POST["attandances_d"]))
{
    $sql="select * from attendances where weeknumber_upload_id={$_POST["attandances_d"]}";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($oonn));
    $students=mysqli_fetch_all($result,3);
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    /* special ajax here */
    foreach($_POST as $key=>$item) $_POST[$key]=mysqli_escape_string($conn,$item);
    if(isset($_POST["student_id"])&&isset($_POST["active"])&&isset($_POSt["uploadid"]))
        if($_POST["active"])
            $sql="INSERT INTO attendances  (weeknumber_upload_id,student_id) VALUES ('{$_POST["upload_id"]}','{$_POST["student_id"]}')";
        else $sql="DELETE FROM attendances WHERE weeknumber_upload_id='{$_POST["upload_id"]}' AND student_id='{$_POST["student_id"]}'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)>0) die("Ok");
}

echo"<div class=\"table-wrapper-scroll-y\">
          <div class=\"table-responsive\">
            <table id=\"dtMaterialDesignExample\" class=\"table table-bordered table-striped\">
<thead><tr><th>Name</th><th>Index</th><th>Ott volt?</th></tr></thead>";





echo"</table></div></div>";





include "footer.php";
