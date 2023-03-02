<link rel="stylesheet" href="../css/style.css">
<div class="themTV">
    <form action="" method="POST">
        <h2>Bạn cần nhập thông tin của người bạn muốn mời</h2>
        <table class="tableAddTV"  cellpadding="2" cellspacing="2">
        <tr style="height: 100px;">
            <td style="width: 100px;">Email :</td>
            <td ><input type="email" name="emailTV" id="emailTV" required></td>
        </tr>
    </table>
    <div class="sub" style="border: 1px solid black; width: 200px; margin-left: 100px; ">
        <input type="submit" name="addThanhVien" id="addThanhVien" value="Thêm thành viên">
    </div>
    </form>
    
    
</div>
<?php 

    $sql = "SELECT * FROM `user` WHERE emailUser='".$_SESSION['email']."'  ";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query); 
    if(isset($_POST['addThanhVien'])) {
        $idDepartment = $row['idDepartment'];
        $sql_add = mysqli_query($con, "Update user SET idDepartment = '".$idDepartment."'  WHERE emailUser = '".$_POST['emailTV']."' ");
        if($sql_add) {
            echo '<script>alert("Bạn đã thêm thành công");</script>';
            
        } else {
            echo '<p style = "color: green">Bạn đã thêm không thành công</p>';
        }
    }

?>