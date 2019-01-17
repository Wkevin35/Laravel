@extends('layout.master')

@section('title',$title)

@section('header')
	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div class="container">
		<h1>{{ $title }}</h1>

		@include('components.validationErrorMessage')

		<table class="table" border="1">
			<tr>
				<th>商品名稱</th>
				<th>圖片</th>
				<th>單價</th>
				<th>數量</th>
				<th>總金額</th>
				<th>購買時間</th>
			</tr>
			@foreach($TransactionPaginate as $Transaction)
				<tr>
					<td>
						<a href="/merchandise/{{ $Transaction->Merchandise->id }}">{{ $Transaction->Merchandise->name }}</a>
						
					</td>
					<td>
						<img src="{{ $Transaction->Merchandise->photo }}">

					</td>
					<td>{{ $Transaction->price }}</td>
					<td>{{ $Transaction->buy_count }}</td>
					<td>{{ $Transaction->total_price }}</td>
					<td>{{ $Transaction->created_at }}</td>
				</tr>
			@endforeach
		</table>
		{{ $TransactionPaginate->links() }}
	</div>
@endsection