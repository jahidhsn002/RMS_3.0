<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="component">
	<h3 class="no_print text-center">Customer Slip</h3>
	<table class="table slip">
		<thead>
			{slip}
			<tr>
				<td colspan="4" class="text-center">
					<img width="150px" src="<?php echo site_url('images/loogo.gif'); ?>" alt="LoGo">
				</td>
			</tr>
			<tr>
				<td colspan="4" class="text-center"><?php echo $address; ?></td>
			</tr>
			<tr>
				<td colspan="2">
					Contact<br/>
					Given by<br/>
					<?php echo mdate('%d/%m/%Y', $slip[0]['time']); ?><br/>
					<b>Invoice</b>
				</td>
				<td colspan="2" class="text-right">
					#<?php echo $contact; ?><br/>
					{cradit_name}<br/>
					<?php echo mdate('%h:%i %A', $slip[0]['time']); ?><br/>
					<b>#{id}</b>
				</td>
			</tr>
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Qty</th>
				<th class="text-right">Subtotal</th>
			</tr>
			{/slip}
		</thead>
		<tbody>
			{food}
			<tr>
				<td>{name}</td>
				<td>{price}</td>
				<td>{qty}</td>
				<td class="text-right">{subtotal}</td>
			</tr>
			{/food}
			{slip}
			<tr>
				<td colspan="2" class="text-right"></td>
				<td class="text-right">
					Discount:<br/>
					Utility:<br/>
					VAT:<br/>
					<hr/>
					<b>Total:</b><br/>
					Paid:<br/>
					<b>Left:</b></br>
				</td>
				<td class="text-right">
					{discount}<br/>
					{service}<br/>
					{vat}<br/>
					<hr/>
					{total}<br/>
					{paid}<br/>
					{left}
				</td>
			</tr>
			<tr>
				<td colspan="4"><small>*Currency unit Taka</small></td>
			</tr>
			{/slip}
		</tbody>
	</table>
</div>
