<?php
/**
 * Created by PhpStorm.
 * User: KÁrpi
 * Date: 2018.01.11.
 * Time: 2:01
 */

define("secret","mikroci");
include "db_config.php";

if(!(mysqli_num_rows($result)>0)) header("Location:index.php");

include "head.php";
//if($loggedin==false) header("Location:index.php");
?>

<div class="col-lg-auto profile">
    <img align="left" class="p-image-lg" src="img/profile/banner_.png" alt="Profile image"/>
    <img align="left" class="p-image-profile" src="img/profile/.png" alt="Profile image"/>
    <div class="profile-text">

    </div>
</div>

    <p>&nbsp; </p>
    <h1>Achievments:</h1>
    <div class="col-lg-auto">
        Gived Achievments.
    </div>

<?php
include "footer.php";
?>



