<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<title>@yield('title') - Shop Laravel</title>
	<script type="text/javascript">
			$(document).ready(function(){
  				$(document).on("click",'.set_language',function(event){
  					event.stopPropagation();
  					event.preventDefault();

  					var language = this.dataset.language;

  					Cookies.set('laravel_language',language);

  					location.reload();
  				});
			});
	</script>
</head>
<body>
	<span class="set_language" data-language="zh-TW">中文</span>
	<span class="set_language" data-language="en">English</span>
	<header>
		<a href="/">{{ trans('shop.home') }} </a>
		@yield('header')
	</header>

	<div class="container">
		@yield('content')
	</div>

	<footer>
		<a href="#">請聯絡我們</a>
	</footer>
</body>
</html>