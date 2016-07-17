<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

{slip}

<div class="component">
	<h3 class="no_print text-center">Supplier Slip</h3>
	<table class="table slip">
		<thead>
		<tr>
			<td colspan="4" class="text-center">
				<img width="150px" src="<?php echo site_url('images/loogo.gif'); ?>" alt="LoGo">
			</td>
		</tr>
		<tr>
			<td colspan="4" class="text-center">House No 28, Road No 17A, Block-E, Banani ( Near Banani Bazaar), 1212 Dhaka, Bangladesh</td>
		</tr>
		<tr>
			<td colspan="2">
				ID<br/>
				Given by<br/>
				<?php echo mdate('%d/%m/%Y', $slip[0]['time']); ?><br/>
				<b>Invoice</b>
			</td>
			<td colspan="2" class="text-right">
				#{id}<br/>
				{supplier_name}<br/>
				<?php echo mdate('%h:%i %A', $slip[0]['time']); ?><br/>
				<b>#{supplier}</b>
			</td>
		</tr>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Qty</th>
			<th class="text-right">Subtotal</th>
		</tr>
		</thead>
		<tbody>
		
		<tr>
			<td>{name}</td>
			<td>{price}</td>
			<td>{stock}</td>
			<td class="text-right">{total}</td>
		</tr>
		<tr>
			<td colspan="4" class="text-right">
				<b>Total: {total}</b><br/>
				Paid: - {paid}<hr style="margin-top:5px;margin-bottom:5px;"/>
				<b>Due: {due}</b></br>
				<small>*money on Taka</small>
			</td>
		</tr>
		</tbody>
	</table>
</div>

{/slip}
