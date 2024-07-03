@extends('layouts.master')
@section('title')
<title>Home page</title>
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection


@section('content')


@include('home.components.slider')

<section>
	<div class="container">
		<div class="row">
			@include('components.sidebar')
			<div class="col-sm-9 padding-right">
				@include('home.components.features_product')

				@include('home.components.category_tab')

				@include('home.components.recommend_product')

			</div>
		</div>
	</div>
</section>



@endsection