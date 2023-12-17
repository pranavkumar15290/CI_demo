<?php include('header.php');?>
<div class="container" style="margin-top: 20px;">
	<h1>Admin Form</h1>

	<div class="row">
		<?php if($user=$this->session->flashdata('user')): 
			$user_class=$this->session->flashdata('user_class')
		?>
			<div class="row">
				<div class="col-lg-6">
					<div class="alert <?= $user_class?>">
						<?= $user; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>

		<?php echo form_open('admin/sendemail'); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="username">Username:</label>
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=> set_value('username')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('username');?>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="Password">Password:</label>
					<?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'Password','value'=> set_value('Password')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('Password');?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="Firstname">FirstName:</label>
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter firstname','name'=>'Firstname','value'=> set_value('Firstname')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('Firstname');?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="lastname">LastName:</label>
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter lastname','name'=>'lastname','value'=> set_value('lastname')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('lastname');?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="email">Email:</label>
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'email','value'=> set_value('email')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('email');?>
			</div>
		</div>
		<?php echo form_submit(['type'=>'submit','class'=>'btn btn-dark','value'=>'Submit']);?>
		<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
		
</div>

<?php include('footer.php');?>