<?php
session_start();
$title = "Teacher page";
define("secret","mikroci");
include "../db_config.php";
$_SESSION["admin"]=true;
$sql="SET NAMES utf8";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
$sql="SELECT * FROM subjects";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$subjects=mysqli_fetch_all($result,MYSQLI_BOTH);

include ("head.php");

if(isset($_POST["week"]) and isset($_POST["student"])and isset($_POST["modify"]))
{
  //var_dump($_POST);
  // foreach ($_POST as $key=>$value) $_POST[$key]=mysqli_escape_string($conn,$value);

  $sql="select attendant_modify('{$_POST["week"]}','{$_POST["student"]}',{$_POST["modify"]}) as 'attendant'";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}

$sql="SELECT * from badges where  badge_limit<0";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$res=mysqli_fetch_all($result,3);



?> 
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <div class="table-responsive">
  <?php
    if (isset($_GET["subject"]) && !empty($_GET["subject"])) {
      if(isset($_POST["badge"])and isset($_POST["student"]))
      {
        $sql="select add_badge('{$_GET["subject"]}','{$_POST["student"]}','{$_SESSION["user_id"]}','{$_POST["badge"]}')";
        $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      }

      $id = $_GET["subject"];
      $sql="SELECT * FROM upload_data WHERE subject_id='$id'";
      $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      $upload=mysqli_fetch_all($result,MYSQLI_BOTH);
      if(count($upload)==0) {
        echo'<div>Nincs adat ebből a tantárgyból</div>';
      }
      else {
        echo "
        <table class=\"table table-striped\">
          <tbody>
            <tr>
              <td>#</td>
              <td>Index</td>
              <td>Name</td>
              <td>Give Badge</td>";
        for ($i = 1; $i <= count($upload); $i++) {
          echo "
              <td>w-{$upload[$i-1]["weeknumber"]}</td>    
          ";
        }
        echo "
            </tr>";
        $sql="SELECT * FROM students_subject join students s on students_subject.student_id = s.student_id WHERE subject_id='$id'";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $students=mysqli_fetch_all($result,MYSQLI_BOTH);

        $sql="SELECT l.weeknumber_upload_id as 'weeknumber', l.student_id as 'student_id', l.Attendant as 'attendant' from list_student_by_attendances l join upload_data u on l.weeknumber_upload_id = u.weeknumber_upload_id WHERE u.subject_id='$id' Order by student_id, weeknumber";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $attendances=mysqli_fetch_all($result,MYSQLI_BOTH);

        for ($i = 1; $i <= count($students); $i++) {
          $student_id=$students[$i-1]["student_id"];
          $student_name=$students[$i-1]["student_name"];
          echo "
            <tr>
              <td>$i</td>
              <td>{$student_id}</td>
              <td>{$student_name}</td>
          ";
          echo"<td><form action=\"#\" method=\"post\">
                    <input type=\"hidden\" name='student' value='{$student_id}'/> 
                     <select name=\"badge\">";
          $x = ($i-1) * count($upload);
          foreach ($res as $re) echo"<option value=\"{$re["badge_id"]}\">{$re["badge_name"]}</option>";
          echo "</select><input type='submit' value=\"Badge hozzáadása\"/></form></td>";
          for($j = $x; $j < $x + count($upload); $j++) {
            $week=$attendances[$j]["weeknumber"];
            echo "
            <td>
            <form action=\"#\" method=\"post\">
            <input type=\"hidden\" name='week' value='{$week}'/>
            <input type=\"hidden\" name='student' value='{$student_id}'/>
            <input type=\"hidden\" name='modify' value='".($attendances[$j]["attendant"]=="0"?"1":"0")."'/>
            <input style='background-color: ".($attendances[$j]["attendant"]=="0"?"#a43343":"#5375AF").";border: none;height: 40px;
              border-radius: 2px;
              transition: 0.3s;
              color: #fff;' type=\"submit\" value='{$attendances[$j]["attendant"]}'/>
            </form>
            </td>
          ";
          }
          echo "</tr>";
        }
        echo "<tr><td>All:</td><td></td><td></td><td></td>";
        for ($j = 0; $j < count($upload); $j++) {
          $week = $upload[$j]["weeknumber_upload_id"];
          $sql = "SELECT count(student_id) as 'count' FROM list_student_by_attendances WHERE weeknumber_upload_id=$week and Attendant=1;";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $attendances = mysqli_fetch_assoc($result);
          echo "<td>{$attendances["count"]}</td>";
        }
        echo"</tr>
          </tbody>           
        </table>";
      }
    }
    else {
      echo "
        <form action=\"../admin/\" method=\"get\">
          <select name=\"subject\">;";
        foreach ($subjects as $subject) {
          echo "<option value=\"{$subject["subject_id"]}\">{$subject["subject_name"]}</option>";
        }
        echo "
          </select>
          <button type=\"Submit\">Choose</button>
        </form>";
    }
?>
  </div>
</main>

<?php include "footer.php";

