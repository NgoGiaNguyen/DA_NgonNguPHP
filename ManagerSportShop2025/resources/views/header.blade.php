<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 31A Tăng Nhơn Phú A, Quận 9, Thủ Đức</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0918 759 741</a></li>
						<li><a href=""><i class="fa"></i> ngogianguyen033@gmail.com</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())  
							<li><a href="{{ route('trang-chu') }}"><i class="fa fa-user"></i> Xin chào, {{ Auth::user()->full_name }}</a></li>
							@if(Auth::user()->hasRole('admin')) 
								<li><a href="{{route('dashboard')}}">Dashboard</a></li> 
							@endif

							<li>
								<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>

						@else
							<li><a href="{{ route('register') }}">Đăng ký</a></li>
							<li><a href="{{ route('login') }}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>


				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('trang-chu') }}" id="logo"><img src="https://thumbs.dreamstime.com/b/vector-logo-sports-goods-store-food-229183882.jpg" width="120px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select">
								<i class="fa fa-shopping-cart"></i> 
								Giỏ hàng (
								@if(Session::has('cart') && Session::get('cart')->totalQty > 0)
									{{ Session::get('cart')->totalQty }}
								@else
									Trống
								@endif
								) 
								<i class="fa fa-chevron-down"></i>
							</div>
						<div class="beta-dropdown cart-body">


							@if(is_array($product_cart) || is_object($product_cart))
								@foreach($product_cart as $pr)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{ route('delete-item-cart', $pr['item']['id']) }}">
											<i class="fa fa-times"></i>
										</a>
										<div class="media">
											<a class="pull-left" href=""><img src="{{$pr['item']['image']}}" alt="{{$pr['item']['image']}}"></a>
											<div class="media-body">
												<span class="cart-item-title">{{$pr['item']['name']}}</span>
												<span class="cart-item-amount">Số lượng:{{$pr['qty']}}<span>
												<br>
												<br>
												</span>Giá: {{$pr['item']['unit_price']}}</span>
											</div>
										</div>
									</div>
								@endforeach
							@else
							<br>
								<p>Giỏ hàng đang trống 🛒</p>
							<br>
							@endif


								<div class="cart-caption">
									<div class="cart-total text-right">Tổng số lượng: <span class="cart-total-value">{{Session('cart')->totalQty}}</span></div>
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dat-hang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
						<li><a href="{{ route('san-pham')}}">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($danh_sach_loai_sp as $dsl)
									<li><a href="{{ route('san-pham-theo-loai', $dsl->id) }}">{{$dsl -> name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
						<li><a href="{{ route('lien-he') }}">Liên hệ</a></li>
						<li><a href="{{ route('video') }}">Video</a></li>
						@if(Auth::check())
						<li><a href="{{ route('historyorder') }}">Lịch sử mua hàng</a></li>
						@endif
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->




	