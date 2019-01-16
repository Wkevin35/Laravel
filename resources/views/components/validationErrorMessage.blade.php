@if($errors AND count($errors))
	<ul>
		@foreach($errors->all() as $err)
			<li>{{$err}}</li>
		@endforeach
	</ul>
@endif

@if (session('success'))
	<script type="text/javascript">alert( '{{session('success')}}');</script>
@endif