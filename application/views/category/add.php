<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	<h2 class="text-center">Add Category</h2>
	
	<?php echo form_open_multipart('category/add', array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors() . $this->upload->display_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Email">Name:</label>
			<input type="text" name="name" class="form-control" id="Email">
		</p>
		
		<p class="form-group">
			<label for="Email">Image:</label>
			<input type="file" name="thumb" class="form-control" id="Email">
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
		
</div>