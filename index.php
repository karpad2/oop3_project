<?php
$title="Main page";
include "head.php";

if(!$loggedin) include "students_list.php";
else header("Location: mypage.php");
include "footer.php";

