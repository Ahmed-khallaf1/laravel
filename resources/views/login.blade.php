
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
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
<?php

  // session()->forget(['Message']);
   //  session()->flush();  // session_destroy();
 ?>



<div class="container">
<h2>Login</h2>
<form  method="post"  action="{{ url('/dologin') }}"  enctype ="multipart/form-data">

@csrf

<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" name="email"  value="{{ old('email') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>

<div class="form-group">
<label for="exampleInputPassword1"> Password</label>
<input type="password"  name="password"  value="{{ old('password') }}"  class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>



<div class="form-group">
    <input type="checkbox"  name="rememberMe"   >
    <label for="exampleInputPassword1"> Remember Me</label>

    </div>

<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>
