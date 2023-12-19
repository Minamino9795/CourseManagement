<?php
// Lấy itemId từ yêu cầu Ajax
$itemId = $_POST['itemId'];

// Thực hiện xử lý dựa trên itemId để lấy nội dung đầy đủ
// Ví dụ: Truy vấn cơ sở dữ liệu để lấy nội dung đầy đủ của mục với itemId tương ứng

// Kết nối đến cơ sở dữ liệu
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn cơ sở dữ liệu để lấy nội dung đầy đủ của mục với itemId tương ứng
$sql = "SELECT full_content FROM your_table WHERE id = $itemId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy nội dung đầy đủ từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $itemContent = $row['full_content'];

    // Trả về nội dung đầy đủ
    echo $itemContent;
} else {
    echo "Không tìm thấy nội dung";
}

// Đóng kết nối
$conn->close();
?>