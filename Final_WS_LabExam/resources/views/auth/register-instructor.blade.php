<h2>Instructor Registration</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register/instructor">
    @csrf

    First Name: 
    <input type="text" name="firstname" value="{{ old('firstname') }}" required><br>

    Last Name: 
    <input type="text" name="lastname" value="{{ old('lastname') }}" required><br>

    Username: 
    <input type="text" name="username" value="{{ old('username') }}" required><br>

    Password: 
    <input type="password" name="password" required><br>

    Course: 
   <select name="course_id" required>
    <option value="">Select Course</option>
    @foreach($courses as $course)
        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
            {{ $course->course_name }}
        </option>
    @endforeach
</select>
<br>

    <button type="submit">Register</button>
</form>

<p><a href="/login/instructor">Back to Login</a></p>
