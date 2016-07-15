<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	{table}
	
	<h2 class="text-center">Edit {name}</h2>
	
	<?php echo form_open('table/edit/'.$id, array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Email">Number:</label>
			<input type="text" name="number" class="form-control" id="Email" value="{number}">
		</p>
		
		<p class="form-group">
			<label for="Name">Name:</label>
			<input type="text" name="name" class="form-control" id="Name" value="{name}">
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
	
	{/table}
		
</div>