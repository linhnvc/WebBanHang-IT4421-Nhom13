<div class="header">
	<div class="container">
		<div class="w3l_login">
			<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
		</div>
		<div class="w3l_logo">
			<h1><a href="/">Women's Fashion<span>For Fashion Lovers</span></a></h1>
		</div>
		<div class="search">
			<input class="search_box" type="checkbox" id="search_box">
			<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
			<div class="search_form">
				<form action="/search" method="get">
					@csrf
					<input type="text" name="Search" placeholder="Search...">
					<input type="submit" value="Send">
				</form>
			</div>
		</div>
		<div class="cart box_1">
			<a href="{{asset("/displayCart")}}">
				<div >
				<span class="" id="">Yours Cart</span></div>
				<img src="{{asset('images_admin/bag.png')}}" alt="" />
				@if(!empty(session('cart')))
				<sup id = 'quantity_cart'>({{count(session('cart'))}})</sup>
				@else
				<sup id = 'quantity_cart'>(0)</sup>
				@endif
			</a>
			{{-- <p><a href="javascript:void(0)" class="simpleCart_empty">Empty Cart</a></p> --}}
			<div class="clearfix"> </div>
		</div>	
		<div class="clearfix"> </div>
	</div>
</div>
