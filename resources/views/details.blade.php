@extends('layouts.layout')
@section('title','Chi tiết sản phẩm')

@section('headerScrol')
<header id="headerScroll" style="background-color: #3399FF; height: 50px;">
	<div class="container">				
		<div id="search" style="height: 50px; margin:auto;" class="col-md-7 col-sm-12 col-xs-12">
			<form method="get"  action="{{ route('search') }}" enctype="multipart/form-data" role ="search" class="navbar-form">
				<div class="input-group" style="width: 500px; margin: auto; padding-top: 10px;">
					<div class="input-group-btn" style="width: 90%;">
						<input type="text" style="margin: auto; height: 30px;" class="form-control" placeholder="Search" name="result">
					</div>
					<div class="input-group-btn" style="width: 10%;">
						<button class="btn btn-default" style="margin: auto; height: 30px;" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>

			</form>
		</div>			
	</div>
</header>
@endsection

@section('left')
<link rel="stylesheet" href="{{ asset('public/theme_fontend/css/detailcs.css') }}">
<div class="img-zoom-container">
	<img id="myimage" src="{{asset('/storage/app/avatar/'.$item->p_image)}}" width="300" height="240" alt="Girl">
	<div id="myresult" class="img-zoom-result"></div>
</div>

@endsection

@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{ $item->p_name }}</h3>

		<div id="product-details" >
			<?php $price = $item->p_price-$item->p_price*$item->p_promotion/100; ?>
			<p>Giá: <span class="price"><del>{{number_format($item->p_price,0,',','.')}}</del> </span> 
				<span class="price" style="font-size: 30px"> {{number_format($price,0,',','.')}} </span>VND</p>
				<p>Bảo hành: {{ $item->p_warranty }}</p> 
				<p>Phụ kiện: {{ $item->p_accessories }}</p>
				<p>Tình trạng: {{ $item->p_condition }} </p>
				<p>Khuyến mại: {{ $item->p_name }}</p>
				<p>Còn hàng:     @if($item->p_status==1) Còn hàng @else Hết hàng @endif  </p>
				<p class="add-cart text-center"><a href="{{ route('getAdd',$item->p_id) }}">Đặt hàng online</a></p>
			</div>
		</div>
		<div id="product-detail"  >
			<h3>Chi tiết sản phẩm</h3>
			<p class="text-justify">
				{!! $item->p_description !!}
			</p>
		</div>
		<div id="comment">
			<h3>Bình luận</h3>
			<div class="col-md-9 comment">
				<form method="POST">
					@csrf
					<div class="form-group">
						<label for="email">Email:</label>
						<input required type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="name">Tên:</label>
						<input required type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="cm">Bình luận:</label>
						<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-default">Gửi</button>
					</div>
				</form>
			</div>
		</div>
		<div id="comment-list">
			@foreach($comments as $com)
			<ul>
				<li class="com-title">
					{{ $com->comment_name }}
					<br>
					<span>{{ date('d/m/Y H:i', strtotime($com->created_at)) }}</span>	
				</li>
				<li class="com-details">
					{{ $com->comment_content}}
				</li>
			</ul>
			@endforeach

		</div>
	</div>			

	@endsection
