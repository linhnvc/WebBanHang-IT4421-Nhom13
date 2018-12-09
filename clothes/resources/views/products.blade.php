@extends('layouts.app')
<!-- header -->
@section('header')
  @include("layouts.login")
	@include('layouts.header')
	@include('layouts.nav')
@endsection
@section('content')
<!-- banner -->

	<div class="banner1" id="home1">
		<div class="container">
			<h2>trendy fashion dresses<span>up to</span> 30% <i>Discount</i></h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href='/'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>{{$category}}</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- dresses -->
	<div class="dresses">
		<div class="container">
			<div class="w3ls_dresses_grids">
				<div class="col-md-4 w3ls_dresses_grid_left">
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Categories</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Dresses
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
								  <div class="panel-body panel_text">
									<ul >
										@foreach($dressGroup as $group)
									    <li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
										@endforeach
									</ul>
								  </div>
								</div>
							  </div>

							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Common
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
								   <div class="panel-body panel_text">
									<ul>
											@foreach($commonGroup as $group)
											<li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
											@endforeach
									</ul>
								  </div>
								</div>
							  </div>

							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Beach
									</a>
								  </h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree">
								   <div class="panel-body panel_text">
									<ul>
											@foreach($beachGroup as $group)
											<li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
											@endforeach
									</ul>
								  </div>
								</div>
							  </div>
							  
							</div>
							<!-- <ul class="panel_bottom">
								<li><a href="products.html">Summer Store</a></li>
								<li><a href="dresses.html">New In Clothing</a></li>
								<li><a href="sandals.html">New In Shoes</a></li>
								<li><a href="products.html">Latest Watches</a></li>
							</ul> -->
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Color</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color " >
								<ul id="select_color">
									<li><a href="javascript:void(0)" id="Red"><i></i>Red(5)</a></li>
									<li><a href="javascript:void(0)" id = "Brown"><i></i> Brown(2)</a></li>
									<li><a href="javascript:void(0)" id = "Yellow"><i></i> Yellow(3)</a></li>
									<li><a href="javascript:void(0)" id = "Violet"><i></i> Violet(6)</a></li>
									<li><a href="javascript:void(0)" id = "Orange"><i></i> Orange(2)</a></li>
									<li><a href="javascript:void(0)" id = "Blue"><i></i> Blue(1)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Size</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color ecommerce_size ">
								<ul id="select_size">
									<li><a href="javascript:void(0)" id = "Medium">Medium(8)</a></li>
									<li><a href="javascript:void(0)" id = "Large">Large(8)</a></li>
									<li><a href="javascript:void(0)" id = "Extra Large">Extra Large(8)</a></li>
									<li><a href="javascript:void(0)" id = "Small">Small(8)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<div class="dresses_img_hover">
						<img src="{{asset('images_admin/47.jpg')}}" alt=" " class="img-responsive" />
							<div class="dresses_img_hover_pos">
								<h4>For Kids <span>20%</span><i>Discount</i></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 w3ls_dresses_grid_right">
					<div class="col-md-6 w3ls_dresses_grid_right_left">
						<div class="w3ls_dresses_grid_right_grid1">
						<img src="{{asset('images_admin/48.jpg')}}" alt=" " class="img-responsive" />
							<div class="w3ls_dresses_grid_right_grid1_pos">
								<h3>Printed <span>Cotton</span> Top</h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 w3ls_dresses_grid_right_left">
						<div class="w3ls_dresses_grid_right_grid1">
						<img src="{{asset('images_admin/49.jpg')}}" alt=" " class="img-responsive" />
							<div class="w3ls_dresses_grid_right_grid1_pos1">
								<h3>Printed Blue <span>Cotton</span> Jeans</h3>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>

					<div class="w3ls_dresses_grid_right_grid2">
						<div class="w3ls_dresses_grid_right_grid2_left">
						@if(count($products)!=0)
						<h3>Showing Results: {{$products->firstItem()}}-{{$products->lastItem()}}</h3>
						</div>
						<div class="w3ls_dresses_grid_right_grid2_right ">
							<select name="select_item" class="select_item selectpicker">
								<option selected="selected">Default sorting</option>
								<option >Sort by price: low to high</option>
								<option >Sort by price: high to low</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls_dresses_grid_right_grid3 wrapper">
						@foreach ($products as $product)
						@php
							$images = $product->image;
						@endphp
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses product">
							<div class="agile_ecommerce_tab_left dresses_grid">
								<div class="hs-wrapper hs-wrapper2">
									@foreach($images as $image)
									<img src="{{ asset($image->link) }}" alt=" " class="img-responsive" />
									@endforeach
									<div class="w3_hs_bottom w3_hs_bottom_sub1">
										<ul>
											<li>
												<a href="{{asset("products/".$product->category->name."/".$product->productId)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>
								<h5><a href="{{asset("products/".$product->category->name."/".$product->productId)}}">{{$product->name}}</a></h5>
								<div class="simpleCart_shelfItem">
									@if($product->salePrice < $product->price)
									<p ><span>{{$product->price}}VND</span> <i  class="item_price" price ="{{$product->salePrice}}"
										color ="{{$product->color}}" size = "{{$product->size}}">{{$product->salePrice}}VND</i></p>
									@else
									<p ><i class="item_price" price ="{{$product->salePrice}}" color ="{{$product->color}}"
										size = "{{$product->size}}">{{$product->salePrice}}VND</i></p>
									@endif
									<p ><a  class="item_add" id = "{{$product->productId}}" href ="javascript:void(0)" role="button">Add to cart</a></p>
								</div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"> </div>
					</div>
					
					<div style = "text-align: center;">
							{{ $products->onEachSide(5)->links() }}
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	@endif
	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">	
				@if(count($products_related)!=0)
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
							
							<h5><a href="{{asset("products/".$pro_relate->category->name."/".$pro_relate->productId)}}">{{$pro_relate->name}}</a></h5>
								<div class="simpleCart_shelfItem">
									@if($pro_relate->salePrice < $pro_relate->price)
									<p><span>{{$pro_relate->price}}VND</span> <i class="item_price" price ="{{$product->salePrice}}"
										color ="{{$product->color}}" size = "{{$product->size}}">{{$pro_relate->salePrice}}VND</i></p>
									@else
									<p><i class="item_price" price ="{{$pro_relate->salePrice}}" color ="{{$pro_relate->color}}" 
										size = "{{$pro_relate->size}}">{{$pro_relate->salePrice}}VND</i></p>
									@endif
									<p><a class="item_add" id = "{{$pro_relate->productId}}" href="javascript:void(0)">Add to cart</a></p>
								</div>
						</div>
						
					</div>
				</li>
				@endforeach
				@endif
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
		<script type="text/javascript" src="{{asset('js/products.js')}}"></script>
	</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection