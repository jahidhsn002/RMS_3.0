<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Supply History</h2>
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
					<th data-priority="3">Order ID</th>
					<th data-priority="1">Name</th>
					<th data-priority="7">Quantity</th>
					<th data-priority="5">Price</th>
					<th data-priority="2">Total</th>
					<th data-priority="4">Supplier(id)</th>
					<th data-priority="8">Date</th>
					<th data-priority="9">Slip</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($history_supply as $food): ?>
				<tr>
					<td><?php echo $prefix . $food->id; ?></td>
					<td><?php echo $food->name; ?></td>
					<td><?php echo $food->stock . $food->unit; ?></td>
					<td><?php echo $food->price . $price_unit; ?></td>
					<td><?php echo $food->total . $price_unit; ?></td>
					<td><?php echo $food->supplier_name; ?>(<?php echo $prefix . $food->supplier; ?>)</td>
					<td><?php echo unix_to_human($food->time, FALSE, 'us'); ?></td>
					<td><a class="btn btn-sm btn-primary" href="<?php echo site_url('stock/slip/' . $food->id); ?>"><span class="glyphicon glyphicon-credit-card"></span></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
