@extends('layouts.app')
<!-- header -->
@section('header')
  @include("layouts.login")
	@include('layouts.header')
	@include('layouts.nav')
@endsection
@section('content')
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Checkout</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			@if(count($products)!=0)
			<h3>Your shopping cart contains: <span>{{count($products)}} Products</span></h3>
			<div class="checkout-right">
				<table class="timetable_sub" id = "table_cart">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Price/Unit</th>
							<th>Prices</th>
							<th>Remove</th>
						</tr>
					</thead>
					@foreach($products as $key=>$product)
					<tr class="rem1" id ={{$product->productId}}>
						<td class="invert no"> {{$key + 1}}</td>
						<td class="invert-image">
							<a href="{{asset("products/".$product->category->name."/".$product->productId)}}">
								<div style="width: 350px;">
									<img src="{{asset( $product->image[0]->link)}}" alt=" " class="img-responsive" /></a>
								</div>
						</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus adjust">&nbsp;</div>
									<div class="entry value "><span>{{$product->quantity}}</span></div>
									<div class="entry value-plus active adjust">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">{{$product->name}}</td>
						<td class="invert price_unit" >{{$product->salePrice}}</td>
						<td class="invert prices">{{($product->salePrice)*($product->quantity)}}</td>
						<td class="invert">
							<div class="rem">
								<div class="close1"> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr>
					@endforeach
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Yours Cart</h4>
					<ul id = "yours_cart">
						@php
							$totalPrice = 0;
						@endphp
						@foreach($products as $key=>$product)
						<li>Product{{$key + 1}} <i>-</i> <span>{{($product->salePrice)*($product->quantity)}} </span></li>
						@php
							$totalPrice = $totalPrice + ($product->salePrice)*($product->quantity);
						@endphp
						@endforeach
						<li>Total Service Charges <i>-</i> <span>30000</span></li>
						<li>Total <i>-</i> <span  id = "totalPrices">{{$totalPrice + 30000}}</span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<a href="/products/Dresses"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
					<a href="/products/Dresses"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			@else
			<h3>Your shopping cart contains: <span>0 Products</span></h3>
            @endif
		</div>
		<script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
	</div>
	@endsection
	@section('footer')
		@include('layouts.footer')
	@endsection