<table class='table table-bordered'>
	<thead>
	<tr>
		<th>Line #</th>
		<th>Barcode</th>
		<th>Line Code</th>
		<th>DOT Code</th>
		<th>Size</th>
		<th>Brand</th>
		<th>Tread Design</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<tr class="newItem">
		<td colspan="8" style="text-align: center;">
			<button style="width: 80%;" class='btn btn-success'><i class='icon-plus'></i> New Item</button>
		</td>
	</tr>
	</tbody>
</table>

<div id="deleteRowCheck" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Delete Line Item</h3>
	</div>
	<div class="modal-body">
		<p>Are you sure you want to delete this line item?</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
		<a href="#" class="btn btn-danger" id="deleteOK" data-dismiss="modal">Delete</a>
	</div>
</div>
<script>
	itemTpl = '	<tr> ' +
		'<td><button class="btn btn-danger btn-small deleteRow"><i class="icon-remove-circle"></i></button><span>{{line_number}}</span></td>' +
		'<td><input class="input-small" id="barcode[]" /></td>' +
		'<td><select class="input-medium" id="line_code[]" >' +
			'<option value=""></option>' +
			<?php foreach($lineCodes as $id=>$name): ?>
		'<option value="<?php echo $id;?>"><?php echo $name; ?></option>' +
			<?php endforeach; ?>
		'</select></td>' +
		'<td><input class="input-medium" id="dot_code[]" /></td>' +
		'<td></td>' +
		'<td></td>' +
		'<td><select class="input-medium" >' +
			'<option value=""></option>' +
	<?php foreach($treadDesigns as $id=>$name): ?>
			'<option value="<?php echo $id;?>"><?php echo $name; ?></option>' +
		<?php endforeach; ?>
			'</select></td>' +
		'<td><button class="btn btn-info copyRow"><i class="icon-asterisk"></i> Copy Line</button></td>' +
		'</tr>';

</script>
