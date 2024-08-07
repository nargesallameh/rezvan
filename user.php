<?php 
// اتصال به پایگاه داده
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "submit";
$conn = new mysqli($servername, $username, $password, $dbname);
// بررسی وجود کاربر با ایمیل
$username = $_POST['username'];
$password = $_POST['password'];

if($username === 'admin' && $password === '12345') {
    echo 'ورود موفقیت آمیز!';
} else {
    echo 'نام کاربری یا رمز عبور اشتباه است!';
}

?>