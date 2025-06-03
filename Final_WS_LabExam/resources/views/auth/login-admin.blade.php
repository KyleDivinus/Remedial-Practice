<h2>Admin Login</h2>
@if(session('error')) <p style="color:red;">{{ session('error') }}</p> @endif
<form method="POST" action="/login/admin">
    @csrf
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
