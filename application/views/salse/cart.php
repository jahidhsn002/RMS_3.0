
<table class="table table-bordered">

	<tr>
        <th>QTY</th>
        <th>Name</th>
        <th style="text-align:right">Price</th>
        <th style="text-align:right">Sub-Total</th>
	</tr>

	<?php $i = 1; ?>

	<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'rowid', $items['rowid']); ?>

        <tr>
            <td><?php echo form_input(array('name' => $i.'qty', 'value' => $items['qty'], 'class' => 'form-control')); ?></td>
            <td><?php echo $items['name']; ?></td>
            <td class="text-right"><?php echo $this->cart->format_number($items['price']); ?></td>
            <td class="text-right"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

	<?php $i++; ?>

	<?php endforeach; ?>

	<tr>
        <td></td>
		<td></td>
        <td class="text-right"><strong>Total</strong></td>
        <td class="text-right"><?php echo $this->cart->format_number($this->cart->total()); ?></td>
	</tr>

</table>