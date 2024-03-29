
<?php include('header.php');?>

<!-- <?php print_r($articles);?> -->

<div class="container" style="margin-top:40px;">
	<div class="row a_art">
		<!-- <a href="adduser" class="btn btn-primary" style=" width:150px;align:center;">Add Articles</a> -->
		<?php echo anchor('admin/adduser','Add Articles','class="btn btn-lg btn-primary"')?>
	</div>
	<!-- <h1> Welcome Admin</h1> -->
	<div class="row">
		<?php if($error=$this->session->flashdata('msg')): 
			$msg_class=$this->session->flashdata('msg_class')
		?>
			<div class="row">
				<div class="col-lg-6">
					<div class="alert <?= $msg_class?>">
						<?= $error; ?>
					</div>
					
				</div>
				
			</div>
		<?php endif; ?>
	</div>
	<div class="table">
		<table>
			<thead>
				<tr>
					<th>S.No</th>
					<th>Article Title</th>
					<th>Article Body</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php if(count($articles)): ?>
				<?php $count=$this->uri->segment(3);?>
				<?php foreach($articles as $art): ?>
					<tr>
						<td><?= ++$count;?></td>
						<td><?= $art->article_title; ?></td>
						<td><?= $art->article_body?></td>
						<td>
							<?=
								form_open('admin/edituser/'.$art->id),
								// form_hidden('id',$art->id),
								form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-primary']),
								form_close();
							?>
							<!-- <a href="#" class="btn btn-primary">Edit</a> -->
						</td>
						<td>
							<?=
								form_open('admin/Delarticle'),
								form_hidden('id',$art->id),
								form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-danger']),
								form_close();
							?>
							<!-- <a href="#" class="btn btn-danger">Delete</a>-->
						</td> 
					</tr>
				<?php endforeach; ?>
			<?php else:?>
				<tr>
					<td colspan="3">No data Avilable</td>
				</tr>
			<?php endif; ?>
			</tbody>
			
		</table>
	</div>
	<!-- <ul class="pagination">
		<li><a href=""><</a></li>
		<li><a href="">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="" class="active">3</a></li>
		<li><a href="">4</a></li>
		<li><a href="">5</a></li>
		<li><a href="">></a></li>
	</ul> -->

	<?= $this->pagination->create_links(); ?>
</div>


<?php include('footer.php');?>
