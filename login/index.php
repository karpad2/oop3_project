<?php
/**
 * Created by PhpStorm.
 * User: Piszi
 * Date: 2018.01.05.
 * Time: 13:49
 */
$title="Login";

include "../head.php";
define("secret","mikroci");
include "../db_config.php";

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) header("Location: ../admin/");

if (isset($_POST["user"]) && isset($_POST["passwd"])) {
    $user = mysqli_escape_string($conn, $_POST["user"]);
    $pass = md5(SALT . mysqli_escape_string($conn, $_POST["passwd"]) . SALT);

    $sql = "SELECT user_id,username FROM users WHERE (username = '$user' AND password = '$pass');";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_all($result,MYSQLI_BOTH);
        var_dump($item);
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $item["user_id"];
        $_SESSION["username"] = $item["username"];

        header("Location: ../admin");
    } 
    else {
        echo '<div class="login_error">A bevitt adatok hibásak!</div>';
    }
}
else {
echo "  
    <div class=\"login_container\">
        <i class=\"profile_icon fas fa-user-circle\"></i>
        <div class=\"login_header\">Login</div>
        <form id=\"form1\" action=\"../login/\" method=\"post\">
            <div class=\"input_container\">
            <i class=\"fas fa-user\"></i>
            <input type=\"text\" name=\"user\" placeholder=\"Username:\" class=\"form-control\">
            </div><br>
            <div class=\"input_container\">
            <i class=\"fas fa-key\"></i>
            <input type=\"password\" name=\"passwd\" placeholder=\"Password:\" class=\"form-control\">
            </div>
            <button type=\"Submit\" form=\"form1\" class=\"login_btn\" value=\"Login\"><i class=\"fas fa-sign-in-alt\"></i></button>
        </form>
    </div>";}
?>
</div>
</body>
</html>