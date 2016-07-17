<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<h2>Supply Food</h2>
	<?php if($success != ''){ ?>
		<div class="text-center text-success" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-success" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $success; ?></b></div>
		</div>
	<?php }else if($error != ''){ ?>
		<div class="text-center text-danger" style="margin-bottom: 5px;margin-top: 5px;">
			<div class="bg-danger" style="border: 1px solid #cccccc;padding: 5px;"><b><?php echo $error; ?></b></div>
		</div>
	<?php } ?>
	
	<?php if(!isset($_GET['category']) && isset($_GET['food'])): ?>
	<div class="supply">
		
		<?php echo form_open('stock/add', array('class'=>'form white')); ?>
			
			<h4 class="text-center"><?php echo $this->Db->get_value_where_select('food', array('id'=>$_GET['food']), 'name'); ?></h4>
			
			<div class="text-center">
				<image class="img-center img-responsive" src="<?php echo site_url('upload'); ?>/<?php echo $this->Db->get_value_where_select('food', array('id'=>$_GET['food']), 'thumb'); ?>">
			</div>
			
			<div class="form-group text-center text-danger">
				<?php echo validation_errors(); ?>
			</div>
			
			<input type="hidden" name="id" value="<?php echo $_GET['food']; ?>">
			
			<p class="form-group">
				<label for="Quantity">Quantity:</label>
				<input type="text" name="qty" value="0" class="form-control" id="Quantity">
			</p>
			
			<p class="form-group">
				<label for="Total">Total:</label>
				<input type="text" name="total" value="0" class="form-control" id="Total">
			</p>
			
			<p class="form-group">
				<label for="Paid">Paid:</label>
				<input type="text" name="paid" value="0" class="form-control" id="Paid">
			</p>
			
			<label for="">Supplier:</label>
			<select name="supplier" class="form-control">
				{supplier}
				<option value="{id}">{company}-{name}</option>
				{/supplier}
			</select>
			
			<p class="form-group text-right">
				<input class="btn btn-success" type="submit" name="submit" class="form-control">
			</p>

		<?php echo form_close(); ?>
		
	</div>
	<?php elseif(isset($_GET['category']) && !isset($_GET['food'])): ?>
	<div class="food">
		<div class="row">
			{food}
			<div class="col-sm-6 col-md-3">
				<a class="content text-center" href="<?php echo site_url('stock/supply'); ?>?food={id}">
					<image class="img-center img-responsive" src="<?php echo site_url('upload'); ?>/{thumb}">
					<h4>{name}</h4>
				</a>
			</div>
			{/food}
		</div>
	</div>
	<?php else: ?>
	<div class="category">
		<div class="row">
			{category}
			<div class="col-sm-6 col-md-3">
				<a class="content text-center" href="<?php echo site_url('stock/supply'); ?>?category={id}">
					<image class="img-center img-responsive" src="<?php echo site_url('upload'); ?>/{thumb}">
					<h4>{name}</h4>
				</a>
			</div>
			{/category}
		</div>
	</div>
	<?php endif; ?>
	
</div>
