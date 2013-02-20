<?php pr($status); ?>
<?php pr($dataset); ?>
<?php pr($lines); ?>

<form enctype="multipart/form-data" target="/customers/import" method="post" id="custImport">
	<input type="file" name="data[file]" />
	<input type="submit" />
</form>
