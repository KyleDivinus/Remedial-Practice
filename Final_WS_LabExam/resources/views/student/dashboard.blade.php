<h2>Student Dashboard</h2>
<p><a href="/logout">Logout</a></p>

<h3>Registered Instructors</h3>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Give Feedback</th>
    </tr>
    @foreach ($instructors as $instructor)
    <tr>
        <td>{{ $instructor->firstname }} {{ $instructor->lastname }}</td>
        <td>{{ $instructor->course->course_name ?? 'No Course' }}</td>
        <td>
            <form method="POST" action="/student/feedback/{{ $instructor->id }}">
    @csrf
    Feedback:<br>
    <textarea name="message" required></textarea><br> <!-- change to 'message' to match controller -->
    Semester:
    <select name="semester" required>
        <option value="">Select Semester</option>
        <option value="1st Sem">1st Sem</option>
        <option value="2nd Sem">2nd Sem</option>
    </select><br>
    Year:
    <input type="number" name="year" value="{{ date('Y') }}" required><br>
    <button type="submit">Submit Feedback</button>
</form>

        </td>
    </tr>
    @endforeach
</table>
