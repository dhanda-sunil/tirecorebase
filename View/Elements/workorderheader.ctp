<script>
	customerList = '';
</script>
<header>
	<h2>TCS TreadTracks Workorder</h2>

	<div class="row-fluid">
		<form class="form-horizontal">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="customer_id">Customer</label>

					<div class="controls">
						<select id="customer_id">
							<option value=''></option>
							<?php foreach ($customers as $key => $val) : ?>
							<option value='<?php echo $key; ?>'><?php echo $val; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="requester_id">Requester</label>

					<div class="controls">
						<select id="requester_id" class="customerLimited">

						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="account_id">Account</label>

					<div class="controls">
						<select id="account_id" class="customerLimited">

						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ship_address_id">Shipping Address</label>

					<div class="controls">
						<select id="ship_address_id" class="customerLimited">
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="bill_address_id">Billing Address</label>

					<div class="controls">
						<select id="bill_address_id" class="customerLimited">
						</select>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="Work Order Number">Work Order Number</label>

					<div class="controls">
						<input type="text" id="data[Co][ref]" placeholder="(leave blank for new)">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="data[Co][created]">Work Order Date</label>
					<div class="controls">
						<input type="date" id="data[Co][created]" placeholder="MM/DD/YY"
								>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="data[Co][pickup_date]">Picked Up Date</label>

					<div class="controls">
						<input type="date" id="data[Co][pickup_date]" placeholder="MM/DD/YY">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="data[Co][po_number]">PO Number</label>

					<div class="controls">
						<input type="text" id="data[Co][po_number]" placeholder="PO Number">
					</div>
				</div>

			</div>
		</form>

	</div>
	<div style="width: 100%; text-align: center;">
		<button class="btn btn-mini hideHeader"><span class="icon-plus"></span><span class="icon-plus"></span><span
				class="icon-plus"></span></button>
	</div>
</header>
