<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	<h2 class="text-center">Add Table</h2>
	
	<?php echo form_open('table/add', array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		<p class="form-group">
			<label for="Name">Number:</label>
			<input type="text" name="number" class="form-control" id="Name">
		</p>

		<p class="form-group">
			<label for="Email">Name:</label>
			<input type="text" name="name" class="form-control" id="Email">
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
		
</div>