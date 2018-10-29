<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php if(empty(session('user_id'))): ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				<?php if(empty($message)): ?>
					<?php if(empty($mes_success)): ?>
						<h4 class="modal-title" id="myModalLabel">	
							Don't Wait, Login now!
						</h4>
					<?php else: ?>
						<div class="alert alert-success" id="myModalLabel">
						<?php echo e($success('mes_success')); ?>

						</div>
					<?php endif; ?>
				<?php else: ?>
					<div class="alert alert-danger" id="myModalLabel">
						<?php echo e($message); ?>

					</div>
				<?php endif; ?>
			</div>
			<?php else: ?>
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
			<?php endif; ?>
			<div class="modal-body modal-body-sub">
				<div class="row">
					<?php if(empty(session('user_id'))): ?>
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
											<form action="<?php echo e(url('/checklogin')); ?>" method="post">
												<?php echo csrf_field(); ?>			
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
											<form action="<?php echo e(url('/register')); ?>" method="post">
											<?php echo csrf_field(); ?>			
												<input placeholder="Name" name="name" type="text" required="">
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
						<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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
					<?php else: ?>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;</button>
							<?php if(empty($message)): ?>
								<?php if(empty($mes_success)): ?>
								<?php else: ?>
									<div class="alert alert-success" id="myModalLabel">
									<?php echo e($mes_success); ?>

									</div>
								<?php endif; ?>
							<?php else: ?>
								<div class="alert alert-danger" id="myModalLabel">
									<?php echo e($message); ?>

								</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="card" style="width: 18rem;">
							  <div class="card-header">
							    
							  </div>
							  <ul class="list-group list-group-flush">
							    <li class="list-group-item">Your Name : <?php echo e(session('username')); ?></li>
							    <li class="list-group-item">Your Email : <?php echo e(session('email')); ?></li>
							  </ul>
							</div>
							<div>
								<a class="btn btn-primary" href="/logout">Log out</a>
								<button class="btn btn-primary" id="editProfile">Edit</button>
								<a class="btn btn-primary" href="/change_password/<?php echo e(session('user_id')); ?>">Change Password</a>
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
							<form action="<?php echo e(url('/update')); ?>" method="post">
								<?php echo csrf_field(); ?>

							  <div class="form-group">
							    <input type="text" name="name" class="form-control" value="<?php echo e(session('username')); ?>" placeholder="Your Name" required="">
							  </div>
							  <div class="form-group">
							    <input type="email" name="email" class="form-control" value="<?php echo e(session('email')); ?>" placeholder="Your email" required="">
							  </div>
							  <button type="submit" class="btn btn-primary">Save Your Change</button>
							</form>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
