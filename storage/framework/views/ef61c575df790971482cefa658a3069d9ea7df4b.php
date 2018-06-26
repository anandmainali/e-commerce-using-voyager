<?php $__env->startSection('class'); ?>
page-inner <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- login-page -->
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">Login</div>

					<div class="panel-body"><br>
						<form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  autofocus>

									<?php if($errors->has('email')): ?>
										<span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" >

									<?php if($errors->has('password')): ?>
										<span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
									<?php endif; ?>
								</div>
							</div>

							

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Login
									</button>&emsp;
									Not a Member? <a href="<?php echo e(route('register')); ?>">Sign Up Now »</a>
								
									<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
										Forgot Your Password?
									</a>



                                </div>
							</div>

						</form>
						<div class="col-md-8 col-md-offset-4">
						        <h4>--------------- OR ---------------</h4>
                        </div>           
                        
						<div class="col-md-10 col-md-offset-1">
						<br>
						<a href="<?php echo e(url('login/facebook')); ?>"><button class="loginBtn loginBtn--facebook">
						  							Login with Facebook
						</button></a>
									<a href="<?php echo e(url('login/google')); ?>"><button class="loginBtn loginBtn--google">
                                    Login with Google
                                </button></a><br>

  
                                <br>
                                </div>
                                   
                                    
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- //login-page -->
	<br><br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>