@extends('layout.master')

@section('title',$title)

@section('header')
 	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div class="container">
		<h1>{{$title}}</h1>

		 @include('components.validationErrorMessage')

		 <form action="/user/auth/sign-in" method="post">
		 	<label>
		 		Email:
		 		<input 
		 		  type="text" 
		 		  name="email"
		 		  placeholder="Email"
		 		  value="{{ old('email') }}" 
		 		>
		 	</label>
		 	<label>
		 		密碼:
		 		<input type="password" 
		 		       name="password"
		 		       placeholder="密碼"
		 		       value="{{ old('password') }}" 
		 		>
		 	</label>

		 	<button type="submit">登入</button>
		 	{!! csrf_field() !!}
		 </form>
	</div>	
@endsection