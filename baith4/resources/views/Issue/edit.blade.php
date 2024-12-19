<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cập nhật thông tin đồ án</title>
</head>

<body>

    <h1 style="margin: 50px 50px">Cập nhật thông tin đồ án</h1>

    <form action="{{ route('Issue.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id" class="form-label">Mã vấn đề</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $issue->id }}" required readonly>
        </div>

        <div class="mb-3">
            <label for="computer_id" class="form-label">Tên máy tính</label>
            <select class="form-control" id="computer_id" name="computer_id" required>
                @foreach($computer as $computers)
                    <option value="{{ $computers->id }}" {{ $computers->id == $issue->computer_id ? 'selected' : '' }}>
                        {{ $computers->computer_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Tên phiên bản</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $issue->computer->model }}"
                required>
        </div>

        <div class="mb-3">
            <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by"
                value="{{ $issue->reported_by }}" required>
        </div>

        <div class="mb-3">
            <label for="reported_date" class="form-label">Thời gian báo cáo</label>
            <input type="date" class="form-control" id="reported_date" name="reported_date"
                value="{{ $issue->reported_date ? \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d') : '' }}"
                required>

        </div>


        <div class="mb-3">
            <label for="urgency" class="form-label">Mức độ</label>
            <select class="form-control" id="urgency" name="urgency" required>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái hiện tại</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>

</body>

</html>