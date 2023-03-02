<?php
$sql = "SELECT * FROM project_document ";
$sql_select = mysqli_query($con, $sql);

if (isset($_GET['query']) && $_GET['query'] == 'xoa') {
    $id = $_GET['idProDoc'];
    $sql_xoa = "DELETE FROM project_document WHERE idProDoc = '" . $id . "'";
    $query = mysqli_query($con, $sql_xoa);
}
if (isset($_POST['sua']) && $_GET['query'] == 'sua') {
    $name = $_POST['nameDepartment'];
    $detail = $_POST['detailDepartment'];
    $sql_update = "UPDATE department SET nameDepartment = '" . $name . "', detailDepartment = '" . $detail . "' WHERE idDepartment = '$id'";
    mysqli_query($con, $sql_update);
}
?>

<link rel="stylesheet" href="../css/style.css">
<div class="document">
    <div class="right_col" role="main">
        <h3>Tài liệu cho dự án<button style=" margin-left: 400px; height: 30px; width: 150px; border: 1px solid black; border-radius: 10px ; "> <a href="index1.php?action=addDocument" style="text-decoration: none; color: black;"> Thêm tài liệu</a> </button></h1>
            <br><br><br>
            <table style="width : 60%">
                <tr>
                    <th>STT</th>
                    <th>Mô tả tài liệu</th>
                    <th>Ngày tạo</th>
                    <th>Dự án</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($sql_select)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['created_date'] ?></td>
                        <td><?php 
                            $sql1 = "SELECT * FROM project where idProject = '".$row['idProject']."'";
                            $query = mysqli_query($con, $sql1);
                            $rowss =  mysqli_fetch_array($query);
                            echo $rowss['nameProject'];
                        
                        ?></td>
                        <td>
                            <a href="?query=xoa&idProDoc=<?php echo $row['idProDoc'] ?>">Xóa</a>|
                            <a href="?query=sua?idProDoc=<?php echo $row['idProDoc'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </div>
</div>