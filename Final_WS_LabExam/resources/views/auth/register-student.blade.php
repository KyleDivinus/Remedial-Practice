<h2>Student Registration</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register/student">
    @csrf
    First Name: <input type="text" name="firstname" value="{{ old('firstname') }}" required><br>
    Last Name: <input type="text" name="lastname" value="{{ old('lastname') }}" required><br>
    Username: <input type="text" name="username" value="{{ old('username') }}" required><br>
    Password: <input type="password" name="password" required><br>
    Course: <select name="course_id" required>
        <option value="">Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                {{ $course->course_name }}
            </option>
        @endforeach
    </select><br>
    Date of Birth: <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required><br>
    Gender: <select name="gender" class="form-control" required>
  <option value="">Select Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>

    <button type="submit">Register</button>
</form>
