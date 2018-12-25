<?php
include "header.php";
define("secret","mikroci");
include "../db_config.php";
foreach($_POST as $key=>$item) $_POST[$key]=mysqli_escape_string($conn,$item);
if(isset($_GET["attandances_d"]))
{
    $sql="select * from attendances left join students s on attendances.student_id = s.student_id  where weeknumber_upload_id={$_POST["attandances_d"]}";
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

echo"<table><thead><th>index</th><th>ottvolt</th></thead>
<tbody>";
foreach($students as $student)
{
    echo "<tr><td>{$student["student_index"]}</td><td>{$student["student_name"]}</td></tr>"

}



echo"</tbody></table>";
include "fopter.php";
