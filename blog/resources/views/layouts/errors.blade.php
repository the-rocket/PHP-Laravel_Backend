@if(count($errors))
	<div class="form-group">
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
			<!-- &nbsp; -->
		</div>
	</div>
@endif