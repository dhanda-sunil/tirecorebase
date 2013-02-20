$(function() {

    Materials = {
        tools: new CoreTools(),
        oTable: null,
        init: function(){
            console.log('init')
            var me = this;
            this.tools.addStyle('/lib/datatables/css/jquery.dataTables.css');
            this.tools.addStyle('/lib/datepicker/datepicker.css');
            this.tools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');
            
            $LAB
            .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
            .script('/lib/jeditable/jquery.jeditable.min.js').wait()
            .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
            .script('/lib/datatables/extras/sorting.currency.js').wait(function(){
                me.loadTable();
            })
            .script('/lib/datepicker/bootstrap-datepicker.min.js').wait(function(){
                $('#dp_start').datepicker();
                $('#dp_end').datepicker();
            })
            
            $('.run-report').click(function(){
                me.index();
            })
        },
        loadTable: function(){
            
            $('.dataTable').each(function(){
                $(this).dataTable().fnDestroy();
            })
            
            var oTable = $('#materials-table').dataTable({
                bDestroy:true,
                sDom: 'RTfrtip',
                iDisplayLength: 1000,
                oTableTools: {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns": [
                    null,
                    null,
                    null,
                    null,
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "numeric-comma" },
                    { "sType": "currency" },
                    { "sType": "currency" },
                    { "sType": "currency" },
                    { "sType": "currency" },
                ]
            });

            /* Apply the jEditable handlers to the table */
                $('.jedit', oTable.fnGetNodes()).editable( '/materials/edit', {
                    "callback": function( sValue, y ) {
                        var aPos = oTable.fnGetPosition( this );
                        oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                    },
                    "submitdata": function ( value, settings ) {
                        return {
                            "row_id": this.parentNode.getAttribute('id'),
                            "field": this.getAttribute('data-id'),
                            "column": oTable.fnGetPosition( this )[2]
                        };
                    },
                    "height": "14px",
                    tooltip: ''
                } );
        },
        index: function(){
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/materials/index/',
                data: 'data[start_date]='+$('#dp_start').find('input').val()+'&data[end_date]='+$('#dp_end').find('input').val(),
                success: function(data){
                    var str = $('#response').html(data).find('#materials-table');
                    //$('#response').empty();
                    //$('#materials-table').replaceWith(str);
                    if( $('#batch-id').val() != '' ){
                        me.getBatch($('#batch-id').val());
                    }
                }
            });
        },
        getBatch: function(batch_id){
            var me = this;
            var post = {
                "data[Batch][id]":batch_id
            }
            
            $.post("/batches/getinventory.json", post, function (data) {
                
                $('#adjust-inventory').show().unbind().click(function(){
                    me.adjustInventory(batch_id)
                });
                
                $.each(data,function(k,v){
                    $('#materials-table tr[part-number='+v.sku+']').each(function(){
                        var units = $(this).find('td[data-id=units]').text()*1;
                        var weight = $(this).find('td[data-id=weight]').text()*1;
                        me.oTable.fnUpdate(units,$(this)[0].rowIndex,3);
                        me.oTable.fnUpdate(weight,$(this)[0].rowIndex,6);
                    })
                })
                //me.loadTable();
            });
        },
        adjustInventory: function(batch_id){
            var me = this;
            var post = {
                "data[Batch][id]":batch_id,
                "data[start_date]": $('#dp_start').find('input').val(),
                "data[end_date]":$('#dp_end').find('input').val()
            }
            
            $.post("/materials/batchadjust.json", post, function (data) {
                if(data.success == '1'){
                    me.tools.notification('success','Inventory Adjusted','Inventory has successfully been adjusted');
                    me.index();
                    $('#batch-id option[value='+batch_id+']').remove();
                }
                else{
                    me.tools.notification('error','Error','An error was encountered adjusting inventory');
                }
            });
        }
    }
})