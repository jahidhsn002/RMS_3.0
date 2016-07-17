<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Order Food</h2>
	<?php if($success != ''){ ?>
		<div class="text-center text-success" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-success" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $success; ?></b></div>
		</div>
	<?php }else if($error != ''){ ?>
		<div class="text-center text-danger" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-danger" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $error; ?></b></div>
		</div>
	<?php } ?>
	
	<p><a href="<?php echo site_url('salse'); ?>" class='btn btn-warning'>Categories</a></p>
	
	<?php if(!isset($_GET['category']) && !isset($_GET['food']) && isset($_GET['cart'])): ?>
	<div class="supply">
		
		<?php echo form_open('salse/update_cart'); ?>
		<input type="hidden" name="refar" value="salse/?cart=1">
		<?php $this->load->view('salse/cart'); ?>
		<p class="text-right">
			<button type="submit" class='btn btn-success'>Update</button>
			<a href="<?php echo site_url('salse?cart=0'); ?>" class='btn btn-danger'>Clear</a>
		</p>
		<?php echo form_close(); ?>
		
		<?php echo form_open('salse/complete_partsell'); ?>
		<p class="form-inline">
			Discount
			<select class="form-control" name="discount">
				{discount}
				<option value="{id}">{name} ({value}-{type})</option>
				{/discount}
			</select>
			Paid <input type="text" class="form-control" name="paid" value="">
			Payment Method
			<select class="form-control" name="payment">
				{payment}
				<option>{name}</option>
				{/payment}
			</select>
		</p>
		<p class="text-right">
			<button type="submit" class='btn btn-primary'>Submit</button>
		</p>
		<?php echo form_close(); ?>
		
	</div>
	<?php elseif(isset($_GET['category']) && !isset($_GET['food']) && !isset($_GET['cart'])): ?>
	<div class="food">
		<div class="row">
			<?php foreach($foods as $food): ?>
			<div class="col-sm-6 col-md-3">
				<a class="text-center content" href="<?php echo site_url('salse'); ?>?food=<?php echo $food['id']; ?>">
					<image class="img-center img-responsive" src="<?php echo site_url('upload'); ?>/<?php echo $food['thumb']; ?>">
					<div class="h5"><?php echo $food['name']; ?></div>
					<button class="btn btn-warning" type="button">
						<?php echo $food['price']; ?><span class="badge"><?php echo $this->Db->get_value_where_select('stock', array('food_id'=>$food['id']), 'stock'); ?><?php echo $food['unit']; ?> left</span>
					</button>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php else: ?>
	<!-- <div class="category">
		<div class="row">
			{category}
			<div class="col-sm-6 col-md-3">
				<a class="content text-center" href="<?php echo site_url('salse'); ?>?category={id}">
					<image class="img-center img-responsive" src="<?php echo site_url('upload'); ?>/{thumb}">
					<h4>{name}</h4>
				</a>
			</div>
			{/category}
		</div>
	</div> -->
	<div class="category">
		<div class="row">
			{table}
			<div class="col-sm-6 col-md-3">
				<a class="content tbl text-center" href="<?php echo site_url('salse'); ?>?category={id}">
					<h4>{number}-{name}</h4>
				</a>
			</div>
			{/table}
		</div>
	</div> 
	<?php endif; ?>
	
</div>
