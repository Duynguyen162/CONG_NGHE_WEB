<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Posts</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh sách Posts</h2>

        <!-- Nút Thêm -->
        <div class="mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Thêm Bài Viết</a>
        </div>

        <!-- Bảng hiển thị dữ liệu -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                       
                        <td>
                            <!-- Nút Sửa -->
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Sửa</a>

                            <!-- Nút Xóa -->
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Link Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
