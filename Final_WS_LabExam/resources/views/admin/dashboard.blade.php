<h2>Admin Dashboard</h2>
<p><a href="/logout">Logout</a></p>

<!-- Add New Course Button -->
<p><a href="{{ route('admin.courses.create') }}">Add New Course</a></p>

<!-- Search Form -->
<form method="GET" action="/admin/search">
    Search: <input type="text" name="keyword" value="{{ request('keyword') }}">
    <button type="submit">Search</button>
</form>

<h3>All Feedbacks</h3>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($feedbacks->isEmpty())
    <p>No feedbacks found.</p>
@else
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Student</th>
            <th>Instructor</th>
            <th>Feedback</th>
            <th>Semester</th>
            <th>Year</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>{{ $feedback->student->firstname }} {{ $feedback->student->lastname }}</td>
            <td>{{ $feedback->instructor->firstname }} {{ $feedback->instructor->lastname }}</td>
            <td>{{ $feedback->feedback }}</td>
            <td>{{ $feedback->semester }}</td>
            <td>{{ $feedback->year }}</td>
            <td>{{ $feedback->date_created }}</td>
            <td>
                <form method="POST" action="/admin/feedback/{{ $feedback->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete feedback?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
