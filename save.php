<?php

$title="Saver";
define("secret","mikroci");
include "db_config.php";
session_start();

if(isset($_GET["record"])AND $_GET["record"]=="record") {
    if (isset($_POST["data"])) {
        $data=mysqli_escape_string($conn,$_POST["data"]);
        $vars = json_decode(data,true);//true
        $subject=$vars["subject"];
        $user=$_SESSION["user_id"];
        $weeknumber="";
        $students=array();
        $date=$vars["date"];
       // $vars=array();
        $students = $vars["index_numbers"];
        $sql = "INSERT INTO upload_data VALUES ('','$user','$subject','$date')";
        try {
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
        catch (mysqli_sql_exception $ex)
        {
            die($ex);
        }
        $upload_id=mysqli_insert_id($result);

        foreach ($students as $student)
        {
            try{
                $sql = "INSERT INTO attendances VALUES ('$upload_id','$students')";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            }
            catch (mysqli_sql_exception $ex)
            {
                echo($ex."\n");
            }

        }


    } else die("Nope");

}
else {}