<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    <form method="POST" action="/login">
        @csrf
        <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}"><br><br>
        </div>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password"> <br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password"> <br><br>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>