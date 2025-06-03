<h2>Student Login</h2>
@if(session('error')) <p style="color:red;">{{ session('error') }}</p> @endif
<form method="POST" action="/login/student">
    @csrf
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
<p><a href="/register/student">Register as Student</a></p>
