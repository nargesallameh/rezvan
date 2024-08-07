<?php
// save.php

// دریافت داده‌های JSON از درخواست
$data = json_decode(file_get_contents('php://input'), true);

// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "submit";

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die(json_encode(['success' => false, 
    'message' => 'Connection failed: ' . $conn->connect_error ]));
}

// استخراج اطلاعات از داده‌های دریافتی
$userData = $data['user'];
$goodsData = $data['goods'];

// ذخیره اطلاعات کاربر در دیتابیس
$sql = "INSERT INTO user (tell, username, id, email, city) VALUES ('" . $userData['tell'] . "', '" . $userData['username'] . "', '" . $userData['id'] . "', '" .$userData['email'] . "', '" .$userData['city'] . "')";
if ($conn->query($sql) === TRUE) {
    $userId = $conn->insert_id;
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]) ;
    exit();
}

// ذخیره اطلاعات کالا در دیتابیس
$sql = "INSERT INTO goods (pro_code, pro_name, pro_count) VALUES ('" . $goodsData['pro_code'] . "', '" . $goodsData['pro_name'] . "', '" . $goodsData['pro_count'] . "')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'savedData' => ['user' => $userData, 'goods' => $goodsData]]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]) ;
}

$conn->close();
?>