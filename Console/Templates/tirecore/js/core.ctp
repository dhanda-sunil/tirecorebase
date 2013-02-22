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

 $urlname = strtolower(preg_replace('/\s/','_',$pluralHumanName));
 $jsClassName = preg_replace('/\s/','',$pluralHumanName);
?>
$(function() {
    
    <?php echo $jsClassName; ?> = {
        id: 0,
		onLoad:function(){
			this.init();
		}, 
		
		init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if(window.currentPageTitle !='<?php echo $jsClassName; ?>'){
				window.currentPageTitle = '<?php echo $jsClassName; ?>';
               
				coreTools.addStyle('lib/datatables/css/jquery.dataTables.css');
				coreTools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');
				coreTools.addStyle('lib/datepicker/datepicker.css');
				
				$LAB
				.script('/lib/datatables/js/jquery.dataTables.min.js').wait()
				.script('/lib/jquery.inputmask.min.js')
				//.script('/lib/jeditable/jquery.jeditable.min.js').wait()
				.script('/lib/datatables/extras/ColVis/media/js/ColVis.js')
				.script('/lib/datepicker/bootstrap-datepicker.min.js')
				.script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
				.script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
					me.index();
				});
            }
            else{
                this.index();
            }
        }
		,index: function(){
            
            this.clear();
			$('#page-title').html('<?php echo $pluralHumanName; ?>');
            $('#page-table').show();
            $('.nav-list li').removeClass('active');
            $('.nav-list li[action="index"]').addClass('active');
            var dataTable = $('#page-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/<?php echo $urlname; ?>/index.json",
                "sDom": 'CRTfrtip',
                "oColVis": {
                    "aiExclude": [<?php echo count($fields); ?>]
                },
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                    "aButtons": [
                        {
                            "sExtends": 'copy',
                            "mColumns":[<?php  echo implode(",", buildMColumns($fields));?>]
                        },
                        {
                            "sExtends": 'print',
                            "mColumns":[<?php  echo implode(",", buildMColumns($fields));?>]
                        },
                        {
                            "sExtends": 'xls',
                            "mColumns":[<?php  echo implode(",", buildMColumns($fields));?>]
                        },
                        {
                            "sExtends": 'pdf',
                            "mColumns":[<?php  echo implode(",", buildMColumns($fields));?>]
                        }
                    ]
                },
                "aoColumns":[
				   <?php  echo implode(",", buildAOColumns($fields));?>
				   
		],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(<?php echo count($fields); ?>)', nRow).html(
					 	'<i class="icon-edit" style="cursor:pointer" onclick="<?php echo $jsClassName ?>.view('+aData[<?php echo count($fields); ?>]+')"></i>'+
						'<i class="icon-remove" style="margin-left:15px;cursor:pointer" onclick="<?php echo $jsClassName ?>.remove('+aData[<?php echo count($fields); ?>]+')"></i>'
					);
                }
            });
        }
        ,add: function(){
            this.id = 0;
            var me = this;
            this.clear();
            
            // change title
            $('#page-title').html('Add New <?php echo $singularHumanName; ?>');
            // clone template
            var form = $('#page-record-template').clone();
            
            $('#page-container').html($(form).html()).show();
            $('#page-container [isPrimaryKey]').hide();
            // save
            $('#page-container .save-record').unbind().click(function(){
                var record = coreTools.getData($('#page-container'));
                me.save(record, function(response){
                    if(response.success == '1'){
                        me.index();
                    }
                })
            })
            // cancel
            $('#page-container [name="cancel"]').unbind().click(function(){
                me.index();
            })
        }
        ,view: function(id){
            this.id = id;
            var me = this;
            this.clear();
            $.get('/<?php echo $urlname; ?>/view/'+id+'.json',function(record){
                 // change title
            	$('#page-title').html('Edit <?php echo $singularHumanName; ?>');
			
                var form = $('#page-record-template').clone();
				$('#page-container').html($(form).html()).show();
                $('#page-container [isPrimaryKey]').show();
                coreTools.renderRecord($('#page-container'), record);
                
               // save
				$('#page-container .save-record').unbind().click(function(){
					var record = coreTools.getData($('#page-container'));
					me.save(record, function(response){
						if(response.success == '1'){
							me.index();
						}
					})
				})
				// cancel
				$('#page-container [name="cancel"]').unbind().click(function(){
					me.index();
				})
            })
        }
        ,clear: function(){
            $('.dataTable').each(function(){
                $(this).dataTable().fnDestroy();
            })
            $('.dataTable').hide();
            $('#page-container').empty();
        }
		,remove: function(id, callback){
            var me = this;
            var action = 'delete/'+id;
			
			me.showMessage('Delete?', 'Are you sure you want to delete this <?php echo $singularHumanName; ?>.', function(btn){
				if(btn=='yes'){
					$.ajax({
						type: 'POST',
						url: '/<?php echo $urlname; ?>/'+action+'.json',
						success: function(data){
							coreTools.response(data);
							me.index();
							if(callback != undefined){
								callback(data);
							}
						}
					});	
				}																	   
			}, [{id:'yes', text:'Yes', cls:'btn-danger'},{id:'no', text:'No'}]);
        }
		,showMessage:function(title, bodyText, callback, buttons, autoHide){
			buttons 	= buttons?buttons:[{id:'ok', text:'Ok'}];
			callback 	= callback?callback:function(){};
			autoHide	= (autoHide===false)?false:true;
			var modelBox = $('#page-message');
			$('#page-message #modal-title').text(title);
			$('#page-message .modal-body').html(bodyText).show();
			modelBox.modal();
			var btns 	= [], cls;
			for(var i=0; i<buttons.length; i++){
				cls = buttons[i].cls?buttons[i].cls:''
				btns.push('<input type="button" class="btn callable '+cls+'" name="'+buttons[i].id+'" value="'+buttons[i].text+'" />');
			}
			$('#page-message .modal-footer').html(btns.join(''));
			$('#page-message .callable').click(function(event){
				if(autoHide){
					modelBox.modal('hide');
				}
				callback($(event.target).attr('name'), modelBox);
			})
		}
        ,save: function(data,callback){
            var me = this;
            var action = (this.id > 0) ?  'edit/'+this.id:'add';
            
            $.ajax({
                type: 'POST',
                url: '/<?php echo $urlname; ?>/'+action+'.json',
                data: data,
                success: function(data){
					coreTools.response(data);
                    if(callback != undefined){
                        callback(data);
                    }
                }
            });
        }
    }
});
