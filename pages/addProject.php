<link rel="stylesheet" href="../css/style.css">
<div class="Project">
    <form action="" method="POST">
        <table class="tableAdd"  cellpadding="2" cellspacing="2">
        <tr>
            <td>Tên dự án :</td>
            <td><input type="text" name="nameProject" id="nameProject"></td>
        </tr>
        <tr>
            <td>Ngày bắt đầu :</td>
            <td><input type="datetime-local" name="startdate" id="startdate"></td>
        </tr>
        <tr>
            <td>Ngày kết thúc :</td>
            <td><input type="datetime-local" name="enddate" id="enddate"></td>
        </tr>
    </table>
    <div class="sub">
        <input type="submit" name="add" id="add" value="Thêm mới dự án">
    </div>
    </form>
    
    
</div>
<?php 
    $sql = "SELECT idDepartment FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query); 
    if(isset($_POST['add'])) {
        $name = $_POST['nameProject'];
        $start_dateP = $_POST['startdate'];
        $end_dateP = $_POST['enddate'];
        $statusP = 'Chưa hoàn thành';
        $idDepartment = $row['idDepartment'];
        $sql_add = mysqli_query($con, "Insert into project (nameProject, start_dateP, end_dateP, statusP, idDepartment) VALUES ('".$name."', '".$start_dateP."', '".$end_dateP."', '".$statusP."', '".$idDepartment."')");
        if($sql_add) {
            echo '<script>alert("Bạn đã thêm dự án  thành công");</script>';
            
        } else {
            echo '<p style = "color: green">Bạn đã thêm dự án không thành công</p>';
        }
    }

?>