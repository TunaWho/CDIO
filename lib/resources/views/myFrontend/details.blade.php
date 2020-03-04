@extends('myFrontend.master')
@section('title','Chi tiết sản phẩm')
@section('css')
<link rel="stylesheet" href="css/details2.css">
@endsection
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
	<h3>{{$items->prod_name}}</h3>
		<div class="row">
			<div style="padding: 0px" id="product-img" class="col-xs-12 col-sm-12 col-md-4 text-center">
				<img width="100%" height="100%" src="{{asset('lib/storage/app/Avatar/'.$items->prod_img)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-8">
				<p>Giá: <span class="price">{{number_format($items->prod_price,'0',',','.')}}</span></p>
				<p>Bảo hành: {{$items->prod_warranty}}</p> 
				<p>Phụ kiện: {{$items->prod_accessories}}</p>
				<p>Tình trạng: {{$items->prod_condition}}</p>
				<p>Khuyến mại: {{$items->prod_promotion}}</p>
				<p>Tình trạng: @if ($items->prod_status == 1)
					Còn hàng
				@else
					Hết hàng
				@endif</p>
				<p class="add-cart text-center"><a href="{{asset('index.php/cart/add/'.$items->prod_id)}}">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!$items->prod_description!!}</p>
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
		@foreach ($comments as $item)
		<ul>
			<li class="com-title">
				{{$item->com_name}}
				<br>
			<span>{{date('d/m/Y H:i',strtotime($item->created_at))}}</span>	
			</li>
			<li class="com-details">
				{{$item->com_content}}
			</li>
		</ul>
		@endforeach
	</div>
</div>
@endsection
							
