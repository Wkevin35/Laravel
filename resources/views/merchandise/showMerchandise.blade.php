@extends('layout.master')

@section('title',$title)

@section('header')
	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div class="container">
		<h1>{{ $title }}</h1>

		@include('components.validationErrorMessage')

		<table border="1">
			<tr>
				<th>{{ trans('shop.merchandise.fields.name') }}</th>
				<td>{{ $Merchandise->name }}</td>
			</tr>
			<tr>

				<th>{{ trans('shop.merchandise.fields.photo') }}</th>
				<td>
					@if ($Merchandise->photo!=null)
						<img src="{{$Merchandise->photo}}">
					@else
						@include('components.noImage')
					@endif
				</td>
			</tr>
			<tr>
				<th>{{ trans('shop.merchandise.fields.price') }}</th>
				<td>{{ $Merchandise->price }}</td>
			</tr>
			<tr>
				<th>{{ trans('shop.merchandise.fields.remain-count') }}</th>
				<td>{{ $Merchandise->remain_count }}</td>
			</tr>
			<tr>
				<th>{{ trans('shop.merchandise.fields.introduction') }}</th>
				<td>{{ $Merchandise->introduction }}</td>
			</tr>
			<tr>
				<td colspan="2">
					<form action="/merchandise/{{ $Merchandise->id }}/buy" method="post">
						{{ trans('shop.transaction.field.buy-count') }}
						<select name="buy_count">
							@for($count=0; $count<=$Merchandise->remain_count;$count++)
								<option value="{{ $count }}">
									{{ $count }}
								</option>
							@endfor
						</select>
						<button type="submit">
								{{ trans('shop.transaction.buy') }}
						</button>
						{{ csrf_field() }}
					</form>
				</td>
			</tr>
		</table>
	</div>
@endsection