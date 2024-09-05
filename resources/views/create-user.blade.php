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
        <a href="{{ route('list.user') }}">View Users</a>
        @if(@session('status'))
            <div style="color:green;">
                {{session('status') }}
            </div>
        @endif  

      <h1>
            Create User
        </h1>
        <hr />
        <form method="POST" action="{{ route('create.user') }}" enctype="multipart/form-data">
            @csrf
            <p> Name : <input type="text" name="name" id="name" /></p>
            <p>Email : <input type="email" name="email" id="email" /></p>
            <p>Mobile : <input type="tel" name="mobile" id="mobile" /></p>
            <p>Image : <input type="file" name="file" id="file" /></p>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>