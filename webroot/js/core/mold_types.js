$(function() {
    
    MoldTypes = {
        tools: new CoreTools(),
        casings: [],
        id: 0,
        init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if($('#page-title').text() != 'Mold Types'){
                $.get('/mold_types/index',function(response){
                    $('#main-content').html(response);
                    me.tools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    me.tools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    //.script('/lib/datatables/extras/FixedColumns/media/js/FixedColumns.min.js')
                    //.script('/lib/datatables/extras/FixedHeader/js/FixedHeader.min.js').wait()
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait(function(){
                        me.index();
                    });
                })
            }
            else{
                me.index();
            }
        }
        ,index: function(){
            
            this.clear();
            $('#moldtypes-table').show();
            $('.nav-list li').removeClass('active');
            $('#collapse3 li:first-child').addClass('active');
            
            // init dataTables
            var dataTable = $('#moldtypes-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/mold_types/index.json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    {bVisible: false},
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(1)', nRow).html('<a href="javascript:MoldTypes.view('+aData[0]+')">'+aData[2]+'</a>');
                }
            });
        }
        ,add: function(){
            this.id = 0;
            var me = this;
            this.clear();
            
            $('#add-new-shipment').show();
            // change title
            $('#page-sub-title').html('<br/>Add Mold Type');
            // clone template
            var form = $('#page-add-template').clone();
            
            $('#page-container').html($(form).html()).show();
            
            // save
            $('#page-container [name="save"]').click(function(){
                var record = me.tools.getData($('#page-container'));
                me.save(record, function(response){
                    me.tools.response(response);
                    if(response.success == '1'){
                        me.index();
                    }
                })
            })
            // cancel
            $('#page-container [name="cancel"]').click(function(){
                me.index();
            })
        }
        ,view: function(id){
            this.id = id;
            var me = this;
            
            $.get('/mold_types/view/'+id+'.json',function(record){
                
                var form = $('#page-add-template').clone();
                $('#page-modal #modal-title').text('Edit');
                $('#page-modal .modal-body').html($(form).html()).show();
                $('#page-modal').modal();
                $('#page-modal .control-buttons').hide();
                
                me.tools.renderRecord($('#page-modal .modal-body'),record);

                // save
                $('#page-modal [name="save"]').click(function(){
                    var record = me.tools.getData($('#page-modal'));
                    me.save(record, function(response){
                        me.tools.response(response);
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
                url: '/mold_types/'+action+'.json',
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