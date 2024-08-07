<?php
// اتصال به دیتابیس
$conn = mysqli_connect("localhost", "root", "", "submit");
// چک کردن وجود کاربر
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 1) {
    // کاربر وجود دارد، وارد سیستم شود
    echo "خوش آمدید!";
} else {
    // کاربر وجود ندارد، پیام ثبت نام کنید نمایش داده شود
    echo "پیام ثبت نام کنید";
}
// قطع اتصال به دیتابیس
mysqli_close($conn);
?>
