<?php
    define("secret", "mikroci");
    include "../db_config.php";
    $title = "MODIFY SUBJECT";
    include "head.php";
?>
<div class="jumbotron jumbotron-fluid" style="background-color: #36F; color: #FFF;">
  <div class="container">
    <h1 class="display-4"">Modify subject</h1>
    <p class="lead">You can modify the data by clicking on the pencil icon.</p>
  </div>
</div>
<?php
    $sql = "SELECT * FROM subjects";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
        echo "
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Subject ID</th>
                        <th scope='col'>Subject name</th>
                        <th scope='col'>Modify</th>
                    </tr>
                </thead>
                <tbody>
        ";
    
        $i=0;

        while($row = mysqli_fetch_assoc($res)){
            ++$i;
            echo"
                <tr>
                    <th scope='row'>".$i."</th>
                    <td>".$row['subject_id']."</td>
                    <td>".$row['subject_name']."</td>
                    <td>
                        <button class='modifyBtn' id='modify' onClick='displayModal(x=\"".$row['subject_id']."\")'>
                            <i class='fa fa-edit'></i>
                        </button>
                    </td>
                </tr>";
        }

        echo "
            </tbody>
            </table>
        ";
    }

    else
        echo "<h1 style='color: #000; margin-left: 30px;'>There is no subject in the database.</h1>";
?>

<div id="editModal" class="myModal">
    <div class="modal-content">
        <div style="width: 100%; height: 50px;">
            <span class="close" onClick="closeModal()">&times;</span>
        </div>
        <form action="check.php?p=4" method="post">
            <input type="text" name="subjname" maxlength="20" id="modname" placeholder="New subject name" required/>
            <input type="hidden" id="indexno" name="subjid"/>
            <button type="submit"><i class="fa fa-check"></i></button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>