<link rel="stylesheet" href="../css/style.css">
<div class="themDoc">
    <form action="" method="POST">
        <h2>Bạn cần nhập thông tin tài liệu</h2>
        <table class="tableAddDoc" cellpadding="2" cellspacing="2">
            <tr style="height: 100px;">
                <td style="width: 200px;">Mô tả tài liệu :</td>
                <td><input type="text" name="detailDoc" id="detailDoc" required></td>
            </tr>
            <tr>
                <td>Ngày tạo </td>
                <td><input type="datetime-local" name="createdate" id="createdate"></td>
            </tr>
            <tr  style="height: 100px;">
                <td style="width: 200px;">Tài liệu cho dự án</td>
                <td>
                    <select name="project" id="firstSelection">
                        <?php
                        $sql = "SELECT idDepartment FROM `user` WHERE emailUser='" . $_SESSION['email'] . "' ";
                        $query = mysqli_query($con, $sql);
                        $rows = mysqli_fetch_array($query);
                        $sql1 = "SELECT * FROM project WHERE idDepartment = '" . $rows["idDepartment"] . "' ";
                        $query1 = mysqli_query($con, $sql1);
                        while ($row = mysqli_fetch_array($query1)) {
                        ?>
                            <option selected value="<?php echo $row['idProject'] ?>">
                                <?php echo $row['nameProject'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="sub" style="border: 1px solid black; width: 200px; margin-left: 100px; margin-top: 60px; ">
            <input type="submit" name="addDocument" id="addDocument" value="Thêm tài liệu">
        </div>
    </form>


</div>
<?php
if (isset($_POST['addDocument'])) {
    $sql_add = mysqli_query($con, "insert into project_document (description, created_date, idProject) values ('".$_POST['detailDoc']."' , '".$_POST['createdate']."' , '".$_POST['project']."')  ");
    if ($sql_add) {
        echo '<script>alert("Bạn đã thêm thành công");</script>';
    } else {
        echo '<p style = "color: green">Bạn đã thêm không thành công</p>';
    }
}

?>