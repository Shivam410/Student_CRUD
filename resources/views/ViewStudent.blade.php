<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Student</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Student Details</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                @if($student->image)
                    <img src="{{ asset('Student_images/'.$student->image) }}" class=" img-fluid" style="height: 200px; width: 200px; object-fit: cover;">
                @else
                    <p>No image has been set</p>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Roll No</th>
                        <td>{{ $student->roll_no }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>School</th>
                        <td>{{ $student->school }}</td>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <td>{{ $student->class }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $student->phone }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $student->dob }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ ucfirst($student->gender) }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $student->address }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('Student.Index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
