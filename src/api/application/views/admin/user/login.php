<div class="col-md-3 col-md-offset-4 login-admin">
	<?php echo form_open('','class="login-form-signin"');?>
			<h2 class="login-form-signin-heading">Login Your Account</h2>
		    <div class="login-wrap">
		    	<?php echo notify(validation_errors(),'alert-danger'); ?>
				<?php echo notify($this->session->flashdata('error'),'alert-danger'); ?>
		    	<?php echo form_input('username','','autofocus placeholder="User ID" class="form-control"'); ?>
		    	<br>
		        <?php echo form_password('password','','placeholder="Password" class="form-control"'); ?>
		        <br>

		        <?php echo form_submit('submit', 'Log in', 'class="btn btn-lg btn-primary btn-block"'); ?>
		        
		        <small> <center> &copy; <?php echo date('Y'); ?> <?php echo $meta_title; ?> </center> </small>
		    </div>
  	<?php echo form_close();?>
</div>