<?php
    if(isset($_GET['s'])){
        if($_GET['s']==1)
            echo "<script type='text/javascript'>alert('Student was successfully added.');</script>";
        
        else
            echo "<script type='text/javascript'>alert('Failed to add student!');</script>";
    }

    define("secret", "mikroci");
    include "../db_config.php";
    $title = "ADD STUDENT";
    include "head.php";
?>
<div id="container">
    <div style="width: 100%; text-align: center"><h1>ADD STUDENT</h1></div>
    <hr>
    <form action="check.php?p=1" method="post">
        <input type="text" name="index" maxlength="8" placeholder="Index number" required/>
        <input type="text" name="name" maxlength="20" placeholder="Student name" required/>
        <button type="submit" title="Click to add student"><i class="fa fa-plus-square"></i></button>
    </form>
</div>

<?php include "footer.php"; ?>