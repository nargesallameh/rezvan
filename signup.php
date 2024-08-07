<?php
// اتصال به دیتابیس
$connection = mysqli_connect("localhost", "root", "", "submit");

// چک کردن اتصال
if ($connection === false) {
    die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

// دریافت اطلاعات از فرم
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
// اضافه کردن اطلاعات به دیتابیس
$sql = "INSERT INTO users (email,password,username) VALUES ('$email', '$password','$username')";

if (mysqli_query($connection, $sql)) {
    echo "اطلاعات با موفقیت به دیتابیس اضافه شد.";
} else {
    echo "خطا در اضافه کردن اطلاعات: " . mysqli_error($connection);
}
// بستن اتصال
mysqli_close($connection);
?>
