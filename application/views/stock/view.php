<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Food Stock</h2>
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
					<th data-priority="3">Food ID</th>
					<th data-priority="1">Name</th>
					<th data-priority="7">Category</th>
					<th data-priority="5">Price</th>
					<th data-priority="2">Stock</th>
					<th data-priority="4">Wastage</th>
					<th data-priority="6" class="text-right">Wastage Control</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($stock as $food): ?>
				<tr class="<?php if($food->stock < 10){echo "bg-danger";}; ?>">
					<td><?php echo $prefix . $food->food_id; ?></td>
					<td><?php echo $this->Db->get_value_where_select('food', array('id' => $food->food_id), 'name'); ?></td>
					<td>
						<?php 
							$category = $this->Db->get_value_where_select('food', array('id' => $food->food_id), 'category');
							echo $this->Db->get_value_where_select('category', array('id' => $category), 'name'); 
						?>
					</td>
					<td><?php echo $food->price . $price_unit; ?></td>
					<td><?php echo $food->stock . $this->Db->get_value_where_select('food', array('id' => $food->food_id), 'unit'); ?></td>
					<td><?php echo $food->wastage . $this->Db->get_value_where_select('food', array('id' => $food->food_id), 'unit'); ?></td>
					<td class="text-right">
						<?php echo form_open('stock', array('class'=>'form-inline white')); ?>
							<input type="hidden" name="sid" value="<?php echo $food->food_id; ?>">
							<input type="text" name="qty" class="form-control" id="Name" value="0" step="any">
							<input class="btn btn-success" type="submit" name="submit" value="Change" class="form-control">
						<?php echo form_close(); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
