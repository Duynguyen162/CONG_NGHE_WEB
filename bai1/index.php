<?php
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
$product = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "styles.css">
    <title>Document</title>
</head>
<body>
    <h1>Trang chủ</h1>
    <div class="container">
    
    <?php foreach($product as $flower): ?>
        <div class="card">
            <p><?= htmlspecialchars($flower['name']) ?></p>
            <img src="<?= htmlspecialchars($flower['img']) ?>" alt="Ảnh hoa">
            <p><?= htmlspecialchars($flower['description']) ?></p>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>