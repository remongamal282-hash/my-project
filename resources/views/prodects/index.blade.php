<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodects</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; max-width: 900px; margin: 32px auto; padding: 0 16px; background: #f7f7f7; }
        .card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 6px 18px rgba(0,0,0,.08); }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border-bottom: 1px solid #e5e7eb; text-align: left; padding: 10px; }
        td img { width: 56px; height: 56px; object-fit: cover; border-radius: 8px; border: 1px solid #e5e7eb; }
        a.btn { display: inline-block; background: #0f766e; color: #fff; text-decoration: none; padding: 8px 12px; border-radius: 8px; }
        a.btn-edit { background: #1d4ed8; }
        form.delete-form { display: inline-block; margin: 0; }
        button.btn-delete { background: #b91c1c; color: #fff; border: 0; border-radius: 8px; padding: 8px 12px; cursor: pointer; }
        form.logout-form { display: inline-block; margin-left: 8px; }
        button.btn-logout { background: #334155; color: #fff; border: 0; border-radius: 8px; padding: 8px 12px; cursor: pointer; }
        .success { background: #ecfdf5; border: 1px solid #10b981; color: #065f46; padding: 10px; border-radius: 8px; margin-bottom: 12px; }
        .error { background: #fef2f2; border: 1px solid #ef4444; color: #991b1b; padding: 10px; border-radius: 8px; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Prodects Page</h1>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        @if (!empty($dbError))
            <div class="error">{{ $dbError }}</div>
        @endif

        @if (empty($dbError))
            <a class="btn" href="{{ route('web.prodects.create') }}">Add New Prodect</a>
        @endif
        <form class="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn-logout" type="submit">Logout</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Descripshin</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prodects as $prodect)
                    <tr>
                        <td>{{ $prodect->id }}</td>
                        <td>{{ $prodect->name }}</td>
                        <td>{{ $prodect->descripshin }}</td>
                        <td>{{ $prodect->price }}</td>
                        <td>
                            @if ($prodect->image)
                                <img src="{{ asset('storage/' . $prodect->image) }}" alt="Prodect image">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-edit" href="{{ route('web.prodects.edit', $prodect) }}">Edit</a>
                            <form class="delete-form" action="{{ route('web.prodects.destroy', $prodect) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>

