<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <div class="left">
            <img src="../image/bg_lg.png" alt="">
        </div>
        <div class="right">
            <form action="" method="post">
                <div class="logo">
                    <img src="../image/logo.jpg" alt="">
                </div>
                <h1>Login</h1>
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pass" id="pass" required></td>
                    </tr>
                    <tr id="sm">
                        <td colspan="2"><input type="submit" name="login" id="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php 
        include("../includes/common.php");
        
        if(isset($_POST['login'])){
            $sql = "SELECT * FROM `user` WHERE emailUser='".$_POST['email']."' ";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            if($row['emailUser']==$_POST['email']){
                if($row['passUser']==$_POST['pass']){
                $_SESSION['email'] = $_POST['email'];   
                    if($row['role']=="Nhân viên"){
                        header('Location: ../index.php');
                    }
                    if($row['role']=="Trưởng phòng"){
                        header('Location: ../index1.php');
                    }
                }else{
                    echo "<script>alert('Mật khẩu không đúng vui lòng nhập lại')</script>";
                }
            }else{
                echo "<script>alert('Tài khoản không tồn tại vui lòng kiểm tra lại')</script>";
            }
        }
    ?>
</body>

</html>