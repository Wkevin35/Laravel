@extends('layout.master')

@section('title',$title)

@section('content')
<div class="container">
	<h1>{{$title}}</h1>
    
    @include('components.validationErrorMessage')
    
	<form action="/user/auth/sign-up" method="post">
		{!! csrf_field() !!}
		<label>
			暱稱:
			<input type="text" 
       			   name="nickname"
       			   placeholder="暱稱"
			>
		</label>
		<label>
			Email:
			<input type="text" 
       				name="email"
       				placeholder="Email"
			>
		</label>
		<label>
			密碼:
			<input type="password" 
       				name="password"
       				placeholder="密碼"
			>
		</label>
		<label>
			確認密碼:
			<input type="password" 
       				name="password_confirmation"
       				placeholder="確認密碼"
       		>
		</label>
		<label>
			帳號類型:
			<select name="type">
				<option value="G">一般會員</option>
				<option value="A">管理員</option>
			</select>
		</label>

		<button type="submit">註冊</button>
	</form>

</div>
@endsection

<!-- @include('components.socialButtons') -->







