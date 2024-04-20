function showalert(){
	alert('iam anita');
}

function deleteUser(id)
{
	$.ajax({
		type: "GET",
		url: '/deleteTheUser/' + id,
		success: function(respnse) {
			alert(respnse);
			showallusers();
		}
	})
}


function acceptUser(id)
{
	$.ajax({
		type: "GET",
		url: '/acceptTheUser/' + id,
		success: function(respnse) {
			alert(respnse);
			showallusers();
		}
	})
}


function rejectUser(id)
{
	$.ajax({
		type: "GET",
		url: '/rejectTheUser/' + id,
		success: function(respnse) {
			alert(respnse);
			showallusers();
		}
	})
}

function showallusers()
{
	$.ajax({
		type: "GET", 
		url: '/getAllUser',
		success:function(response){
			$('.tablebody').html(response);
		}
	})
}

function showEditForm(id)
{
	// document.getElementById('modal-start').style.display = 'block';
	$.ajax({
		type: "GET", 
		url: '/getsingleUser/' + id,
		success:function(response){
			console.log(response);
			document.getElementById('nameEdit').value = response.name;
			document.getElementById('emailEdit').value = response.email;
			document.getElementById('user_id').value = response.id;
			document.getElementById('modal-start').style.display = 'block';
		}
	})
}

function updateUserInfo()
{
	var id = document.getElementById('user_id').value;
	var name = document.getElementById('nameEdit').value;
	var email = document.getElementById('emailEdit').value;
	$.ajax({
		type: "POST",
		url: '/updateUserData/' + id,
		headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
		data: {
			name : name,
			email: email
		},
		success: function(response){
			alert(response);
			document.getElementById('modal-start').style.display = 'none';
			showallusers();
		}
	})
}