<?php 
    $sql = "SELECT idDepartment FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
    $query = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($query);
    $sql1 = "SELECT * FROM user WHERE idDepartment = '".$rows["idDepartment"]."' ";
    $sql_select = mysqli_query($con, $sql1);

?>
<link rel="stylesheet" href="../css/style.css">
<div class="tvDepartment">
    <h2>Danh Sách Thành Viên Của Phòng <button style=" margin-left: 400px; height: 30px; width: 150px; border: 1px solid black; border-radius: 10px ; "><a href="index1.php?action=addThanhVien" style="text-decoration: none; color: black;">Thêm thành viên</a></button></h2>
    <br><br>
    <table style="width : 65%">
        <tr>
            <th>STT</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Giới tính</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Quản lý</th>
        </tr>
        <?php
        $i = 0;
        while ($rowss= mysqli_fetch_array($sql_select)) {
            $i++;
        ?>
            <tr>
                
                <td><?php echo $i ?></td>
                <td><?php echo $rowss['nameUser'] ?></td>
                <td><?php echo $rowss['emailUser'] ?></td>
                <td><?php echo $rowss['passUser'] ?></td>
                <td><?php echo $rowss['sex'] ?></td>
                <td><?php echo $rowss['SDT'] ?></td>
                <td><?php echo $rowss['Adress'] ?></td>
                <td>
                    <a href="?query=xoa&idUser=<?php echo $row['idUser'] ?>">Xóa</a>|
                    <a href="detail_User.php?idUser=<?php echo $row['idUser'] ?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>