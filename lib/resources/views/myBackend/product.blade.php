@extends('myBackend.master')
@section('title','List Product')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
							<a href="{{Route('add')}}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($productList as $item)
										<tr>
											<td>{{$item->prod_id}}</td>
											<td>{{$item->prod_name}}</td>
											<td>{{number_format($item->prod_price,0,',','.')}} VNĐ</td>
											<td>
											<img style="border: 0;" width="100px" src="{{asset('lib/storage/app/Avatar/'.$item->prod_img)}}" class="thumbnail">
											</td>
											<td>{{$item->cate_name}}</td>
											<td>
												<a href="{{asset('index.php/admin/product/edit/'.$item->prod_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return confirm('Would you like to Delete?')" href="{{asset('index.php/admin/product/delete/'.$item->prod_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
