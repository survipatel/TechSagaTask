<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">	
	<title> Dashboard | Admin </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 style="margin-top: 30px">Admin Dashboard</h2>
			<div class="col-md-8">
             @if(Session::has('success'))
             <div class = "alert alert-success">{{Session::get('success')}}</div>
             @endif
            <table class ="table table-responsive">
            	<thread>
            		<th>Name</th>
            		<th>Email</th>
            		<th>Status</th>
            		<th>Action</th>
            	</thread>
            	<tbody class="tablebody">
            		@foreach($users as $user)
	            		<tr>
	            			<td>{{$user->name}}</td>
	            			<td>{{$user->email}}</td>
	            			<td>{{$user->status}}</td>
	            			<td>
	            				<button class="btn btn-danger" onclick="deleteUser({{$user->id}})">Delete</button>
	            				<button class="btn btn-primary" onclick="showEditForm({{$user->id}})">Edit</button>
	            				<button class="btn btn-secondary" onclick="acceptUser({{$user->id}})">Accept</button>
	            				<button class="btn btn-danger" onclick="rejectUser({{$user->id}})">Reject</button>
            				</td>
	            		</tr>
            		@endforeach

            		<tr>
            		

            			<a href="{{route('admin.logout')}}" onclick="event.preventDefault();
            			document.getElementById('logout-form').submit();"> Logout</a>
            			<form id="logout-form" action="{{route('admin.logout')}}" method="POST">
            				@csrf
            			</form>
            	</tr>
            	</tbody>
            </table>
             	
</div>

</div>


<div class="modal-content" id="modal-start" style="display:none;">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
        	<input type="text" name="name" id="nameEdit">
        	<input type="email" name="email" id="emailEdit">
        	<input type="hidden" name="id" id="user_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateUserInfo()">Update</button>
        </div>
      </div>


</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/js/new.js')}}" type="text/javascript"></script>
</body>
</html>