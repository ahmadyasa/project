<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <h1>Halaman Dashboard</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
