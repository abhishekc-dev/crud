<html>

<head></head>

<body>
    @if(session('status'))
        <div style="color:green;">
            {{ session('status') }}
        </div>
    @endif

    <table border="1" rules="all" cellpadding="4">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Images</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td><img src="{{ asset('storage/' . $user->image) }}" height="100" /></td>
                <td>
                    <form method="POST" action="{{ route('delete.user', $user->id) }}">
                        @csrf

                        @method('DELETE')
                        <button type="submit" style="color:red;">
                            Delete
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('edit.user', $user->id)  }}" style="color:blue;">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>