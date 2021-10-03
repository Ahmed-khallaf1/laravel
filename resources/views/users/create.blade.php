<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{ session()->get('Message') }}


    <div class="container">
        <h2>UsersType</h2>
        <form method="post" action="{{ url('/users') }}" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Enter password">
            </div>

            {{-- <div class="form-group">
    <label for="exampleInputPassword1">type_id</label>
    <input type="intger"  name="type_id"  class="form-control" id="exampleInputPassword1" placeholder="Enter type_id">
    </div> --}}
            <div class="form-group">
                <label for="exampleInputPassword1">type_id</label>
                <select name="type_id" class="form-control" id="">
                    @foreach ($data as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- <div class="form-group">
        <label for="exampleInputEmail1">teachername</label>
        <input type="text" name="teachername"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter teachername">
        </div> --}}

            {{-- <div class="form-group">
            <label for="exampleInputEmail1">code</label>
            <input type="text" name="code"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter teachername">
            </div> --}}






            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
