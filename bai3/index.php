<?php
// Đọc tệp CSV vào mảng
$sinhvien = [];
if (($handle = fopen("KTPM3_Danh_sach_diem_danh.csv", "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề cột)
    $header = fgetcsv($handle, 1000, ",");
   
    
    // Đọc các dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[0] = strval($data[0]);  // Giả sử 'username' là cột đầu tiên
        // Tạo mảng sinh viên từ mỗi dòng
        $sinhvien[] = array_combine($header, $data);
    }
    fclose($handle);
}

// Hiển thị dữ liệu lên giao diện
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
