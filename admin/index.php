<?php
session_start();

// Kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "flower_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ MySQL
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Xóa sản phẩm
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']); // Đảm bảo dữ liệu an toàn
    $sql = "DELETE FROM flowers WHERE id = $deleteId";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Tải lại trang sau khi xóa
        exit();
    } else {
        echo "Lỗi xóa: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <a href="add.php" target="_blank">
        <button class="add-button">Thêm mới</button>
    </a>
    <table>
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($products as $flower): ?>
                <tr>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['description']) ?></td>
                    <td><img src="<?= htmlspecialchars($flower['img']) ?>" alt="Ảnh hoa" style="width: 100px; height: auto;"></td>
                    <td><a href="edit.php?edit=<?= $flower['id'] ?>" target="_blank" class="edit-icon">✏️</a></td>
                    <td><a href="?delete=<?= $flower['id'] ?>" class="delete-icon" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
