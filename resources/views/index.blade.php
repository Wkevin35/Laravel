@extends('layout.master')

@section('title',$title)

@section('header')
	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div clase="container">
		<h1>{{$title}}</h1>
		 @include('components.validationErrorMessage')
		<h2>歡迎光臨我的商品測試頁</h2>

		<table class="table" border="1">
			<tr>
				<th>名稱</th>
				<th>圖片</th>
				<th>價格</th>
				<th>剩餘數量</th>
			</tr>
			@foreach($MerchandisePaginate as $Merchandise)
				<tr>
					<td>{{ $Merchandise->name }}</td>
					<td><img src="{{$Merchandise->photo}}"></td>
					<td>{{ $Merchandise->price }}</td>
					<td>{{ $Merchandise->remain_count }}</td>
					<td>
						<a href="/merchandise/{{ $Merchandise->id }}">
							檢視
						</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{ $MerchandisePaginate->links() }}

		@if(session()->has('user'))
			@if(session('user.0.type')=='A')
				<a href="/merchandise/create">創建新商品</a><br>
				<a href="/merchandise/manage">商品管理清單</a><br>
			@endif
			<a href="/transation">交易紀錄</a>
		@endif
	</div>
@endsection