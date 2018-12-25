<?php
session_start();

define("secret","mikroci");
include "../db_config.php";
$_SESSION["admin"]=true;
$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$users=mysqli_fetch_all($result,MYSQLI_BOTH);

include ("head.php");
?> <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Users:</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User:</th>
                  <th>Registration date:</th>
                  <th>User edit:</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  $i=0;
              foreach ($users as $user)
              {   ++$i;
				  echo"<tr>
                  <td><span title=\"Ez nem id, hanem sorszám.\">$i</span></td>
                  <td>{$user["username"]}</td>
                  <td>{$user["reg_date"]}</td>
                  <td><a class=\"btn btn-secondary\" href=\"../login.php?edit={$user["user_id"]}\">User edit</a></td>
                </tr>
			  ";}
			  if($i==0)
              {
                  echo"<tr><td colspan=\"3\">Nincs tanuló</td></tr>";
              }
              //var_dump($users);
			  ?>
              </tbody>
            </table>
          </div>
        </main>

    <?php include "footer.php";

