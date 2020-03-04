<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title') - Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	@yield('css')
	<link rel="stylesheet" href="css/home5.css">
	<script type="text/javascript" src="js/myJS.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
					<a href="{{route('home')}}">Hai-Pro</a>											
					</h1>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div id="search">
					<form class="navbar-form" role="search" method="GET" action="{{asset('index.php/search/')}}">
							<div class="input-group">
								<div class="input-group-btn">
									<input class="form-control" type="text" name="result" placeholder="Nhập từ khóa ...">
								</div>
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="cart" class="col-md-4 col-sm-12 col-xs-12">
					@if (Auth::check())
					<span class="display" id="btn">{{Auth::user()->name}}</span>
					@else
					<a class="display" href="{{route('login')}}">Đăng nhập</a>
					@endif
					<a class="display" href="{{route('cart_show')}}">Giỏ hàng</a>
					<a href="{{route('cart_show')}}" style="width: 36px">{{Cart::getTotalQuantity()}}</a>	
					<div class="logout">
						<a href="{{route('logout')}}" onclick="return confirm('Would you like to log out?')"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
					</div>			    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row bg">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul style="margin: 0">
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach ($category as $item)
						<li class="menu-item"><a href="{{route('category',['id'=>$item->cate_id,'slug'=>$item->cate_slug])}}" title="">{{$item->cate_name}}</a></li>
							@endforeach
											
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{route('home')}}"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
                    </div>

                        @yield('main')
                        
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
		$( document ).ready(function() {
			updateOn = function(id,qty){
			let quantity = qty;
				$(document).off('click', '#plus').on('click', '#plus',function() {
					quantity = 1
					}); 
				$(document).off('click', '#minus').on('click', '#minus',function() {
					quantity = -1
					}); 
			$.get(
				'{{asset('index.php/cart/update')}}',
				{id:id,qty:quantity},
				function(){
					location.reload();
				}	
			);
	}
});

	</script>
	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="{{route('home')}}"><img src="img/home/logob.png"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur fuga, nisi quas quos dolore vitae sint et quibusdam optio porro sequi earum voluptas nulla sed excepturi voluptatum explicabo libero. Veritatis!</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0988 550 553</p>
						<p>Email: zanpro113@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora odit ut repellendus cumque eveniet libero perspiciatis unde possimus voluptas molestiae magni laboriosam nulla itaque, rerum ab? Facere ea asperiores veniam!</p>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis, nostrum dolorum assumenda dignissimos esse ducimus ea fugit odit. Exercitationem sequi earum tempore id reprehenderit voluptates excepturi suscipit accusantium ipsa ratione.</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Haipro.com.vn</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2020 Haipro Shop. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="{{route('home')}}"><img src="img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->

</body>
</html>
