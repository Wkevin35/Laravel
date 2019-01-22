@extends('layout.master')

@section('title',$title)

@section('content')
<div class="container">
	<h1>{{$title}}</h1>
    
    @include('components.validationErrorMessage')
    
	<form action="/user/auth/sign-up" method="post">
		{!! csrf_field() !!}
		<label>
			{{ trans('shop.user.fields.nickname') }}: 
			<input type="text" 
       			   name="nickname"
       			   placeholder={{ trans('shop.user.fields.nickname') }} 
       			   value="{{old('nickname')}}" 
			>
		</label>
		<label>
			{{ trans('shop.user.fields.email') }}:
			<input type="text" 
       				name="email"
       				placeholder={{ trans('shop.user.fields.email') }}
       				value="{{old('email')}}" 
			>
		</label>
		<label>
			{{ trans('shop.user.fields.password') }}:
			<input type="password" 
       				name="password"
       				placeholder={{ trans('shop.user.fields.password') }}
       				 
			>
		</label>
		<label>
			{{ trans('shop.user.fields.confirm-password') }}:
			<input type="password" 
       				name="password_confirmation"
       				placeholder={{ trans('shop.user.fields.confirm-password') }}
       		>
		</label>
		<label>
			{{ trans('shop.user.fields.type-name') }}:
			<select name="type">
				<option value="G">{{ trans('shop.user.fields.type.general') }}</option>
				<option value="A">{{ trans('shop.user.fields.type.admin') }}</option>
			</select>
		</label>

		<button type="submit">{{ trans('shop.auth.sign-up') }}</button>
	</form>

</div>
@endsection

<!-- @include('components.socialButtons') -->







