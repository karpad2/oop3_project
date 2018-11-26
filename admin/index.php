<?php
session_start();

define("secret","mikroci");
include "../db_config.php";
$_SESSION["admin"]=true;
$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$users=mysqli_fetch_all($result,MYSQLI_BOTH);

include ("head.php");
?>


        <div class="modal fade" id="register-mod">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h3>Register</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></div>
                    <form action="../login.php?mod=2" method="post">
                        <div class="modal-body">
                            username: <input  type="text" name="user" required="required"  class="form-control"><br>
                            password: <input  type="password" name="passwd1" required="required"  class="form-control"><br>
                            password again:<input required="required" type="password" name="passwd2" required="required" class="form-control"><br></div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="reg_button" value="Regisztrálás"></form>
                </div>
            </div>
        </div>
    </div>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
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

