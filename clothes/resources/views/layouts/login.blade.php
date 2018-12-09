<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			@if(empty(session('user_id')))
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				@if(empty(session('message')))
					@if(empty(session('success_mess')) && empty(session('failure_mes')))
						<h4 class="modal-title" id="myModalLabel">	
							Don't Wait, Login now!
						</h4>
					@endif
					@if(!empty(session('success_mes')))
						<div class="alert alert-success" id="myModalLabel">
						{{session('success_mes')}}
						<?php session()->forget('sucess_mes'); ?>
						</div>
					@endif
					@if(!empty(session('failure_mes')))
					<div class="alert alert-danger" id="myModalLabel">
						{{session('failure_mes')}}
						<?php session()->forget('failure_mes'); ?>
					</div>
					@endif
				@else
					<div class="alert alert-danger" id="myModalLabel">
						{{session('message')}}
						<?php session()->forget('message'); ?>
					</div>
				@endif
			</div>
			@else
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				<h4 class="modal-title" id="myModalLabel">	
					Welcome to the Shop
				</h4>
				<h4 class="modal-title" id="myModalLabel">	
					Your Information:
				</h4>
			</div>
			@endif
			<div class="modal-body modal-body-sub">
				<div class="row">
					@if(empty(session('user_id')))
					<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
						<div class="sap_tabs">	
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<ul>
									<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
									<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
								</ul>		
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
										<div class="register">
											<form action="{{url('/checklogin')}}" method="post">
												{!! csrf_field() !!}			
												<input name="email" placeholder="Email Address" type="text" required="">						
												<input name="password" placeholder="Password" type="password" required="">										
												<div class="sign-up">
													<input type="submit" value="Sign in"/>
												</div>
											</form>
										</div>
									</div> 
								</div>	

								<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
										<div class="register">
											<form action="{{url('/register')}}" method="post">
											{!! csrf_field() !!}			
												<input placeholder="Name" name="name" type="text" required="">
												<input placeholder="Address" name="address" type="text" required="">
												<input placeholder="Email Address" name="email" type="email" required="">	
												<input placeholder="Password" name="password" type="password" required="">	
												<input placeholder="Confirm Password" name="confirm_password" type="password" required="">
												<div class="sign-up">
													<input type="submit" value="Create Account"/>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div class="tab-3	 resp-tab-content" aria-labelledby="tab_item-2">
									<div class="facts">
										<div class="register">
											<form action="#" method="post">			
												<input placeholder="Name" name="Name" type="text" required="">
												<input placeholder="Email Address" name="Email" type="email" required="">	
												<input placeholder="Password" name="Password" type="password" required="">	
												<input placeholder="Confirm Password" name="Password" type="password" required="">
												<div class="sign-up">
													<input type="submit" value="Create Account"/>
												</div>
											</form>
										</div>
									</div>
								</div> 			        					            	      
							</div>	
						</div>
						<script src="{{asset("js/easyResponsiveTabs.js")}}" type="text/javascript"></script>
						<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
						</script>
						<div id="OR" class="hidden-xs">
							OR</div>
					</div>
					<div class="col-md-4 modal_body_right modal_body_right1">
						<div class="row text-center sign-with">
							<div class="col-md-12">
								<h3 class="other-nw">
									Sign in with</h3>
							</div>
							<div class="col-md-12">
								<ul class="social">
									<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
									<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
									<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
									<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
								</ul>
							</div>
						</div>
					</div>
					@else
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;</button>
							@if(empty($message))
								@if(empty($mes_success))
								@else
									<div class="alert alert-success" id="myModalLabel">
									{{$mes_success}}
									</div>
								@endif
							@else
								<div class="alert alert-danger" id="myModalLabel">
									{{$message}}
								</div>
							@endif
						</div>
						<div class="col-md-6 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="card" style="width: 18rem;">
							  <div class="card-header">
							    
							  </div>
							  <ul class="list-group list-group-flush">
							    <li class="list-group-item">Your Name : {{session('username')}}</li>
							    <li class="list-group-item">Your Email : {{session('email')}}</li>
							    <li class="list-group-item">Your Address : {{session('address')}}</li>
							  </ul>
							</div>
							<div>
								<a class="btn btn-primary" href="/logout">Log out</a>
								<button class="btn btn-primary" id="editProfile">Edit</button>
								<a class="btn btn-primary" href="/myorders/{{session('user_id')}}">My Orders</a>
								<script>
									$(document).ready(function() {
										$("#editProfile").click(function(){
											$("#editForm").css("display", "block");
										});
									});
								</script>
							</div>
						</div>
						<div class="col-md-6 modal_body_right modal_body_right1" id="editForm" style="display: none">
							<form action="{{url('/update')}}" method="post">
								{!! csrf_field() !!}
							  <div class="form-group">
							    <input type="text" name="name" class="form-control" value="{{session('username')}}" placeholder="Your Name" required="">
							  </div>
							  <div class="form-group">
							    <input type="email" name="email" class="form-control" value="{{session('email')}}" placeholder="Your email" required="" readonly>
							  </div>
							  <div class="form-group">
							    <input type="text" name="password" class="form-control" value="{{session('password')}}" placeholder="Your email" required="" >
							  </div>
							  <div class="form-group">
							    <input type="text" name="address" class="form-control" value="{{session('address')}}" placeholder="Your email" required="" >
							  </div>
							  <button type="submit" class="btn btn-primary">Save Your Change</button>
							</form>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade in" id="myModal_infor" tabindex="-1" role="dialog" aria-labelledby="myModal88"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>					
