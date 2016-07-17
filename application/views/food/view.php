<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Manage Food</h2>
	
	<?php if($success != ''){ ?>
		<div class="text-center text-success" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-success" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $success; ?></b></div>
		</div>
	<?php }else if($error != ''){ ?>
		<div class="text-center text-danger" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-danger" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $error; ?></b></div>
		</div>
	<?php } ?>
	<form method="GET" action="<?php echo site_url("food"); ?>" class="form form-inline text-right">
		<div id="Filter" class="collapse">
			<div class="form-group">
				<div><b>Category:</b></div>
				<select class="form-control" multiple name="category[]">
					{category}
						<option value="{id}">{name}</option>
					{/category}
				</select>
			</div>
			<div class="form-group">
				<div><b>Printing:</b></div>
				<select class="form-control" multiple name="printing[]">
					{printing}
						<option value="{id}">{name}</option>
					{/printing}
				</select>
			</div>
		</div>
		<p class="text-right">
			<input class="btn btn-success" type="submit" value="Filter" class="form-control">
			<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#Filter">Expand</button>
		</p>
	</form>
	<div class="table-responsive" data-pattern="priority-columns">
		<table class="table white table-bordered">
			<thead>
				<tr>
					<th data-priority="4">Image</th>
					<th data-priority="3">ID</th>
					<th data-priority="1">Name</th>
					<th data-priority="5">Unit</th>
					<th data-priority="2" class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				{food}
				<tr>
					<td><img height="35" width="35" src="<?php echo site_url('upload'); ?>/{thumb}"></td>
					<td><?php echo $prefix; ?>{id}</td>
					<td>{name}</td>
					<td>{unit}</td>
					<td class="text-right">
						<a class="btn btn-sm btn-primary" href="<?php echo site_url('food/edit'); ?>/{id}"><span class="glyphicon glyphicon-edit"></span></a>
						<a class="btn btn-sm btn-danger" href="<?php echo site_url('food/remove'); ?>/{id}"><span class="glyphicon glyphicon-remove-circle"></span></a>
					</td>
				</tr>
				{/food}
			</tbody>
		</table>
	</div>
</div>
