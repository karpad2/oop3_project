<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 22:36
 */


define("secret","mikroci");
include "db_config.php";
$sql="SET NAMES utf8";
mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql="SELECT * FROM list_student_by_points";

//$sql="SELECT Student_id FROM students ";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$users=mysqli_fetch_all($result,MYSQLI_BOTH);

$badge[0][0] = "Activity.svg"; $badge[0][1] = "#cd7f32";
$badge[1][0] = "B_Activity.svg"; $badge[1][1] = "#cd7f32";
$badge[2][0] = "S_Activity.svg"; $badge[2][1] = "#c0c0c0";
$badge[3][0] = "G_Activity.svg"; $badge[3][1] = "#ffd700";

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
        $max=$users[0]["points"];
        //foreach ($users as $user) {
        for ($i = 1; $i <= 5; $i++) {
          //++$i;
          $current=$users[$i-1]["points"];
          $user = $users[$i-1];
          $percent = floor($current / $max * 100);
          $current=number_format($current, 0, " ", " ");
          if ($percent == 0) $percent++;

          $rand = $user["cnt"];

          echo "
          <tr>
            <th scope=\"row\"><span class=\"number\" title=\"Ez nem id, hanem sorszám.\">$i.</span></th>
            <td>
              <div class=\"student_id\">{$user["student_id"]}</div>
              <div class=\"progress_container\"><div class=\"progressBar\" style=\"width:{$percent}%\"></div></div>
            </td>
            <td><div class=\"student_points\">{$current}<br>points</div></td>
            <td>
              <div class=\"badge_container\">";
              if ($rand == 0)
                echo "<img src=\"img/badges/{$badge[$rand][0]}\">";
              else {
                $badge_num = floor($rand / 5) + 1;
                echo "<img src=\"img/badges/{$badge[$badge_num][0]}\">";
                $mod = ($badge_num - 1) == 0 ? $rand-1 : ($rand-1) % (4 * ($badge_num - 1));
                for ($j = 0; $j < $mod; $j++)
                  echo "<i style=\"color:{$badge[$badge_num][1]}\" class=\"fas fa-star\"></i>";
              }
            echo "
              </div>
            </td>
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
          for ($i = 6; $i < count($users); $i++) {
            //++$i;
            $current=$users[$i-1]["points"];
            $user = $users[$i-1];
            $percent = floor($current / $max * 100);
            $current=number_format($current, 0, " ", " ");
            if ($percent == 0) $percent++;

            $rand = $user["cnt"];

            echo "
            <tr>
              <th scope=\"row\"><div class=\"number\">$i.</div></th>
              <td>
                <div class=\"student_id\">{$user["student_id"]}</div>
                <div class=\"progress_container\"><div style=\"width:{$percent}%\" class=\"progressBar\"></div></div>
              </td>
              <td><div class=\"student_points\">{$current}<br>points</div></td>
              <td>
              <div class=\"badge_container\">";
              if ($rand == 0)
                echo "<img src=\"img/badges/{$badge[$rand][0]}\">";
              else {
                $badge_num = floor($rand / 5) + 1;
                echo "<img src=\"img/badges/{$badge[$badge_num][0]}\">";
                $mod = ($badge_num - 1) == 0 ? $rand-1 : ($rand-1) % (4 * ($badge_num - 1));
                for ($j = 0; $j < $mod; $j++)
                  echo "<i style=\"color:{$badge[$badge_num][1]}\" class=\"fas fa-star\"></i>";
              }
            echo "
              </div>
              </td>
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
