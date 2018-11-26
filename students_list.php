<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 22:36
 */


define("secret","mikroci");
include "db_config.php";

$sql="SELECT students.Student_id,SUM(Point),CONCAT(students_badge.Badge_ID+',') FROM students join students_points on students.Student_id = students_points.Student_id join students_badge on students_badge.Student_id=students_points.Student_id
GROUP BY students_points.Student_id";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$users=mysqli_fetch_all($result,MYSQLI_BOTH);


    echo '
  <div class="jumbotron text-center">
        <h1>Welcome! :)</h1>
       </div>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Students List:</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Student index:</th>
                  <th>Point:</th>
                  <th>Badges:</th>
                </tr>
              </thead>
              <tbody>';

			  $i=0;
              foreach ($users as $user) {
                  ++$i;
                  echo "<tr>
                  <td><span title=\"Ez nem id, hanem sorszám.\">$i</span></td>
                  <td>{$user["username"]}</td>
                  <td>{$user["reg_date"]}</td>
                  <td></td>
                </tr>";

              }
            if($i==0)
        {
        echo"<tr><td colspan=\"4\">Nincs tanuló</td></tr>";
        }
              echo '
              </tbody>
            </table>
          </div>
        </main>

';
