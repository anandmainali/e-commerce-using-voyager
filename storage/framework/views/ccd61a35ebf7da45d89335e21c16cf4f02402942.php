<?php $__env->startSection('class'); ?>
page-inner <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- sign up-page -->
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">Register</div>

					<div class="panel-body">
					    <br>
						<form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
								<label for="name" class="col-md-4 control-label">Name</label>

								<div class="col-md-6">
								    <?php if(!empty($name)): ?>

                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e($name); ?>" required autofocus>

                                    <?php else: ?>
									<input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
									<?php endif; ?>

									<?php if($errors->has('name')): ?>
										<span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
								    <?php if(!empty($email)): ?>
								    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($email); ?>" required>
								    <?php else: ?>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php endif; ?>
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
									<input id="password" type="password" class="form-control" name="password" required>

									<?php if($errors->has('password')): ?>
										<span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Register
									</button><br>
									Already a Member? <a href="<?php echo e(route('login')); ?>">LogIn Now</a>
								</div>
							</div>
						</form>
						<div class="col-md-8 col-md-offset-4">
						        <h4>-------------------- OR --------------------</h4>
                        </div>            
						<div class="col-md-10 col-md-offset-1">
						<br>

						<a href="<?php echo e(url('login/facebook')); ?>"><button class="loginBtn loginBtn--facebook">
						  							SignUp with Facebook
						</button></a>
									<a href="<?php echo e(url('login/google')); ?>"><button class="loginBtn loginBtn--google">
                                    SignUp with Google
                                </button></a><br>

  
                                <br>
                                </div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- //sign up-page -->

	<br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>