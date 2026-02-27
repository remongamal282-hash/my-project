<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            max-width: 520px;
            margin: 40px auto;
            padding: 0 16px;
            background: #f7f7f7;
            color: #222;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 14px;
            box-sizing: border-box;
        }

        button {
            background: #0f766e;
            color: #fff;
            border: 0;
            border-radius: 8px;
            padding: 10px 16px;
            cursor: pointer;
        }

        .errors {
            background: #fef2f2;
            border: 1px solid #ef4444;
            color: #991b1b;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .success {
            background: #ecfdf5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Login</h1>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
