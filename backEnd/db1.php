<?php
$host = 'db';
$user = 'root';
$password = ''; // Mật khẩu MySQL
$database = 'vegetable';

// Kết nối đến MySQL server
$conn = new mysqli($host, $user, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL server thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối đến MySQL server thành công! <br>";

    // Lấy danh sách các bảng trong cơ sở dữ liệu
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Danh sách các bảng trong cơ sở dữ liệu $database:<br>";
        while ($row = $result->fetch_assoc()) {
            echo $row['Tables_in_' . $database] . "<br>";
        }
    } else {
        echo "Không có bảng nào trong cơ sở dữ liệu $database.";
    }
}

// Đóng kết nối
$conn->close();
?>
