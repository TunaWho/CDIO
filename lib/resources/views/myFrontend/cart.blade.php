@extends('myFrontend.master')
@section('title','Chi tiết sản phẩm')
@section('css')
<link rel="stylesheet" href="css/cart3.css">
@endsection
@section('main')
			<div id="wrap-inner">
				<div id="list-cart">
					<h3>Giỏ hàng</h3>
					@if (Cart::getTotalQuantity()>=1)
					<form method="GET" enctype="multipart/form-data">
						@csrf
						<table class="table table-bordered .table-responsive text-center" id="list">
							<tr class="active">
								<td width="11.111%">Ảnh mô tả</td>
								<td width="22.222%">Tên sản phẩm</td>
								<td width="22.222%">Số lượng</td>
								<td width="16.6665%">Đơn giá</td>
								<td width="16.6665%">Thành tiền</td>
								<td width="11.112%">Xóa</td>
							</tr>
							@foreach ($items as $item)
							<tr>
								<td><img width="85px" class="img-responsive" src="{{asset('lib/storage/app/Avatar/'.$item->attributes->img)}}"></td>
								<td>{{$item->name}}</td>
								<td>
									<div class="form-inline">
									<div class="form-group">
									<button type="button" class="btn btn-light" id="minus" name="{{$item->id}}"><i class="fa fa-minus" aria-hidden="true" ></i></button>
										<input id="{{$item->id}}" style="width: 39px; height: 36px" class="form-control" type="text" value="{{$item->quantity}}" name="qty" onchange="updateOn({{$item->id}},this.value)" type="number" min="1" max="99" size="1" maxlength="2">
									<button type="button" class="btn btn-light" id="plus" name="{{$item->id}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
									</div>
								</div>
								</td>
								<td><span class="price">{{number_format($item->price,'0',',','.')}}</span></td>
								<td><span class="price">{{number_format($item->price*$item->quantity,'0',',','.')}}</span></td>
								<td><a href="{{asset('index.php/cart/delete/'.$item->id)}}">Xóa</a></td>
							</tr>
							@endforeach
						</table>
						<div class="row" id="total-price">
							<div class="col-md-6 col-sm-12 col-xs-12">										
									Tổng thanh toán: <span class="total-price">{{number_format($total,'0',',','.')}}</span>
																											
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<a href="#" class="my-btn btn">Mua tiếp</a>
								<a href="#" class="my-btn btn">Cập nhật</a>
								<a href="{{asset('index.php/cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
							</div>
						</div>
					</form>             	                	
				</div>

				<div id="xac-nhan">
					<h3>Xác nhận mua hàng</h3>
					<form method="POST">
						@csrf
						<div class="form-group">
							<label for="email">Email address:</label>
							<input required type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="name">Họ và tên:</label>
							<input required type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<input required type="number" class="form-control" id="phone" name="phone">
						</div>
						<div class="form-group">
							<label for="add">Địa chỉ:</label>
							<input required type="text" class="form-control" id="add" name="add">
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
						</div>
					</form>
				</div>					
				@else
					<h2 class="font-weight-bolder text-uppercase text-warning">Không có sản phẩm nào!</h2>
				@endif
			</div>
@endsection
