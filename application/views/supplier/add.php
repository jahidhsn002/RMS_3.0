<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	<h2 class="text-center">Add Supplier</h2>
	
	<?php echo form_open('supplier/add', array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Company">Company:</label>
			<input type="text" name="company" class="form-control" id="Company">
		</p>
		
		<p class="form-group">
			<label for="Email">Name:</label>
			<input type="text" name="name" class="form-control" id="Email">
		</p>
		
		<p class="form-group">
			<label for="Designation">Designation:</label>
			<input type="text" name="designation" class="form-control" id="Designation">
		</p>
		
		<p class="form-group">
			<label for="Address">Address:</label>
			<textarea name="address" class="form-control" id="Address"></textarea>
		</p>
		
		<p class="form-group">
			<label for="Contact">Contact:</label>
			<textarea name="contact" class="form-control" id="Contact"></textarea>
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
		
</div>