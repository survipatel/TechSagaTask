<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Registration </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 style="margin-top: 30px">Customer Registration</h2>
			<div class="col-md-5">
             @if(Session::has('success'))
             <div class = "alert alert-success">{{Session::get('success')}}</div>
             @endif
             @if(Session::has('error'))
             <div class = "alert alert-danger">{{Session::get('error')}}</div>
             @endif
             	<form action="{{route('user.create')}}" method="POST">
             		@csrf

             		<div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{{old('name')}}">
    <span class="text-danger">@error('name'){{$message}}@enderror</span>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
    <span class="text-danger">@error('email'){{$message}}@enderror</span>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
    <span class="text-danger">@error('password'){{$message}}@enderror</span>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirm Password">
    <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  Already Registered <a href="{{route('user.login')}}">Login Here</a>
</form>
</div>
</div>
</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>