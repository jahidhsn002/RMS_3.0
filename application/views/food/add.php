<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	<h2 class="text-center">Add Food</h2>
	
	<?php echo form_open_multipart('food/add', array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors() . $this->upload->display_errors(); ?>
		</div>
		
		<p class="form-group">
			<label for="Email">Name:</label>
			<input type="text" name="name" class="form-control" id="Email">
		</p>
		
		<p class="form-group">
			<label for="Image">Image:</label>
			<input type="file" name="thumb" class="form-control" id="Image">
		</p>
		
		<p class="form-group">
			<label for="Unit">Unit:</label>
			<input type="text" name="unit" class="form-control" id="Unit">
		</p>
		
		<p class="form-group">
			<label for="price">Price:</label>
			<input type="text" name="price" class="form-control" id="price">
		</p>
		
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