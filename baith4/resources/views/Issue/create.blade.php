<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
</head>

<body>


    <h1 style="margin: 50px 50px">Thêm vấn đề mới</h1>
    <form action="{{ route('Issue.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">mã vấn đề</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Tên máy tính</label>
            <select class="form-control" id="computer_id" name=computer_id required>
                @foreach($computer as $intem)
                    <option value="{{ $intem->id }}">{{ $intem->computer_name }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="program" class="form-label">Tên phiên bản</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="mb-3">
            <label for="supervisor" class="form-label">Người báo cáo sự cố</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" required>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Thời gian báo cáo</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date" required>
        </div>
        <div class="mb-3">
            <label for="submission_date" class="form-label">Mức độ</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="defense_date" class="form-label">Trạng thái hiện tại</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>