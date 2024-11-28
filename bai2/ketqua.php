<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Kết quả Quiz</h1>
    <?php
    // Nhận dữ liệu từ POST
    $correct_answers = $_POST['correct_answers'] ?? [];
    $user_answers = [];
    $correct_count = 0;

    // Lấy đáp án người dùng chọn
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'answer') === 0) {
            $user_answers[] = $value;
        }
    }

    // So sánh đáp án đúng và người dùng chọn
    foreach ($correct_answers as $index => $correct) {
        if (isset($user_answers[$index]) && $user_answers[$index] == $correct) {
            $correct_count++;
        }
    }

    // Hiển thị kết quả
    echo '<p>Bạn đã trả lời đúng <strong>' . $correct_count . '</strong> trên tổng số <strong>' . count($correct_answers) . '</strong> câu hỏi.</p>';
    ?>
    <a href="index.php" class="btn-submit">Làm lại</a>
</div>
</body>
</html>
