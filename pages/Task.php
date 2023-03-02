<div class="task_container">
    <div class="row_task">
        <h2>List Task</h2>
        <div class="list_task">
            <form action="" method="POST">
                <?php 
                $id_Work = $_GET['idWTask'];
                    $sql = "SELECT * FROM `task` WHERE task.idWorks='".$id_Work."'";
                    $query = mysqli_query($con,$sql);
                    $i=0;
                    while($row = mysqli_fetch_array($query)){
                ?>
                <input type="checkbox" class="checkbox" name="task[]" <?php if($row['status']=='Hoàn thành'){ ?>checked
                    disabled<?php } ?> value="<?php echo $row['nameTask']?>" />
                <label for="task"><?php echo $row['nameTask']?></label></br>
                <?php }?>
                <input type="submit" name="submit_task" id="submit_task" value="SAVE">
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['task'])){
                        $checkbox_values = $_POST['task'];
                    foreach ($checkbox_values as $checkbox_value) {
                        $sql1 = "UPDATE task SET task.status = 'Hoàn thành' WHERE task.nameTask = '".$checkbox_value."'";
                        mysqli_query($con, $sql1);
                    }
                    $sql5 = "SELECT idWorks as idW FROM `task` WHERE task.nameTask = '".$checkbox_value."'";
                    $query5 = mysqli_query($con,$sql5);
                    $row5 = mysqli_fetch_array($query5);
                    $sql2 = "SELECT COUNT(task.idTask) as result  FROM task WHERE task.status='Hoàn thành' and task.idWorks = '".$row5['idW']."' ";
                    $sql3 = "SELECT COUNT(task.idTask) as result FROM task WHERE task.idWorks = '".$row5['idW']."' ";
                    $query1 = mysqli_query($con,$sql2);
                    $query2 = mysqli_query($con,$sql3);
                    $result1 = mysqli_fetch_array($query1);
                    $result2 = mysqli_fetch_array($query2);
                    $sql = "SELECT * FROM `task`";
                    $query = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($query);
                    if($result1['result']==$result2['result']){
                        
                        $sql4 = "UPDATE works  SET works.status='Hoàn thành' WHERE idWorks = '".$row5['idW']."'";
                        mysqli_query($con, $sql4);
                    }
                }
                }
            ?>
        </div>
    </div>
</div>