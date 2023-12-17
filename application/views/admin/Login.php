<?php include('header.php');?>
<div class="container" style="margin-top: 20px;">
	<h1>Admin Form</h1>
	<?php if($error=$this->session->flashdata('Login_Failed')): ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert alert-danger">
					<?= $error; ?>
				</div>
				
			</div>
			
		</div>
	<?php endif; ?>

	<!-- <form action="base_url('admin/index')"> -->
		<?php echo form_open('login/index'); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="uname">Username:</label>
					<!-- <input type="email" class="form-control" id="email"> -->
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'uname','value'=> set_value('uname')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('uname');?>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="pwd">Password:</label>
					<!-- <input type="Password" class="form-control" id="pwd"> -->
					<?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'pass','value'=> set_value('pass')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('pass');?>
			</div>
		</div>
		<?php echo form_submit(['type'=>'submit','class'=>'btn btn-dark','value'=>'Submit']);?>
		<!-- <button type="submit" class="btn btn-default">Submit</button> -->
		<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
		<?php echo anchor('admin/register','Sign up?','class="link_class"')?>
	<!-- </form> -->
</div>
	<!-- <?php echo validation_errors();?> -->
s
<?php include('footer.php');?>