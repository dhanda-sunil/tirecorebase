<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		TireCore
		<?php echo $title_for_layout; ?>
	</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="/js/jquery-1.8.2.js"><\/script>');</script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script>!window.jQuery.ui && document.write('<script src="/js/jquery-ui-1.9.1.custom.min.js"><\/script>');</script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.0/mustache.min.js"></script>
	<script>!window.Mustache && document.write('<script src="/js/Mustache.js"><\/script>');</script>
	<?php
	echo $this->Html->meta('icon');

	//echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');


	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('bootstrap-responsive.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->css('default.css');
	echo $this->Html->css('start/jquery-ui-1.9.1.custom.min.css')
	?>

</head>
<body>
<div id="container">
	<?php echo $this->element('workorderheader'); ?>
	<div id="content" class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
	<div style="clear:left"></div>
	<div id="footer">
<div class="row-fluid">
	<div class="span2">
		<p>You are currently logged in as:<br />Bill Logged In</p>
	</div>
	<div class="span3 offset7">
		<button class="btn btn-danger btn-large">Cancel</button>
		<button class="btn btn-success btn-large">Save</button>
		</div>
</div>
	</div>
</div>
</body>
<?php 	echo $this->Html->script('script'); ?>
	<style>
	footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 40px;
		background: #004bbd;
		text-align: right;
	}
	html, body {
		height: 100%;
	}
	.container {
		position: relative;
	}
</style>
</html>
