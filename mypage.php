<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.02.
 * Time: 22:46
 */

define("secret","mikroci");
include "db_config.php";

$title="Main page";
include "head.php";
if($loggedin==false) header("Location:index.php");

$sql="SELECT * FROM upload_data join subjects s on upload_data.subject_id = s.subject_id where user_id='{$_SESSION}'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$att=mysqli_fetch_all($result,3);
?>

    <div class="jumbotron text-center">
        <h1>Welcome <?php echo $_SESSION["username"];?></h1>
    </div>
    <div class="row">
        <div class="col-md-4" >
            <h2>My Profile</h2>
            <a href="profile.php?profile_id=<?php echo$_SESSION["user_id"]; ?>"  class="btn btn-primary bg-success" >My Profile</a>
        </div>

        <div class="col-md-4" >
            <h2>Add Student to Session</h2>
            <p>This mod allows you to </p>
            <a href="#" class="btn-lg">Add attendances</a>
        </div>
        <div class="col-md-4" >
            <h2>Modify Sessions</h2>
            <p>This mod allows you to </p>
            <form method="get" action="attendances.php">
            <select name="attandances_d" class="form-control">
                <option value="" disabled selected>Choose your option</option>
                <?php
                foreach($att as $item) echo"<option value=\"{$item["weeknumber_upload_id"]}\">{$item["subject_name"]}-{$item["upload_date"]}</option>"; ?>
                    </select><br>
                <input type="submit" class="btn btn-primary bg-success">
            </form>
        </div>

    </div>
<?php include "footer.php";
