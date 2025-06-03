<h2>Admin Search Results for "{{ $keyword }}"</h2>
<p><a href="/admin/dashboard">Back to Dashboard</a></p>

<h3>Feedbacks</h3>
@if(isset($feedbacks) && $feedbacks->isEmpty())
    <p>No feedback found.</p>
@elseif(isset($feedbacks))
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Student</th>
        <th>Instructor</th>
        <th>Feedback</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Date</th>
    </tr>
    @foreach ($feedbacks as $feedback)
    <tr>
        <td>{{ $feedback->student->firstname }} {{ $feedback->student->lastname }}</td>
        <td>{{ $feedback->instructor->firstname }} {{ $feedback->instructor->lastname }}</td>
        <td>{{ $feedback->feedback }}</td>
        <td>{{ $feedback->semester }}</td>
        <td>{{ $feedback->year }}</td>
        <td>{{ $feedback->date_created }}</td>
    </tr>
    @endforeach
</table>
@endif
