<h2>All Courses</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<p><a href="{{ route('admin.courses.create') }}">➕ Add New Course</a></p>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->course_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><a href="{{ url('/admin/dashboard') }}">⬅ Back to Dashboard</a></p>
