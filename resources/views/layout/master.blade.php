<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title') - Shop Laravel</title>

</head>
<body>
	<header>
		<a href="/">{{ trans('shop.home') }} </a>
		@yield('header')
		{{-- <a href="/user/auth/sign-up">註冊</a>
		<a href="/user/auth/sign-in">登入</a> --}}
	</header>

	<div class="container">
		@yield('content')
	</div>

	<footer>
		<a href="#">請聯絡我們</a>
	</footer>
</body>
</html>