<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		TireCore
		<?php echo $title_for_layout; ?>
	</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
	?>
    
</head>
<body>
	<div id="container">
        <div class="navbar" style="margin-bottom:0px;">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand">TireCore > <?=ucwords($this->request->params['controller'])?></a>
            </div>
          </div>
        </div>
		<div id="content" class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <ul class="nav nav-tabs nav-stacked">
                        <? if(isset($controlArr)): ?>
                        <? foreach($controlArr as $x => $i): ?>
                        <li class="<?= ($i['url'] == $this->request->params['controller']) ? 'active':'' ?>">
                            <a href="/admin/<?=$i['url']?>/index"><?=$i['humanize']?></a> 
                        </li>
                        <? endforeach; ?>
                        <? endif; ?>
                    </ul>
                </div>
                <div class="span10">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
		</div>
        <div style="clear:left"></div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
</body>
</html>
