<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th width="10%">ID</th>
			<th width="40%">Name</th>
			<th width="50%">Email</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
		</tr>
		@endforeach
	</table>
	{!! $users->links() !!}
</div>