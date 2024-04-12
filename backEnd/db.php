<?php
$host = 'db';
$user = 'root';
$password = ''; // Mật khẩu MySQL
$database = 'vegetable';

try {
    // Kết nối đến MySQL server sử dụng PDO
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // Thiết lập chế độ lỗi để PDO ném ngoại lệ khi có lỗi SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Kết nối đến MySQL server thành công! <br>";

    // Lấy danh sách các bảng trong cơ sở dữ liệu
    $sql = "SHOW TABLES";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($tables) > 0) {
        echo "Danh sách các bảng trong cơ sở dữ liệu $database:<br>";
        foreach ($tables as $table) {
            echo $table['Tables_in_' . $database] . "<br>";
        }
    } else {
        echo "Không có bảng nào trong cơ sở dữ liệu $database.";
    }
} catch(PDOException $e) {
    echo "Kết nối đến MySQL server thất bại: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>
