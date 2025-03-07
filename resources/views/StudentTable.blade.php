<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Student List</h2>
        <div class="d-flex justify-content-end p-3">
            <a class="btn btn-outline-primary btn-lg px-4 py-2" href="{{ route('Add.View') }}">Add About</a>
        </div>
        <form method="GET" action="{{ route('Student.Index') }}" class="mb-3">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-5 text-end">
                    <input type="text" name="search" class="form-control" placeholder="Search name here..."
                        value="{{ request('search') }}">

                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">Search</button>

                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th><a
                            href="{{ route('Student.Index', ['sort_field' => 'roll_no', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Roll
                            No</a></th>
                    <th><a
                            href="{{ route('Student.Index', ['sort_field' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Name</a>
                    </th>
                    <th scope="col">Address</th>
                    <th scope="col">Class</th>


                    <th scope="col">View</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->class }}</td>
                        <td>
                            <a href="{{ route('View.Student', $student->id) }}" class="btn btn-success btn-sm">View</a>
                        </td>
                        <td>
                            <a href="{{ route('Edit.Student', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('Delete.Student', $student->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>

    <!-- Bootstrap JS (Optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
