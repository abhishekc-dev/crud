<html>

<head>
    <style>
        #Container {
            min-height: 300px;
            padding: 20px;
            box-sizing: border-box;
            margin: 0px auto;
            border: 3px solid red;
            width: 300px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="Container">
        <h1>
            Update User
        </h1>
        <hr />
        <form method="POST" action="{{ route('update.user', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p> Name : <input type="text" name="name" id="name" value="{{ $user->name }}" /></p>
            <p>Email : <input type="email" name="email" id="email" value="{{ $user->email }}" /></p>
            <p>Mobile : <input type="tel" name="mobile" id="mobile" value="{{ $user->mobile }}" /></p>
            <p><img src="{{ asset('storage/' . $user->image) }}" height="100" id="output" /></p>
            <p>Image : <input type="file" name="file" id="file"
                    onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" /> </p>
            <input type="submit" value="Update" />
        </form>
    </div>
</body>

</html>