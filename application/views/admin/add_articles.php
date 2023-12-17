<?php include('header.php');?>
<div class="container" style="margin-top: 20px;">
	<h1>Add Articles</h1>

	<!-- <form action="base_url('admin/index')"> -->
		<?php if($error=$this->session->flashdata('Insert_Failed')); ?>
		<?php echo form_open('admin/userValidation'); ?>
		<?php echo form_hidden('user_id',$this->session->userdata('id'));?>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<!-- <label for="title">Article Title:</label> -->
					<?= form_label('Article Title:','article_title');?>
					<!-- <input type="email" class="form-control" id="email"> -->
					<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','value'=> set_value('article_title')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('article_title');?>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-lg-6">
				<div class="form-group">
					<!-- <label for="body">Article Body:</label> -->
					<?= form_label('Article Body:','article_body');?>
					<!-- <input type="Password" class="form-control" id="pwd"> -->
					<?php echo form_textarea(['class'=>'form-control','placeholder'=>'Article body','name'=>'article_body','value'=> set_value('article_body')]);?>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top:30px;">
				<?php echo form_error('article_title');?>
			</div>
		</div>
		<?php echo form_submit(['type'=>'submit','class'=>'btn btn-dark','value'=>'Submit']);?>
		<!-- <button type="submit" class="btn btn-default">Submit</button> -->
		<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
	
</div>
	
<?php include('footer.php');?>