@extends('layout.master')

@section('title',$title)

@section('header')
	@include('components.usersLoginOrNot')
@endsection

@section('content')
	<div clase="container">
		<h1>{{$title}}</h1>
		<h2>歡迎光臨我的商品測試頁</h2>
		<a href="/merchandise/create">創建新商品</a>
	</div>
@endsection