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
<?php
	if(!function_exists('buildMColumns')){
		function buildMColumns($fields){
			$nums = array();
			for($i=0; $i<count($fields); $i++){
				$nums[] = $i;
			}
			return $nums;
		}
		function buildAOColumns($fields){
			$nums = array();
			for($i=0; $i<count($fields); $i++){
				$nums[] = 'null';
			}
			$nums[] = '{bSortable: false}';
			return $nums;
		}
	}
?>
<!-- THIS TEMPLATE IS BAKED! -->
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title"><?php echo $pluralHumanName; ?></span> <span id="page-sub-title"></span></h3>
</div>

<table id="page-table" class="table table-bordered table-striped table_vam">
    <thead>
    <tr>
<?php  foreach ($fields as $field): ?>
        <th><?php echo Inflector::humanize($field) ?></th>
<?php endforeach; ?>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="page-container"></div>

<div id="page-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <input type="button" class="btn btn-inverse" name="save" value="Save changes" />
        <input type="button" class="btn" name="cancel" value="Cancel" />
    </div>
</div>

<div id="page-message" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        
    </div>
</div>
<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-record-template">
<div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
        <fieldset>
            <p class="f_legend"><?php echo $singularHumanName; ?> Information</p>
<?php
		
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated')) && $field == $primaryKey) {
                echo "\t\t\t".'<div class="control-group" isPrimaryKey>'."\n";
                echo "\t\t\t\t".'<label class="control-label">'.ucwords($field).' <span class="f_req">*</span></label>'."\n";
                echo "\t\t\t\t".'<div class="controls">'."\n";
                echo "\t\t\t\t\t".'<input type="text" readonly name="data['.$modelClass.']['.$field.']" />'."\n";
                echo "\t\t\t\t".'</div>'."\n";
                echo "\t\t\t</div>\n";
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                echo "\t\t\t".'<div class="control-group">'."\n";
                echo "\t\t\t\t".'<label class="control-label">'.ucwords($field).' <span class="f_req">*</span></label>'."\n";
                echo "\t\t\t\t".'<div class="controls">'."\n";
                echo "\t\t\t\t\t".'<input type="text" name="data['.$modelClass.']['.$field.']" />'."\n";
                echo "\t\t\t\t".'</div>'."\n";
                echo "\t\t\t</div>\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\t\t".'<div class="control-group">'."\n";
                echo "\t\t\t\t".'<label class="control-label">'.ucwords($assocName).' <span class="f_req">*</span></label>'."\n";
                echo "\t\t\t\t".'<div class="controls">'."\n";
                echo "\t\t\t\t\t".'<input type="text" name="data['.$modelClass.']['.$field.']" />'."\n";
                echo "\t\t\t\t".'</div>'."\n";
                echo "\t\t\t</div>\n";
			}
		}
?>
        </fieldset>
        </form>
    </div>
</div>
<div class="form-actions">
    <input type="button" class="btn btn-inverse save-record" name="save" value="Save changes" />
    <input type="button" class="btn close-record" name="cancel" value="Close" />
</div>
</script>