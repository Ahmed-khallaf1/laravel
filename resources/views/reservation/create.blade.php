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
<h2>reservation</h2>
<form  method="post"  action="{{ url('/reservation') }}"  enctype ="multipart/form-data">

 <input type="hidden" name="_token" value="<?php echo csrf_token();?>">

<div class="form-group">
<label >patient_id</label>
<input type="intger"  name="patient_id"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter patient_id">
</div>


<div class="form-group">
<label >appointment_id</label>
<input type="intger" name="appointment_id"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter appointment_id">
</div>


{{-- <div class="form-group">
<label>doctor_id</label>
<input type="intger"  name="doctor_id"  class="form-control" id="exampleInputPassword1" placeholder="Enter doctor_id">
</div> --}}

{{-- <div class="form-group">
    <label for="exampleInputPassword1">type_id</label>
    <input type="intger"  name="type_id"  class="form-control" id="exampleInputPassword1" placeholder="Enter type_id">
    </div> --}}


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
