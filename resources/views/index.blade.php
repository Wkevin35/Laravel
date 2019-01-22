@extends('layout.master')

@section('title',$title)

@section('header')
	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div clase="container">
		<h1>{{$title}}</h1>
		 @include('components.validationErrorMessage')
		<h2>{{ trans('shop.welcome') }}</h2>

		<table class="table" border="1">
			<tr>
				<th>{{ trans('shop.merchandise.fields.name') }}</th>
				<th>{{ trans('shop.merchandise.fields.photo') }}</th>
				<th>{{ trans('shop.merchandise.fields.price') }}</th>
				<th>{{ trans('shop.merchandise.fields.remain-count') }}</th>
			</tr>
			@foreach($MerchandisePaginate as $Merchandise)
				<tr>
					<td>{{ $Merchandise->name }}</td>
					<td>
						@if ($Merchandise->photo!=null)
							<img src="{{$Merchandise->photo}}">
						@else
							@include('components.noImage')
						@endif
					</td>
					<td>{{ $Merchandise->price }}</td>
					<td>{{ $Merchandise->remain_count }}</td>
					<td>
						<a href="/merchandise/{{ $Merchandise->id }}">
							{{ trans('shop.check') }}
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