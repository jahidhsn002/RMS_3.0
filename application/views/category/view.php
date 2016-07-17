<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Manage Category</h2>
	<?php if($success != ''){ ?>
		<div class="text-center text-success" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-success" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $success; ?></b></div>
		</div>
	<?php }else if($error != ''){ ?>
		<div class="text-center text-danger" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-danger" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $error; ?></b></div>
		</div>
	<?php } ?>
	<div class="table-responsive" data-pattern="priority-columns">
		<table class="table white table-bordered">
			<thead>
				<tr>
					<th data-priority="4">Image</th>
					<th data-priority="3">ID</th>
					<th data-priority="1">Name</th>
					<th data-priority="2" class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				{category}
				<tr>
					<td><img height="35" width="35" src="<?php echo site_url('upload'); ?>/{thumb}"></td>
					<td><?php echo $prefix; ?>{id}</td>
					<td>{name}</td>
					<td class="text-right">
						<a class="btn btn-sm btn-primary" href="<?php echo site_url('category/edit'); ?>/{id}"><span class="glyphicon glyphicon-edit"></span></a>
						<a class="btn btn-sm btn-danger" href="<?php echo site_url('category/remove'); ?>/{id}"><span class="glyphicon glyphicon-remove-circle"></span></a>
					</td>
				</tr>
				{/category}
			</tbody>
		</table>
	</div>
</div>
