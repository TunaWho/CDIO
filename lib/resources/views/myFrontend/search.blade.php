@extends('myFrontend.master')
@section('title','Chi tiết sản phẩm')
@section('css')
<link rel="stylesheet" href="css/searchez.css">
@endsection
@section('main')
					<div id="wrap-inner">
						<div class="products">
							<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
							<div class="product-list row">
								@foreach ($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/Avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->prod_name}}</a></p>
										<p class="price">{{number_format($item->prod_price,'0',',','.')}}</p>	  
										<div class="marsk">
										<a href="{{route('detail',['id'=>$item->prod_id,'slug'=>$item->prod_slug])}}">Xem chi tiết</a>
										</div>                                    
								</div>  
								@endforeach
							</div>                        	                	
						</div>
					</div>
@endsection

