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
    <h2>Tracking</h2>
    <p>This mod allows you to follow your actions from your mobile.</p>
    <a href="tracker.php?mod=start"  class="btn btn-primary bg-success">Start!</a>
</div>

    <div class="col-md-4">
        <h2>Runs</h2>
        <p>Your runs order by time:</p>
        <form action="view.php" method="get">
        <select class="custom-select" name="watch">
        <option hidden="hidden" selected="selected" value="">Please choose...</option>
        <?php
        $sql="SELECT run_id,run_date_begin as 'run_date' FROM run WHERE user_id='{$_SESSION["user_id"]}';";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $items=mysqli_fetch_all($result,MYSQLI_BOTH);
        foreach ($items as $item)
        {
            echo"<option value=\"{$item["run_id"]}\">{$item["run_date"]}</option>";
        }
        ?>
        </select>
        <input type="submit" class="btn btn-primary bg-success" value="Show">
        </form>
    </div>

</div>
<?php include "footer.php";
