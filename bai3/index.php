<?php
// Đọc tệp CSV vào mảng
$sinhvien = [];
if (($handle = fopen("KTPM3_Danh_sach_diem_danh.csv", "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề cột)
    $header = array_map('trim', fgetcsv($handle, 0, ","));

    // Loại bỏ BOM nếu có
    if (substr($header[0], 0, 3) === "\xEF\xBB\xBF") {
        $header[0] = substr($header[0], 3);
    }

    // Đọc các dòng dữ liệu
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        // Kiểm tra và khớp số cột
        if (count($header) === count($data)) {
            $data[0] = strval($data[0]);  // Ép kiểu username thành chuỗi
            $sinhvien[] = array_combine($header, $data);
        } else {
            error_log("Dòng không hợp lệ: " . implode(",", $data));
        }
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2 style="text-align:center; padding: 20px;">Danh Sách Sinh Viên</h2>

<table>
    <tr>
        <th>username</th>
        <th>Password</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Lớp</th>
        <th>Email</th>
        <th>Khóa học</th>
    </tr>
    
    
    <?php 
        
        foreach ($sinhvien as $sv){
            echo"<tr>";
                echo"<td>{$sv['username']}</td>";
                echo"<td>{$sv['password']}</td>";
                echo"<td>{$sv['lastname']}</td>";
                echo"<td>{$sv['firstname']}</td>";
                echo"<td>{$sv['city']}</td>";
                echo"<td>{$sv['email']}</td>";
                echo"<td>{$sv['course1']}</td>";
            echo"</tr>";
        }
     ?>
</table>

</body>
</html>
