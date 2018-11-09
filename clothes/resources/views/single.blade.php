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
			<h2>Single Page</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home/</a> <i>/</i></li>
			<li><a href="/products/{{$category}}">{{$category}}</a><i>/</i></li>
			    <li>{{$product->name}}</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						@php
						$images = $product->image;
						@endphp
						@foreach($images as $image)
					    <li data-thumb="{{asset($image->link)}}">
							<div class="thumb-image"> <img src="{{asset($image->link)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@endforeach 
					</ul>
				</div>
				<!-- flixslider -->
					<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
					<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flixslider -->
				<!-- zooming-effect -->
					<script src="{{asset('js/imagezoom.js')}}"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3>{{$product->name}}</h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
					<div class="description">
						<h5><i>Description</i></h5>
						<p>{{$product->description}}</p>
					</div>
					<div class="color-quality">
						<div class="color-quality-left">
							<h5>Color : </h5>
							<ul>
									<li><a href="javascript:void(0)" class="{{Illuminate\Support\Str::lower($product->color)}}"><span></span>{{$product->color}}</a></li> 
								{{-- <li><a href="javascript:void(0)" class="{{strtolower($product->color)}}"><span></span>{{$product->color}}</a></li> --}}
							</ul>
						</div>
						<div class="color-quality-right">
						    <h5>Quatity :{{$product->quantity}}</h5>
							 {{-- <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus1">&nbsp;</div>
									<div class="entry value1"><span>1</span></div>
									<div class="entry value-plus1 active">&nbsp;</div>
								</div>
							</div>
							<!--quantity-->
									<script>
									$('.value-plus1').on('click', function(){
										var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus1').on('click', function(){
										var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity--> --}}

						</div>
						<div class="clearfix"> </div>
					</div>
					{{-- <div class="occasional">
						<h5>Occasion :</h5>
						<div class="colr ert">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Occasion Wear</label>
							</div>
						</div>
						<div class="colr">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Party Wear</label>
							</div>
						</div>
						<div class="colr">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Formal Wear</label>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div> --}}
					<div class="description">
					     <h5> Size: {{$product->size}}</h5>
					</div>
					<div class="simpleCart_shelfItem description">
							      @if($product->salePrice < $product->price)
									<p><span>Price :{{$product->price}}VND</span> <i class="item_price" price ="{{$product->salePrice}}"
										color ="{{$product->color}}" size = "{{$product->size}}">SalePrice: {{$product->salePrice}} VND</i></p>
									@else
									<p><i class="item_price" price ="{{$product->salePrice}}" color ="{{$product->color}}" 
										size = "{{$product->size}}">SalePrice: {{$product->salePrice}} VND</i></p>
									@endif
									<p><a class="item_add" href="#">Add to cart</a></p>
					</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3>{{$product->name}}</h3>
						<p>{{$product->description}}</p>
						<h3>{{$product->firm->name}}</h3>
						<p>{{$product->firm->information}}</p>
					</div>
					
					
					

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<h4>(2) Reviews</h4>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="{{asset('images_admin/1.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Laura</a>
									<h5>April 03, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="{{asset('images_admin/2.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Michael</a>
									<h5>April 04, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
							<form action="#" method="post">
								<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
								<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
								<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input type="submit" value="Submit" >
							</form>
						</div>
					</div> 			        					            	      
				</div>	
			</div>
		<script src="{{asset('js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">			
					@foreach($products_related as $pro_relate)
					@php
						$images = $pro_relate->image;
					@endphp	
					<li>
						<div class="w3l_related_products_grid">
							<div class="agile_ecommerce_tab_left dresses_grid">
								<div class="hs-wrapper hs-wrapper3">
										@foreach($images as $image)
										<img src="{{ asset($image->link) }}" alt=" " class="img-responsive" />
										@endforeach
									<div class="w3_hs_bottom">
										<div class="flex_ecommerce">
												<a href="{{asset("products/".$pro_relate->category->name."/".$pro_relate->productId)}}">
													<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
								<h5><a href="#">{{$pro_relate->name}}</a></h5>
								<div class="simpleCart_shelfItem">
										@if($pro_relate->salePrice < $product->price)
										<p><span>{{$pro_relate->price}}VND</span> <i class="item_price">{{$pro_relate->salePrice}}VND</i></p>
										@else
										<p><i class="item_price">{{$pro_relate->salePrice}}VND</i></p>
										@endif
										<p><a class="item_add" href="#">Add to cart</a></p>
								</div>
							</div>
							
						</div>
					</li>
					@endforeach
			</ul>
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo2").flexisel({
							visibleItems:4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
				</script>
				<script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
		</div>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection