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