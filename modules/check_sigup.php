<?php 
//@Hàm : is_username 
//@Tham số: $username cần kiểm tra
//@Trả về: True nếu đúng định dạng username

function is_username($username) {
    $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($parttern, $username))
        return true;
}
//@Hàm : is_password 
//@Tham số: Chuổi password cần kiểm tra
//@Trả về: True nếu đúng định dạng password
function is_password($password) {
    $parttern = "/^[a-z0-9_-]{6,18}$/";
    if (preg_match($parttern, $password))
        return true;
}

function is_email($email){
    $parttern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
    if (preg_match( $parttern, $email))
        return true;
}
function cfpass($pass , $cfpass){
    if($pass == $cfpass){
        return true;
    }
}
function set_value($label_field) {
    global $$label_field;
    if (isset($$label_field))
        echo $$label_field;
}
function form_error($label_field) {
    global $error;
    if (isset($error[$label_field])) {
        echo "<span style=\"color: red;\">{$error[$label_field]}</span><br/>";
    }
}
?>