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
			<h3>Your shopping cart contains: <span id="total_products_cart">{{count($products)}}</span> Products</h3>
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
						{{-- <li>Product{{$key + 1}} <i>-</i> <span no={{$key + 1}}>{{($product->salePrice)*($product->quantity)}} </span></li> --}}
						@php
							$totalPrice = $totalPrice + ($product->salePrice)*($product->quantity);
						@endphp
						@endforeach
						<li>Total Service Charges <i>-</i> <span>30000</span></li>
						<li>Total <i>-</i> <span  id = "totalPrices">{{$totalPrice + 30000}}</span></li>
						<li>  </li>
					</ul>
				{{--<script type="text/javascript"src="http://202.9.84.88/documents/payment/logoscript.jsp?logos=v,m,a,j,u,at&lang=en"></script>--}}
                <form action="{{url('/checkout/sendrequest')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="Title" value="VPC 3-Party" />
                    <input type="hidden" name="virtualPaymentClientURL" size="63" value="https://mtf.onepay.vn/onecomm-pay/vpc.op" maxlength="250" />
                    <input type="hidden" name="vpc_Merchant" value="ONEPAY" size="20" maxlength="16" />
                    <input type="hidden" name="vpc_AccessCode" value="D67342C2" size="20" maxlength="8" />
                    <input type="hidden" name="vpc_MerchTxnRef" value="<?php echo date ( 'YmdHis' ) . rand (); ?>" size="40" maxlength="40" />
                    <input type="hidden" name="vpc_OrderInfo" value="{{$billId}}" size="20" maxlength="34" />
                    <input type="hidden" name="vpc_Amount" value="{{($totalPrice + 30000)*100}}" size="20" maxlength="10" />
                    <input type="hidden" name="vpc_ReturnURL" size="60" value="{{url('/checkout/getresponse')}}" maxlength="300" />
                    <input type="hidden" name="vpc_Version" value="2" size="20" maxlength="8" />
                    <input type="hidden" name="vpc_Command" value="pay" size="20" maxlength="16" />
                    <input type="hidden" name="vpc_Locale" value="vn" size="20" maxlength="5" />
                    <input type="hidden" name="vpc_Currency" value="VND" size="20" maxlength="5" />
                    <input type="hidden" name="vpc_TicketNo" maxlength="15" value="<?php echo $_SERVER ['REMOTE_ADDR']; ?>" />
                    <input type="hidden" name="vpc_SHIP_Street01" value="1" size="20" maxlength="500" />
                    <input type="hidden" name="vpc_SHIP_Provice" value="2" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_SHIP_City" value="3" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_SHIP_Country" value="Viet Nam" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Phone" value="5" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Email" size="20" value="7" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Id" value="{8" size="20" maxlength="50" />
                    
                    {{--<script type="text/javascript" src="http://202.9.84.88/documents/payment/logoscript.jsp?logos=v,m&lang=vn"></script>--}}
                    <input type="submit" class="btn btn-primary btn-lg" value="Pay with Onepay" />
                </form>
				</div>
				
					
				
				<div class="clearfix"> </div>
			</div>
			@else
			<h3>Your shopping cart contains: <span>0 </span> Products</h3>
            @endif
		</div>
		<script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
	</div>
	@endsection
	@section('footer')
		@include('layouts.footer')
	@endsection