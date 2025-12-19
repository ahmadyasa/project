<h2>Form Login</h2>
@if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif
<form action="/login" method="POST">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>
