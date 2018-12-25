<?php
    if(isset($_GET['s'])){
        if($_GET['s']==1)
            echo "<script type='text/javascript'>alert('Subject was successfully added.');</script>";
        
        else
            echo "<script type='text/javascript'>alert('Failed to add subject!');</script>";
    }

    define("secret", "mikroci");
    include "../db_config.php";
    $title = "ADD SUBJECT";
    include "head.php";
?>

<div id="container">
    <div style="width: 100%; text-align: center"><h1>ADD SUBJECT</h1></div>
    <hr>
    <form action="check.php?p=2" method="post">
        <input type="text" name="subjid" maxlength="5" placeholder="Subject id" required/>
        <input type="text" name="subjname" maxlength="30" placeholder="Subject name" required/>
        <button type="submit" title="Click to add student"><i class="fa fa-plus-square"></i></button>
    </form>
</div>

<?php include "footer.php"; ?>