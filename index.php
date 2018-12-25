<?php
$title="Main page";
include "head.php";

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) $loggedin=true;


include "students_list.php";
include "footer.php";

