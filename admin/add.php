<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "flower_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $img = $_POST['img'];

    // Câu lệnh SQL để thêm sản phẩm vào cơ sở dữ liệu
    $sql = "INSERT INTO flowers (name, description, img) VALUES ('$name', '$description', '$img')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được thêm thành công!";
        header("Location: index.php"); // về trang chính sau khi thêm
        exit();
    } else {
        echo "Lỗi khi thêm sản phẩm: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Thêm mới sản phẩm</title>
</head>
<body>
    <h1>Thêm mới sản phẩm hoa</h1>
    <form action="add.php" method="POST">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="img">URL ảnh:</label><br>
        <input type="text" id="img" name="img" required><br><br>

        <button type="submit">Thêm sản phẩm</button>
    </form>
</body>
</html>
