<div class="heading clearfix">
	<h3 class="pull-left" id="batch-title">Batch Processing</h3>
</div>
<div class="tabbable" id="customer-main">
	<style>
		.batchScanning img {
			display: block;
			margin: 40px auto;
		}
	</style>
	<div class="tab-content">
		<div class="tab-pane active" id="tab-0">
			<div class="form-actions batch-buttons">
				<input type="button" class="btn add-batch-fg" data-target="#add-fg" value="Add Finished Goods Batch"/>
				<input type="button" class="btn add-batch-inv" data-target="#add-inv" value="Add Inventory Batch"/>
			</div>
			<div id="add-fg" class="batchScanning accordion" style="display:none;">
				<h2>Scan to finished goods</h2>

				<div class="accordion-group" id="fg1">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-fg" href="#fg1-content">
							Step 1
						</a>
					</div>
					<div id="fg1-content" class="accordion-body collapse in">
						<div class="accordion-inner">
							<p>Use your scanner to scan the following code:</p>
							<img class="scanCode" src="/img/codes/start_fg.png"/>

						</div>
					</div>
				</div>
				<div class="accordion-group" id="fg2">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-fg" href="#fg2-content">
							Step 2
						</a>
					</div>
					<div id="fg2-content" class="accordion-body collapse">
						<p>Scan your finished goods items</p>

					</div>
				</div>
				<div class="accordion-group" id="fg3">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-fg" href="#fg3-content">
							Step 3
						</a>
					</div>
					<div id="fg3-content" class="accordion-body collapse">

						<p>When complete, scan the following code to import your data:</p>
						<img class="scanCode" src="/img/codes/end_fg.png"/>
						<textarea class="fg-data" cols="1" rows="1"></textarea>

					</div>
				</div>
				<div class="accordion-group" id="fg4">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-fg" href="#fg4-content">
							Step 4
						</a>
					</div>
					<div id="fg4-content" class="accordion-body collapse">

						<p>Scan the following code to reset your scanner:</p>
						<img class="scanCode" src="/img/codes/confirmed.png"/>

					</div>
				</div>
			</div>
			<div id="add-inv" class="batchScanning accordion" style="display:none;">
				<h2>Scan to inventory</h2>

				<div class="accordion-group" id="inv1">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-inv" href="#inv1-content">
							Step 1
						</a>
					</div>
					<div id="inv1-content" class="accordion-body collapse in">
						<div class="accordion-inner">
							<p>Use your scanner to scan the following code:</p>
							<img class="scanCode" src="/img/codes/start_inv.png"/>

						</div>
					</div>
				</div>
				<div class="accordion-group" id="inv2">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-inv" href="#inv2-content">
							Step 2
						</a>
					</div>
					<div id="inv2-content" class="accordion-body collapse">
						<p>Scan your finished goods items</p>

					</div>
				</div>
				<div class="accordion-group" id="inv3">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-inv" href="#inv3-content">
							Step 3
						</a>
					</div>
					<div id="inv3-content" class="accordion-body collapse">

						<p>When complete, scan the following code to import your data:</p>
						<img class="scanCode" src="/img/codes/end_inv.png"/>
						<textarea class="inv-data" cols="1" rows="1"></textarea>

					</div>
				</div>
				<div class="accordion-group" id="inv4">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#add-inv" href="#inv4-content">
							Step 4
						</a>
					</div>
					<div id="inv4-content" class="accordion-body collapse">

						<p>Scan the following code to reset your scanner:</p>
						<img class="scanCode" src="/img/codes/confirmed.png"/>

					</div>
				</div>
			</div>
			<table id="customers-table" class="table table-bordered table-striped table_vam">

				<thead>
				<tr>
					<th>ID</th>
					<th>Type</th>
					<th>Created</th>
					<th>data</th>
				</tr>
				</thead>
				<tbody>
				<? foreach ($batches as $i): ?>
				<tr data-id="<?=$i['Batch']['id']?>">
					<td data-id="id"><?=$i['Batch']['id']; ?></td>
					<td data-id="type"><?=ucwords($i['Batch']['type']); ?></td>
					<td data-id="created"><?=date("n/j/y G:i", strtotime($i['Batch']['created'])); ?></td>
					<td data-id="data" style="overflow: hidden;"><?=$i['Batch']['data']; ?></td>
				</tr>
					<? endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
</div>



