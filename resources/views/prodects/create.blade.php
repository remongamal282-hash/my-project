<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Prodect</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            max-width: 760px;
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

        .link-btn {
            display: inline-block;
            margin-bottom: 16px;
            background: #334155;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            padding: 10px 14px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea {
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

        .success {
            background: #ecfdf5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .errors {
            background: #fef2f2;
            border: 1px solid #ef4444;
            color: #991b1b;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Create Prodect</h1>

        <a class="link-btn" href="{{ route('web.prodects.index') }}">Go To Prodects Page</a>

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

        <form action="{{ route('web.prodects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>

            <label for="descripshin">Descripshin</label>
            <textarea id="descripshin" name="descripshin" rows="5" required>{{ old('descripshin') }}</textarea>

            <label for="price">Price</label>
            <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}" required>

            <label for="image">Image</label>
            <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required>

            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
