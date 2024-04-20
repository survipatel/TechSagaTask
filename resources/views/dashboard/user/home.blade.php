<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Dashboard | Customer </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 style="margin-top: 30px">Dashboard</h2>
			<div class="col-md-5">
             @if(Session::has('success'))
             <div class = "alert alert-success">{{Session::get('success')}}</div>
             @endif
            <table class ="table table-responsive">
            	<thread>
            		<th>Name</th>
            		<th>Email</th>
            		<th>Action</th>
            	</thread>
            	<tbody>
            		<tr>
            			<td>{{Auth::guard('web')->user()->name}}</td>
            		<td>{{Auth::guard('web')->user()->email}}</td>
            		<td><a href="{{route('user.logout')}}" onclick="event.preventDefault();
            			document.getElementById('logout-form').submit();"> Logout</a>
            			<form id="logout-form" action="{{route('user.logout')}}" method="POST">
            				@csrf
            			</form>
            		</td>
            	</tr>
            	</tbody>
            </table>
             	
</div>
</div>
</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>