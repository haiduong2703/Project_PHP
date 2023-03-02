<?php
require '../modules/check_sigup.php';
/*
 * BIỂU THỨC CHÍNH QUY
 * 1.Username : /^[A-Za-z0-9_\.]{6,32}$/
 * 2.Password : /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/ 
 * 3.Email: /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/
 */

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Phất cờ
    $error = array(); // Chưa có lỗi
    // Kiểm tra lỗi username
    if (!is_username($_POST['username'])) {
        $error['username'] = "Username is not in the correct format";
    } else {
        $username = $_POST['username'];
    }
    //Kiểm tra lỗi password
    if (!is_password($_POST['password'])) {
        $error['password'] = "Password is not formatted correctly";
    } else {
        $password = $_POST['password'];
    }

    //kiểm tra lỗi email
    if (!is_email($_POST['email'])) {
        $error['email'] = "Invalid email format";
    } else {
        $email = $_POST['email'];
    }

    // kiểm tra lỗi cfpass
    if (!cfpass($_POST['password'], $_POST['cfpass'])) {
        $error['cfpass'] = "You need to enter the correct password above !";
    } else {
        $cfpass = $_POST['cfpass'];
    }
    // Kết luận
    if (empty($error)) {
        header("Location: ../index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/sigup.css">
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
                <h1>SignUp</h1>
                <table>
                    <tr>
                        <td>Full name</td>
                        <td><input type="text" name="username" id="" required></td>
                        <td> <?php form_error('username'); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" id="" required></td>
                        <td><?php form_error('email'); ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" id="" required></td>
                        <td><?php form_error('password'); ?></td>
                    </tr>
                    <tr>
                        <td>Confirm password</td>
                        <td><input type="password" name="cfpass" id="" required></td>
                        <td><?php form_error('cfpass'); ?></td>
                    </tr>
                    <tr id="sm">
                        <td colspan="2"> <input type="submit" name="sigup" id="sigup" value="Sigup" style="margin-right:20px ;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="r2">
            <p>Do you have an account?</p>
            <button>
                <a href="./login.php"> Login </a>
            </button>
        </div>
    </div>
</body>

</html>