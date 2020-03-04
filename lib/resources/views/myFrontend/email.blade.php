<font face = "Arial">
						<div>
							<div></div>
							<h3><font color="#FF9600">Thông tin khách hàng</font></h3>
							<p>
								<strong class="info">Khách hàng: </strong>
								{{$info['name']}}
							</p>
							<p>
								<strong class="info">Email: </strong>
								{{$info['email']}}
							</p>
							<p>
								<strong class="info">Điện thoại: </strong>
								{{$info['phone']}}
							</p>
							<p>
								<strong class="info">Địa chỉ: </strong>
								{{$info['add']}}
							</p>
						</div>						
						<div>
							<h3><font color="#FF9600">Hóa đơn mua hàng</font></h3>							
							<table class="table-bordered table-responsive" border="1" cellspacing="0">
								<tr class="bold">
									<td width="30%">Tên sản phẩm</td>
									<td width="25%">Giá</td>
									<td width="20%">Số lượng</td>
									<td width="15%">Thành tiền</td>
								</tr>
								@foreach ($cart as $item)
								<tr>
									<td>{{$item->name}}</td>
									<td class="price">{{number_format($item->price)}}</td>
									<td>{{$item->quantity}}</td>
									<td class="price">{{number_format($item->price*$item->quantity,'0',',','.')}} VNĐ</td>
								</tr>
								<tr>
									<td colspan="3">Tổng tiền:</td>
									<td class="total-price">{{$total}} VNĐ</td>
								</tr>													
								@endforeach
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b><font color="#FF9600">Quý khách đã đặt hàng thành công!</font></b><br />
								• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>		
</font>		
					<!-- end main -->



