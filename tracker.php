<?php

$title="Saver";
define("secret","mikroci");
include "db_config.php";
session_start();

if(isset($_GET["record"])AND $_GET["record"]=="record") {
    if (isset($_POST["data"])) {
        $subject="";
        $user="";
        $vars_s = json_decode($_POST["data"],true);//true
        $vars=array();
        foreach ($vars_s as $var_s) $vars[]=json_decode($var_s,true);

        $first_item = true;

        $items = array();

        $list_b = array("speed" => 0, "altitude" => 0);
        $list = json_encode($speed_alti);

        $sql = "INSERT INTO upload_data VALUES ('','{$_SESSION["user_id"]}','$subject','{$list["date"]}','{$list["weeknumber"]}')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



    } else die("Nope");

}
if(!isset($_SESSION["user_id"])) header("Location: index.php");
if(isset($_GET["mod"]) AND $_GET["mod"]=="start")
{
    include "head.php";


    include "footer.php";
}
else if(isset($_GET["mod"])&&$_GET["mod"]=="end")
{
    $sql="SELECT * FROM tmp_run where user_id='{$_SESSION["user_id"]}' ORDER BY run_date;";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($result)>0){
        $items = mysqli_fetch_all($result, MYSQLI_BOTH);
        $coord1 = array();
        $speed = array();
        $i = 0;
        $begin = $items[0]["run_date"];

        foreach ($items as $item) {
            $coord1[$i] = json_decode($item["coord"]);
            $data=json_decode($item["speed_distance"]);
            $speed[($i++)] = array($item["run_date"],$data->speed,$data->altitude);}

        $sql = "SELECT SUM(distance) as 'SUM' FROM tmp_run where user_id='{$_SESSION["user_id"]}';";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($result);
        $coord1 = json_encode($coord1);
        $speed = json_encode($speed);
        $sql = "INSERT INTO run (user_id,run_date_begin,coords,speed_altitude,distance)
        VALUES ('{$_SESSION["user_id"]}','$begin','$coord1','$speed',{$result["SUM"]})";
        mysqli_query($conn, $sql) or die("Mentés nem sikerült:".mysqli_error($conn));

        $sql = "DELETE FROM tmp_run WHERE user_id='{$_SESSION["user_id"]}'";
        mysqli_query($conn, $sql) or die("Cleaning");

        $sql = "SELECT MAX(run_id)as 'current' FROM run WHERE user_id={$_SESSION["user_id"]}";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $result = mysqli_fetch_assoc($result);
        header("Location: view.php?watch=\"{$result["current"]}\"");
    }
    header("Location: mypage.php");
}
else if(isset($_GET["mod"])&&$_GET["mod"]=="delete")
{
    $sql = "DELETE FROM tmp_run WHERE user_id='{$_SESSION["user_id"]}'";
    mysqli_query($conn, $sql) or die("Tisztitas");
    header("Location: index.php");
}
else {}