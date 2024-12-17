<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Viết</title>
    <!-- Thêm Bootstrap từ CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Thêm Bài Viết Mới</h1>
        
        <!-- Form Thêm Bài Viết -->
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu Đề:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Nội Dung:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <!-- Thêm Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
