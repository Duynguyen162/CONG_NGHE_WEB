<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Quiz</h1>

        <?php

$questions = [];//câu hỏi
$correct_answers = [];//đáp án

// Mở file và đọc dữ liệu
$file = fopen('Quiz.txt', 'r');
if ($file) {
    $question_text = ''; // Lưu câu hỏi
    $answers = []; // Lưu đáp án
    while (($line = fgets($file)) !== false) {
        $line = trim($line);

        // Lấy đáp án đúng từ dòng có "ANSWER:"
        if (substr($line, 0, 7) == "ANSWER:") {
            $correct_answers[] = substr($line, 8); // Lưu ký tự sau "ANSWER:"
            $questions[] = ['question' => $question_text, 'answers' => $answers];
            $question_text = '';
            $answers = [];
        } else {
            if (empty($question_text)) {
                $question_text = $line; // Lưu câu hỏi
            } else {
                $answers[] = $line; // Lưu đáp án
            }
        }
    }
    fclose($file);
} else {
    echo "Không thể mở file.";
}

// Hiển thị form quiz
echo '<form method="POST" action="ketqua.php" target="_blank">';
foreach ($questions as $index => $question) {
    echo '<div class="question-card">';
    echo '<p>' . ($index + 1) . '. ' . $question['question'] . '</p>';
    echo '<div class="answers">';
    foreach ($question['answers'] as $key => $answer) {
        $answer_key = substr($answer, 0, 1); // Lấy ký tự đầu tiên
        echo '<label>';
        echo '<input type="checkbox" name="answer' . $index . '" value="' . $answer_key . '">' . $answer;
        echo '</label>';
    }
    echo '</div>';
    echo '</div>';
}
// Truyền mảng đáp án đúng qua POST
foreach ($correct_answers as $index => $correct) {
    echo '<input type="hidden" name="correct_answers[]" value="' . $correct . '">';
}
echo '<button type="submit" class="btn-submit">Submit</button>';
echo '</form>';
?>

    </div>
</body>
</html>
