<div class="row-fluid">
	<div class="alert">
		<h3>Import Form</h3>
	</div>
<?php
echo $this->Form->create('Member', array('enctype'=> 'multipart/form-data'));
echo $this->Form->input('file', array('label' => 'Member', 'type' => 'file'));
echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
echo $this->Form->end();
?>

	<hr />

	<div class="alert alert-success">
		<h3>Data Imported</h3>
	</div>

	<table class="table table-bordered" id="table_records">
		<thead>
			<tr>
				<th>Created</th>
				<th>Ref No.</th>
				<th>ID</th>
				<th>Name</th>
				<th>Type</th>
				<th>Member Pay Type</th>
				<th>Member Company</th>
				<th>Payment By</th>
				<th>Batch No.</th>
				<th>Receipt No.</th>
				<th>Cheque No.</th>
				<th>Payment Desc</th>
				<th>Renewal Year</th>
				<th>Subtotal</th>
				<th>Total Tax</th>
				<th>Tax</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($transactionitems as $ti) :
?>
			<tr>
				<td><?php echo $ti['Transaction']['Member']['created']; ?>
				<td><?php echo $ti['Transaction']['ref_no']; ?>
				<td><?php echo $ti['Transaction']['Member']['id']; ?>
				<td><?php echo $ti['Transaction']['Member']['name']; ?>
				<td><?php echo $ti['Transaction']['Member']['type'].' '.$ti['Transaction']['Member']['no']; ?>
				<td><?php echo $ti['Transaction']['member_paytype']; ?>
				<td><?php echo $ti['Transaction']['member_company']; ?>
				<td><?php echo $ti['Transaction']['payment_method']; ?>
				<td><?php echo $ti['Transaction']['batch_no']; ?>
				<td><?php echo $ti['Transaction']['receipt_no']; ?>
				<td><?php echo $ti['Transaction']['cheque_no']; ?>
				<td><?php echo $ti['Transaction']['payment_type']; ?>
				<td><?php echo $ti['Transaction']['renewal_year']; ?>
				<td><?php echo $ti['Transaction']['subtotal']; ?>
				<td><?php echo $ti['Transaction']['tax']; ?>
				<td><?php echo $ti['Transaction']['total']; ?>
			</tr>
<?php
endforeach;
?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_records").dataTable({

	});
})
</script>
<?php $this->end()?>