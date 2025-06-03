<h2>Add New Course</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.courses.store') }}" method="POST">
    @csrf
    <label for="course_name">Course Name:</label><br>
    <input type="text" name="course_name" value="{{ old('course_name') }}" required><br><br>
    <button type="submit">Add Course</button>
</form>

<p><a href="{{ route('admin.courses.index') }}">⬅ Back to Courses</a></p>
