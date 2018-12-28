<?php

$title="Saver";
define("secret","mikroci");
include "db_config.php";
session_start();
$json='{"index_numbers":["16118105"],"date":"2018-12-27","subject":"P022"}';


if(isset($_GET["record"])AND $_GET["record"]=="record") {
    if (isset($_POST["data"])) {
        //$data=mysqli_escape_string($conn,$_POST["data"]);
        //$vars = json_decode($data,true);//true
        $vars = json_decode($_POST["data"],true);//true
        $subject=$vars["subject"];


        $students=array();
        $date=$vars["date"];
       // $vars=array();
        $students = $vars["index_numbers"];
        $sql = "select add_week('$subject','$date') as 'id'";
        try {
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
        catch (mysqli_sql_exception $ex)
        {
            die($ex);
        }
        $upload_id=mysqli_fetch_assoc($result);
        //var_dump($students);
        $upload_id=$upload_id["id"];
        foreach ($students as $student)
        { $sql = "INSERT INTO attendances (weeknumber_upload_id,student_id) VALUES ('$upload_id','$student')";
        //var_dump($sql);
            try{
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