<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Basic Settings</h2>
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
					<th data-priority="1">Name</th>
					<th data-priority="2" class="text-right">Value</th>
				</tr>
			</thead>
			<tbody>
				{setting}
				<tr>
					<td>{name}</td>
					<td class="text-right">
						<?php echo form_open('settings', array('class'=>'form-inline white')); ?>
							<input type="hidden" name="sid" value="{id}">
							<input type="text" name="value" class="form-control" id="Name" value="{value}">
							<input class="btn btn-success" type="submit" name="submit" value="Change" class="form-control">
						<?php echo form_close(); ?>
					</td>
				</tr>
				{/setting}
			</tbody>
		</table>
	</div>
</div>
