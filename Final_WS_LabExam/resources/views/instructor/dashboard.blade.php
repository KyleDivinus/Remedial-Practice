<h2>Instructor Dashboard</h2>
<p><a href="/logout">Logout</a></p>

<h3>Received Feedback</h3>

@if ($feedbacks->isEmpty())
    <p>No feedback received yet.</p>
@else
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Student</th>
            <th>Feedback</th>
            <th>Semester</th>
            <th>Year</th>
            <th>Date</th>
        </tr>
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>
                {{ $feedback->student->firstname ?? 'N/A' }}
                {{ $feedback->student->lastname ?? '' }}
            </td>
            <td>{{ $feedback->feedback }}</td>
            <td>{{ $feedback->semester }}</td>
            <td>{{ $feedback->year }}</td>
            <td>
                {{ \Carbon\Carbon::parse($feedback->date_created)->format('F d, Y h:i A') }}
            </td>
        </tr>
        @endforeach
    </table>
@endif
