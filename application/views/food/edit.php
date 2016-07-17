<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	{food}
	
	<h2 class="text-center">Edit {name}</h2>
	
	<?php echo form_open('food/edit/'.$id, array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Name">Name:</label>
			<input type="text" name="name" class="form-control" id="Name" value="{name}">
		</p>
		
		<p class="form-group">
			<label for="Unit">Unit:</label>
			<input type="text" name="unit" class="form-control" id="Unit" value="{unit}">
		</p>
		
		<p class="form-group">
			<label for="price">Price:</label>
			<input type="text" name="price" class="form-control" id="price" value="{price}">
		</p>
	
	{/food}
	
		<label for="">Category:</label>
		<p class="form-group text-center">
			{category}
			<label class="radio-inline"><input value="{id}" type="radio" name="category">{name}</label>
			{/category}
		</p>
		
		<label for="">Printing:</label>
		<p class="form-group text-center">
			{printing}
			<label class="radio-inline"><input value="{id}" type="radio" name="printing">{name}</label>
			{/printing}
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
		
</div>