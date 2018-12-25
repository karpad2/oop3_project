<?php
    define("secret", "mikroci");
    include "../db_config.php";
    $title = "MODIFY STUDENT";
    include "head.php";
?>
<div class="jumbotron jumbotron-fluid" style="background-color: #36F; color: #FFF;">
  <div class="container">
    <h1 class="display-4"">Modify student</h1>
    <p class="lead">You can modify the data by clicking on the pencil icon.</p>
  </div>
</div>
<?php
    $sql = "SELECT * FROM students";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
        echo "
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Index number</th>
                        <th scope='col'>Student name</th>
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
                    <td>".$row['student_id']."</td>
                    <td>".$row['student_name']."</td>
                    <td>
                        <button class='modifyBtn' id='modify' onClick='displayModal(x=".$row['student_id'].")'>
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
        echo "<h1 style='color: #000; margin-left: 30px;'>There is no student in the database.</h1>";
?>

<div id="editModal" class="myModal">
    <div class="modal-content">
        <div style="width: 100%; height: 50px;">
            <span class="close" onClick="closeModal()">&times;</span>
        </div>
        <form action="check.php?p=3" method="post">
            <input type="text" name="studname" maxlength="20" id="modname" placeholder="New student name" required/>
            <input type="hidden" id="indexno" name="indexno"/>
            <button type="submit"><i class="fa fa-check"></i></button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>