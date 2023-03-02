<link rel="stylesheet" href="../css/style.css">
<div class="work_list">
    <h1>Danh sách các công việc</h1>
    <table>
        <tr>
            <th style="width:200px;">Name Work</th>
            <th style="width:200px;">Deadline</th>
            <th style="width:200px;">Status</th>
        </tr>
        <?php 
        $idPWorks = $_GET['idPWorks'];
        $sql = "SELECT * FROM works  WHERE idProject = $idPWorks ";
        $query = mysqli_query($con,$sql);
        $i = 0;
        while($row = mysqli_fetch_array($query)){
            $i++;
    ?>
        <tr>
            <td><a
                    href="index.php?action=task&idWTask=<?php echo $row['idWorks'] ?>"><?php echo $row['titleWorks']?></a>
            </td>
            <td><?php echo $row['end_dateW']?></td>
            <td>
                <?php 
                if($row['status']=="Hoàn thành"){
                    
            ?>
                <i class="fa-solid fa-check"></i>

                <?php }else{?>
                <i class="fa-solid fa-x"></i>
                <?php }?>
            </td>
            <?php }?>
        </tr>
    </table>

    <div id="progresss">
        <h3>Progress</h3>
        <div id="progress">
            <div id="myProgress">0%</div>
        </div>
    </div>
    <?php 
    $sql1 = "SELECT COUNT(idWorks) as 'dem' FROM works  WHERE idProject = $idPWorks and status = 'Hoàn thành'";
    $query1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($query1);
    $sql2 = "SELECT COUNT(idWorks) as 'dem' FROM works  WHERE idProject = $idPWorks ";
    $query2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_array($query2);
    $dem1 = $row1['dem'];
    $dem2 = $row2['dem'];
    $dem = 0;
    $idPWorks = $_GET['idPWorks'];
    if($dem1!=0&&$dem2!=0){
        $dem = round((($dem1/$dem2)*100)*100)/100;
    if($dem1 == $dem2){
        $sql3 = "UPDATE `project` SET `statusP` = 'Hoàn thành' WHERE `project`.`idProject` = '".$idPWorks."'";
        mysqli_query($con,$sql3);
    }
    }
    
    echo "<script>
    var width = '".$dem."';
    var elment = document.getElementById('myProgress');
    elment.style.width = width + '%';
    elment.innerHTML = width + '%';
    </script>";
            
    ?>
</div>