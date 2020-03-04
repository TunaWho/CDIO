@extends('myBackend.master')
@section('title','Edit Product')
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
				<div class="panel-heading">Sửa sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						@csrf
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên sản phẩm</label>
								<input required type="text" name="name" class="form-control" value="{{$editProduct->prod_name}}">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="{{$editProduct->prod_price}}">
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" width="300px" src="{{asset('lib/storage/app/Avatar/'.$editProduct->prod_img)}}">
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input required type="text" name="accessories" class="form-control" value="{{$editProduct->prod_accessories}}">
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="{{$editProduct->prod_warranty}}">
								</div>
								<div class="form-group" >
									<label>Khuyến mãi</label>
									<input required type="text" name="promotion" class="form-control" value="{{$editProduct->prod_promotion}}">
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input required type="text" name="condition" class="form-control" value="{{$editProduct->prod_condition}}">
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select required name="status" class="form-control">
										<option value="1" @if ($editProduct->prod_status == 1) 
											checked
										@endif>Còn hàng</option>
										<option value="0" @if ($editProduct->prod_status == 1) 
											checked
										@endif>Hết hàng</option>
									</select>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea class="ckeditor" required name="description">{{$editProduct->prod_description}}</textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('description',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
								</div>
								<div class="form-group" >
									<label>Danh mục</label>
									<select required name="cate" class="form-control">
										@foreach ($cateList as $item)
										<option value="{{$item->cate_id}}" @if ($editProduct->prod_cate == $item->cate_id)
											selected
										@endif>{{$item->cate_name}}</option>
										@endforeach
								
									</select>
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="featured" value="1" @if ($editProduct->prod_featured == 1) checked @endif>
									Không: <input type="radio" name="featured" value="0"@if ($editProduct->prod_featured == 0) checked @endif>
								</div>
								<input type="submit" name="submit" value="Sữa" class="btn btn-warning" onclick="return confirm('bạn có chắc chắn muốn sữa')">
							<a href="{{Route('product')}}" class="btn btn-info">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@endsection

