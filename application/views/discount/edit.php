<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	{discount}
	
	<h2 class="text-center">Edit {name}</h2>
	
	<?php echo form_open('discount/edit/'.$id, array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Name">Name:</label>
			<input type="text" name="name" class="form-control" id="Name" value="{name}">
		</p>
		
		<p class="form-group">
			<label for="Value">Value:</label>
			<input type="text" name="value" class="form-control" id="Value" value="{value}">
		</p>
		
		<p class="form-group text-center">
			<label class="radio-inline"><input value="parcent" type="radio" name="type">Parcentage</label>
			<label class="radio-inline"><input value="strait" type="radio" name="type">Strait</label>
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
	
	{/discount}
		
</div>