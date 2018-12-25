<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 22:36
 */


define("secret","mikroci");
include "db_config.php";

$sql="SELECT students.Student_id,  IFNULL(SUM(Point),0) as 'Point' FROM students left join students_points on students.Student_id = students_points.Student_id
GROUP BY students.Student_id order by Point DESC";

//$sql="SELECT Student_id FROM students ";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$users=mysqli_fetch_all($result,MYSQLI_BOTH);

//var_dump($users);
if (isset($_COOKIE['quote'])) {
  $number = $_COOKIE['quote'];
  $sql="SELECT citatum, person FROM citatum";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $quotes=mysqli_fetch_all($result,MYSQLI_BOTH);
  if ($number > count($quotes) || $number < 0) {
    $number=rand(0, count($quotes));
    setcookie('quote', $number, time() + 86400, "/");
  }
}
else {
  $sql="SELECT citatum, person FROM citatum";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $quotes=mysqli_fetch_all($result,MYSQLI_BOTH);
  $number=rand(0, count($quotes));
  setcookie('quote', $number, time() + 86400, "/");
}
$person = $quotes[$number]["person"];
$quote = $quotes[$number]["citatum"];
echo "
  <div class=\"quote_container\">
    <div class=\"quote_header\">Quote of the day</div>
    <i class=\"quote_left fas fa-quote-left\"></i>
    <div class=\"quote\">{$quote}</div>
    <div class=\"person\">{$person}</div>
    <i class=\"quote_right fas fa-quote-right\"></i>";
echo '
  </div>
  <div class="table_container">
    <i class="table_logo fas fa-university"></i>
    <h1>Students List:</h1>
    <table id="studenttable" class="lTable">
      <tbody>';
        //$i=0;
        $max=$users[0]["Point"];
        //foreach ($users as $user) {
        for ($i = 1; $i <= 5; $i++) {
          //++$i;
          $current=$users[$i-1]["Point"];
          $user = $users[$i-1];
          $percent = floor($current / $max * 100);
          $current=number_format($current, 0, " ", " ");
          if ($percent == 0) $percent++;
          echo "
          <tr>
            <th scope=\"row\"><span class=\"number\" title=\"Ez nem id, hanem sorszám.\">$i.</span></th>
            <td>
              <div class=\"student_id\">{$user["Student_id"]}</div>
              <div class=\"progress_container\"><div class=\"progressBar\" style=\"width:{$percent}%\"></div></div>
            </td>
            <td><div class=\"student_points\">{$current}<br>points</div></td>
            <td><div class=\"badge_container\"><img src=\"img/badges/G_Activity.svg\"><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i><i class=\"fas fa-star\"></i></div></td>
          </tr>";
        }
        if(count($users)==0) {
          echo'<tr><td colspan=\"4\">Nincs tanuló</td></tr>';
        }
        echo '
      </tbody> ';
      if (count($users) > 5) {
        echo '
          <tbody id="hidden" class="hidden_table">';
          for ($i = 4; $i < count($users); $i++) {
            //++$i;
            $current=$users[$i]["Point"];
            $user = $users[$i];
            $percent = floor($current / $max * 100);
            $current=number_format($current, 0, " ", " ");
            if ($percent == 0) $percent++;
            echo "
            <tr>
              <th scope=\"row\"><div class=\"number\">$i.</div></th>
              <td>
                <div class=\"student_id\">{$user["Student_id"]}</div>
                <div class=\"progress_container\"><div style=\"width:{$percent}%\" class=\"progressBar\"></div></div>
              </td>
              <td><div class=\"student_points\">{$current}<br>points</div></td>
              <td></td>
            </tr>";
          }
        echo '
          </tbody>
        ';
      }
      echo '
    </table>
    <div class="show_more"><div class="floating_button"><i id="show_more_text" class="fas fa-angle-down"></i></div></div>
  </div>';
  echo "<script src=\"js/scripts.js\"></script>";
