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

// Kiểm tra nếu có ID sản phẩm cần chỉnh sửa
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];

    // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
    $sql = "SELECT * FROM flowers WHERE id = $editId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $flower = $result->fetch_assoc();
    } else {
        echo "Sản phẩm không tồn tại.";
        exit();
    }

    // Xử lý khi người dùng gửi form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $imgPath = $_POST['img']; // Lấy URL ảnh từ người dùng

        // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        $sql = "UPDATE flowers SET name = '$name', description = '$description', img = '$imgPath' WHERE id = $editId";

        if ($conn->query($sql) === TRUE) {
            echo "Sản phẩm đã được cập nhật thành công!";
            header("Location: index.php"); // Chuyển hướng về trang chính sau khi cập nhật
            exit();
        } else {
            echo "Lỗi khi cập nhật sản phẩm: " . $conn->error;
        }
    }
} else {
    echo "Không có sản phẩm để chỉnh sửa.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa sản phẩm hoa</h1>
    <form action="edit.php?edit=<?php echo $flower['id']; ?>" method="POST">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($flower['name']); ?>" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($flower['description']); ?></textarea><br><br>

        <label for="img">URL ảnh:</label><br>
        <input type="text" id="img" name="img" value="<?php echo htmlspecialchars($flower['img']); ?>" required><br><br>

        <p>Ảnh hiện tại:</p>
        <img src="<?php echo $flower['img']; ?>" alt="Ảnh hiện tại" style="max-width: 200px; margin-bottom: 10px;"><br>

        <button type="submit">Cập nhật sản phẩm</button>
    </form>
</body>
</html>
