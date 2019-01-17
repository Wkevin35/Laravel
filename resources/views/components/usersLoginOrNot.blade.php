<ul class="nav"> 
	<!-- @if(session()->has('user_id'))
		歡迎光臨 <font color="blue">{{ session('nickname') }}</font>  進入我的商城
		<li><a href="/user/auth/sign-out">登出</a></li>
	@else
		<li><a href="/user/auth/sign-in">登入</a></li>
		<li><a href="/user/auth/sign-up">註冊</a></li>
	@endif	 -->

	@if(session()->has('user'))
		歡迎光臨 <font color="blue">{{ session('user.0.nickname') }}</font> 進入我的商城
		<li><a href="/user/auth/sign-out">登出</a></li>
	@else
		<li><a href="/user/auth/sign-in">登入</a></li>
		<li><a href="/user/auth/sign-up">註冊</a></li>
	@endif	
</ul>