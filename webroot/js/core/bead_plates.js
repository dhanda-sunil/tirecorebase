$(function() {
    
    BeadPlate = {
        id: 0,
        init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if($('#page-title').text() != 'Bead Plates'){
                $.get('/bead_plates/index',function(response){
                    $('#main-content').html(response);
                    coreTools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    coreTools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
                    .script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
                        me.index();
                    });
                })
            }
            else{
                this.index();
            }
        }
        ,index: function(){
            
            this.clear();
            $('#page-table').show();
            $('.nav-list li').removeClass('active');
            $('#collapse5 li:first-child').addClass('active');
            
            // init dataTables
            $('#page-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/bead_plates/index.json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    null,
                    null,
                    null,
                    null,
                    {bVisible: false}
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(0)', nRow).html('<a href="javascript:BeadPlate.view('+aData[4]+')">'+aData[0]+'</a>');
                }
            });
        }
        ,add: function(){
            this.id = 0;
            var me = this;
            this.clear();
            
            // change title
            $('#page-sub-title').html('<br/>Add New Bead Plate');
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
            
            $.get('/bead_plates/view/'+id+'.json',function(record){
                
                var form = $('#page-record-template').clone();
                $('#page-modal #modal-title').text('Edit');
                $('#page-modal .modal-body').html($(form).html()).show();
                $('#page-modal').modal();
                $('#page-modal .control-buttons').hide();
                
                coreTools.renderRecord($('#page-modal .modal-body'),record);
                
                // save
                $('#page-modal [name="save"]').click(function(){
                    var record = coreTools.getData($('#page-modal'));
                    me.save(record, function(response){
                        coreTools.response(response);
                        if(response.success == '1'){
                            me.index();
                            $('#page-modal').modal('hide');
                        }
                    })
                })
                // cancel
                $('#page-modal [name="cancel"]').click(function(){
                    $('#page-modal').modal('hide');
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
                url: '/bead_plates/'+action+'.json',
                data: data,
                success: function(data){
                    if(callback != undefined){
                        callback(data);
                    }
                }
            });
        }
    }
})