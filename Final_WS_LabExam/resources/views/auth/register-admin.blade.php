<h2>Admin Registration</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register/admin">
    @csrf
    Username: <input type="text" name="username" value="{{ old('username') }}" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>

<p><a href="/login/admin">Back to Admin Login</a></p>
