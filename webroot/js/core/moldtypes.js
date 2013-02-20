$(function() {
    
    MoldTypes = {
        tools: new CoreTools(),
        casings: [],
        init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if($('#page-title').text() != 'Mold Types'){
                $.get('/moldtypes/index',function(response){
                    $('#main-content').html(response);
                    me.tools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    me.tools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    //.script('/lib/datatables/extras/FixedColumns/media/js/FixedColumns.min.js')
                    //.script('/lib/datatables/extras/FixedHeader/js/FixedHeader.min.js').wait()
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
                    .script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
                        me.index();
                    });
                })
                $('.nav-list').removeClass('active');
                $('#collapse2 li:nth-child(3)').addClass('active');
            }
        }
        ,index: function(){
            
            this.clear();
            
            // init dataTables
            var dataTable = $('#moldtypes-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/molds/index.json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    {bVisible: false},
                    {bVisible: false},
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(1)', nRow).html('<span title="'+aData[1]+'">'+aData[3]+'</span>');
                }
            });
        }
        ,clear: function(){
            $('.dataTable').each(function(){
                $(this).dataTable().fnDestroy();
            })
        }
    }
})