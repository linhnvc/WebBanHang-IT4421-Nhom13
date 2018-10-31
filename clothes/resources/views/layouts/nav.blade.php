<div class="navigation">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{url('/')}}" class="act">Home</a></li>	
					<!-- Mega Menu -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="col-sm-3">
									<ul class="multi-column-dropdown">
										<h6>Dress</h6>
										@foreach($dressGroup as $group)
									    <li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
										@endforeach
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="multi-column-dropdown">
										<h6>Common</h6>
										@foreach($commonGroup as $group)
											<li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
										@endforeach
									</ul>
								</div>
								<div class="col-sm-2">
									<ul class="multi-column-dropdown">
										<h6>Beach</h6>
										@foreach($beachGroup as $group)
											<li><a href="/products/{{$group->name}}">{{$group->name}}</a></li>
										@endforeach
									</ul>
								</div>
								<div class="col-sm-4">
									<div class="w3ls_products_pos">
										<h4>50%<i>Off/-</i></h4>
									<img src="{{asset('images_admin/1.jpg')}}" alt=" " class="img-responsive" />
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</ul>
					</li>
					<li><a href="{{url('/about')}}">About Us</a></li>
					<li><a href="{{url('/short_codes')}}">Short Codes</a></li>
					<li><a href="{{url('/mail')}}">Mail Us</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>