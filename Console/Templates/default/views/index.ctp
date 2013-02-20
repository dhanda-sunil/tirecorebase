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
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?>">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>"; ?></li>
    <?php
        $done = array();
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                    echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
                    echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
                    $done[] = $details['controller'];
                }
            }
        }
    ?>
        </ul>
        </div>
    </div>
	<p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>"; ?>
	</p>
	<div class="pagination">
        <ul>
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('' . __('Prev'), array('tag'=>'li'), null, array('class' => 'prev'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentClass'=>'currentPage'));\n";
		echo "\t\techo \$this->Paginator->next(__('Next') . '', array('tag'=>'li'), null, array('class' => 'next'));\n";
		echo "\t?>\n";
	?>
        </ul>
	</div>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
	<tr>
	<?php  foreach ($fields as $field): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link(__(' '), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'icon-search', 'title'=>'View')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Html->link(__(' '), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
    </tbody>
	</table>
	<p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>"; ?>
	</p>
	<div class="pagination">
        <ul>
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('' . __('Prev'), array('tag'=>'li'), null, array('class' => 'prev'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentClass'=>'currentPage'));\n";
		echo "\t\techo \$this->Paginator->next(__('Next') . '', array('tag'=>'li'), null, array('class' => 'next'));\n";
		echo "\t?>\n";
	?>
        </ul>
	</div>
</div>
<script>
    $('.icon-search').tooltip();
    $('.icon-edit').tooltip();
    $('.icon-remove').tooltip();
    if($('.currentPage')){
        $('.currentPage').html('<a class="currentPage">'+$('.currentPage').html()+'</a>')
    }
    if($('.prev').prop('tagName').toLowerCase() == 'span'){
        $('.prev').replaceWith('<li><a style="color:#ccc">prev</a></li>')
    }
    if($('.next').prop('tagName').toLowerCase() == 'span'){
        $('.next').replaceWith('<li><a style="color:#ccc">next</a></li>')
    }
</script>