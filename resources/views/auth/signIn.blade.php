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
		 		{{ trans('shop.user.fields.email') }}:
		 		<input 
		 		  type="text" 
		 		  name="email"
		 		  placeholder={{ trans('shop.user.fields.email') }}
		 		  value="{{ old('email') }}" 
		 		>
		 	</label>
		 	<label>
		 		{{ trans('shop.user.fields.password') }}:
		 		<input type="password" 
		 		       name="password"
		 		       placeholder={{ trans('shop.user.fields.password') }}
		 		       value="{{ old('password') }}" 
		 		>
		 	</label>

		 	<button type="submit"> {{ trans('shop.auth.sign-in') }} </button>
		 	{!! csrf_field() !!}
		 </form>
	</div>	
@endsection