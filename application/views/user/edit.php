<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	
	{user}
	
	<h2 class="text-center">Edit {name}</h2>
	
	<?php echo form_open('user/edit/'.$id, array('class'=>'form white')); ?>
		
		<div class="form-group text-center text-danger">
			<?php echo validation_errors(); ?>
		</div>
		<p class="form-group">
			<label for="Name">Name:</label>
			<input type="text" name="name" class="form-control" id="Name" value="{name}">
		</p>

		<p class="form-group">
			<label for="Email">Email:</label>
			<input type="email" name="email" class="form-control" id="Email" value="{email}">
		</p>
		
		<p class="form-group">
			<label for="Pass">Password:</label>
			<input type="password" name="pass" class="form-control" id="Pass" value="{pass}">
		</p>
		
		<p class="form-group text-center">
			<label class="radio-inline"><input value="admin" type="radio" name="roll">Admin</label>
			<label class="radio-inline"><input value="owner" type="radio" name="roll">Owner</label>
			<label class="radio-inline"><input value="coock" type="radio" name="roll">Coock</label>
			<label class="radio-inline"><input value="manager" type="radio" name="roll">Manager</label>
			<label class="radio-inline"><input value="waiter" type="radio" name="roll" checked>Waiter</label>
		</p>
		
		<p class="form-group text-right">
			<input class="btn btn-success" type="submit" name="submit" class="form-control">
		</p>

	<?php echo form_close(); ?>
	
	{/user}
		
</div>