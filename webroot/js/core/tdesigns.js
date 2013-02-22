$(function() {
    
    Tdesigns = {
        id: 0,
		onLoad:function(){
			this.init();
		}, 
		
		init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if(window.currentPageTitle !='Tdesigns'){
				window.currentPageTitle = 'Tdesigns';
               
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
			$('#page-title').html('Tdesigns');
            $('#page-table').show();
            $('.nav-list li').removeClass('active');
            $('.nav-list li[action="index"]').addClass('active');
            var dataTable = $('#page-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/tdesigns/index.json",
                "sDom": 'CRTfrtip',
                "oColVis": {
                    "aiExclude": [9]
                },
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                    "aButtons": [
                        {
                            "sExtends": 'copy',
                            "mColumns":[0,1,2,3,4,5,6,7,8]
                        },
                        {
                            "sExtends": 'print',
                            "mColumns":[0,1,2,3,4,5,6,7,8]
                        },
                        {
                            "sExtends": 'xls',
                            "mColumns":[0,1,2,3,4,5,6,7,8]
                        },
                        {
                            "sExtends": 'pdf',
                            "mColumns":[0,1,2,3,4,5,6,7,8]
                        }
                    ]
                },
                "aoColumns":[
				   null,null,null,null,null,null,null,null,null,{bSortable: false}				   
		],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(9)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="Tdesign.view('+aData[9]+')"></i>');
                }
            });
        }
        ,add: function(){
            this.id = 0;
            var me = this;
            this.clear();
            
            // change title
            $('#page-title').html('Add New Tdesign');
            // clone template
            var form = $('#page-record-template').clone();
            
            $('#page-container').html($(form).html()).show();
            
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
            $.get('/tdesigns/view/'+id+'.json',function(record){
                 // change title
            	$('#page-title').html('Edit Tdesign');
			
                var form = $('#page-record-template').clone();
				$('#page-container').html($(form).html()).show();
                
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
        ,save: function(data,callback){
            var me = this;
            var action = (this.id > 0) ?  'edit/'+this.id:'add/';
            
            $.ajax({
                type: 'POST',
                url: '/tdesigns/'+action+'.json',
                data: data,
                success: function(data){
                    if(callback != undefined){
                        callback(data);
                    }
                }
            });
        }
    }
});
