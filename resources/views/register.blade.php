<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    @if ($errors ->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    <form method="POST" action="/register">
        @csrf
        <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}"><br><br>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}"><br><br>
        </div>
        <div>
    <label for="password">Password:</label>
    <input type="password" name="password"> <br><br>

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation"> <br><br>
</div>
        <button type="submit">Register</button>
    </form>
    <br>
    <a href="/login">Go to login</a>
    
</body>
</html>