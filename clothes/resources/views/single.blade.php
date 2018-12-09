@extends('layouts.app')
<!-- header -->
@section('header')
  @include("layouts.login")
	@include('layouts.header')
	@include('layouts.nav')
@endsection
@section('content')

<style type="text/css">
	div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
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
					<div class="stars">
					  <form action="">
					    <input class="star star-5 rating" id="star-5" type="radio" value="5" />
					    <label class="star star-5 rating" for="star-5"></label>
					    <input class="star star-4 rating" id="star-4" type="radio" value="4" />
					    <label class="star star-4 rating" for="star-4"></label>
					    <input class="star star-3 rating" id="star-3" type="radio" value="3" />
					    <label class="star star-3 rating" for="star-3"></label>
					    <input class="star star-2 rating" id="star-2" type="radio" value="2" />
					    <label class="star star-2 rating" for="star-2"></label>
					    <input class="star star-1 rating" id="star-1" type="radio" value="1" />
					    <label class="star star-1 rating" for="star-1"></label>
					    <input type="hidden" id="rate_star" value="" size="20" maxlength="10" />
					  </form>
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
									<p><a class="item_add" id = "{{$product->productId}}" href="javascript:void(0)">Add to cart</a></p>
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
						<h4>Reviews</h4>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="{{asset('images_admin/1.png')}}" alt=" " class="img-responsive" />
							</div>
							<div id="reviews" class="col-xs-10 additional_info_sub_grid_right">
								@foreach($comment_star as $c_s)
									<div class="additional_info_sub_grid_rightl rm{{$c_s->userId}}">
										<a>{{$c_s->userName}}</a>
										<h5>{{$c_s->date}}</h5>
										<p>{{$c_s->comment}}.</p>
									</div>
									<div class="additional_info_sub_grid_rightr rm{{$c_s->userId}}">
										<div class="rating">
									@for($i=0; $i< $c_s->star; $i++)
										<div class="rating-left rm{{$c_s->userId}}">
											<img src="{{asset('images_admin/star-.png')}}" alt=" " class="img-responsive">
										</div>							
									@endfor
									<div class="clearfix"> </div>
										</div>
									</div>			
								@endforeach																		
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
							<form action="#" method="post">
								<textarea id="review" name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input id="submit_review" type="submit" value="Submit" >
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
								<h5><a href="{{asset("products/".$pro_relate->category->name."/".$pro_relate->productId)}}">{{$pro_relate->name}}</a></h5>
								<div class="simpleCart_shelfItem">
										@if($pro_relate->salePrice < $product->price)
										<p><span>{{$pro_relate->price}}VND</span> <i class="item_price">{{$pro_relate->salePrice}}VND</i></p>
										@else
										<p><i class="item_price">{{$pro_relate->salePrice}}VND</i></p>
										@endif
										<p><a class="item_add" id = "{{$pro_relate->productId}}" href="javascript:void(0)">Add to cart</a></p>
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
				<script type="text/javascript" src="{{asset('js/single.js')}}"></script>
				
<script type="text/javascript">
    $(document).ready(function(){
         $('.rating').change(function(e){
            val = $(this).val();
            var currentdate = new Date(); 
    		var datetime = currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getDate() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }

              });
            $.ajax({
                type: 'GET',
                url: {{$product->productId}}+'/update_rating?rating=' + val + '&id='+{{$product->productId}}+'&time='+datetime,   
                  success: function(data){
                    alert(data);
                  }});
               });
            });
        </script>

 <script type="text/javascript">
    $(document).ready(function(){
         $('#submit_review').on('click', function(e){
         	var currentdate = new Date(); 
    		var datetime = currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getDate() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
            val = $('#review').val();
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }

              });
            $.ajax({
                type: 'GET',
                url: {{$product->productId}}+'/update_comment?comment=' + val + '&id='+{{$product->productId}}+'&time='+datetime, 
                  success: function(data){
                  	if($('.'+'rm{{session('user_id')}}'))
                  		$('.'+'rm{{session('user_id')}}').remove();
                    $('#reviews').append('<div class="additional_info_sub_grid_rightl rm{{session('user_id')}}"><a>'+'{{session('username')}}'+'</a><h5>'+datetime+'</h5><p>'+val+'.</p></div><div class="additional_info_sub_grid_rightr rm{{session('user_id')}}"><div class="rating">');
                    for (var i = 0; i < data ; i++) {
                    	$('#reviews').append('<div class="rating-left rm{{session('user_id')}}"><img src="{{asset("images_admin/star-.png")}}" alt=" " class="img-responsive"></div>');
                    }
                    $('#reviews').append('<div class="clearfix"> </div></div></div>');   
                  }});
               });
            });
        </script>
		</div>
	</div>


@endsection
@section('footer')
	@include('layouts.footer')
@endsection