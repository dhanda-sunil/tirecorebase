$(function() {
    
    Shipments = {
        tools: new CoreTools(),
        casings: [],
        init: function(){
            var me = this;
            if($('#page-title').text() != 'Shipments'){
                $.get('/shipments/index',function(response){
                    $('#main-content').html(response);
                    me.tools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    me.tools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
                    .script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
                        me.index();
                    });
                })
                $('.nav-list').removeClass('active');
                $('#collapseOne li:first-child').addClass('active');
            }
            else{
                this.index();
            }
        },
        index: function(){
            this.hideAll();
            $('#page-title').text('Shipments');
            $('#shipments-table').show();
            
            // init dataTables
            var dataTable = $('#shipments-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/shipments/index.json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    null,
                    null,
                    {bSortable: false,bSearchable:false},
                    {bVisible: false},
                    {bVisible: false},
                    {bVisible: false,}
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(0)', nRow).html('<a href="javascript:Shipments.view('+aData[5]+',\''+aData[0]+' '+aData[1]+'\')">'+aData[0]+'</a>');
                }
            });
        },
        view: function(id,title){
            var me = this;
            this.hideAll();
            $('#page-sub-title').html('<br/>'+title);
            var template = $('#casings-table-template').clone();
            
            $('#shipped-goods').html($(template).html()).show();
            
            $('#shipped-goods table').dataTable({
                "iDisplayLength": 500,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/shipments/goods/"+id+".json",
                "sDom": 'RTfrti',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    {bVisible: false}
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,{bSearchable: false}
                    ,null
                    ,null
                    ,{bSearchable: false, bSortable: false, bVisible: false}
                ]
            });

//            $('#casings-modal').find('[name=print]').unbind().click(function(){
//                window.open('/shipments/goods/'+id+'/1');
//            })
        },
        add: function(){
            
            var me = this;
            this.hideAll();
            
            $('#add-new-shipment').show();
            // change title
            $('#page-sub-title').html('<br/>Add Shipments');
            // clone template
            var form = $('#add-new-shipment-template').clone();
            $('#add-new-shipment').html($(form).html()).show();
            
            var dtOptions = {
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/shipments/unshipped_casings.json",
                "sDom": 'frtip',
                "aoColumns":[
                    {bVisible: false}
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,null
                    ,{bSearchable: false}
                    ,null
                    ,null
                    ,{bSearchable: false, bSortable: false}
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    if($.inArray(parseInt(aData[0]),me.casings) === -1){
                        $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" />');
                    }
                    else{
                        $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" checked />');
                    }
                }
            };
            
            // get casings from batch
            $('#batch-id').change(function(){
                
                if($(this).val() != ''){
                    // change default dtOptions
                    dtOptions.sAjaxSource = '/shipments/getbatch/'+$(this).val()+'.json';
                    dtOptions.fnCreatedRow = function(nRow, aData, iDataIndex){
                        $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" checked />');
                        me.addToCasingArray(aData[0]);
                    }
                    // rebuild table
                    if( $('#casings-table-div table').hasClass('dataTable') ){
                        $('#casings-table-div table').dataTable().fnDestroy();
                        $('#casings-table-div table').dataTable(dtOptions);
                    }
                }
                // set dtOptions back to defaults and rebuild table
                else{
                    dtOptions.sAjaxSource = "/shipments/unshipped_casings.json";
                    dtOptions.fnCreatedRow = function(nRow, aData, iDataIndex){
                        if($.inArray(parseInt(aData[0]),me.casings) === -1){
                            $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" />');
                        }
                        else{
                            $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" checked />');
                        }
                    }
                    // rebuild table
                    if( $('#casings-table-div table').hasClass('dataTable') ){
                        $('#casings-table-div table').dataTable().fnDestroy();
                        $('#casings-table-div table').dataTable(dtOptions);
                    }
                }
            })
            
            $('#casings-table-div').html($('#casings-table-template').html());
            
            $('#casings-table-div table').dataTable(dtOptions);
            
            // save event
            $('#add-new-shipment').find('[name=save]').unbind().click(function(){
                // data object
                var data = {
                    Shipment: {
                        name: $('#add-new-shipment').find('#shipment-name').val(),
                        coItems: me.casings
                    },
                    batch_id: $('#batch-id').val()
                }
                
                // confirmation
                $('#casings-confirm-modal .modal-body').html($('#casings-table-template').html());
                $('#casings-confirm-modal').modal();
                
                $('#casings-confirm-modal table').dataTable({
                    "iDisplayLength": 500,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "/shipments/get_casings.json",
                    "sDom": 'rtip',
                    "aoColumns":[
                        {bVisible: false}
                        ,null
                        ,null
                        ,null
                        ,null
                        ,null
                        ,null
                        ,null
                        ,null
                        ,{bSearchable: false}
                        ,null
                        ,null
                        ,{bSearchable: false, bSortable: false, bVisible: false}
                    ],
                    "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                      oSettings.jqXHR = $.ajax( {
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": 'data[Casings]='+JSON.stringify(me.casings),
                        "success": fnCallback
                      } );
                    },
                    "fnCreatedRow": function(nRow, aData, iDataIndex){
                        if($.inArray(parseInt(aData[0]),me.casings) === -1){
                            $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" />');
                        }
                        else{
                            $('td:eq(11)', nRow).html('<input type="checkbox" onclick="Shipments.addToCasingArray('+aData[0]+')" checked />');
                        }
                    }
                });
                
                // save
                $('[name="confirm-shipment"]').unbind().click(function(){
                    // data object
                    var data = {
                        Shipment: {
                            name: $('#add-new-shipment').find('#shipment-name').val(),
                            coItems: me.casings
                        },
                        batch_id: $('#batch-id').val()
                    }
                    //call save with callback
                    me.save(data,function(data){
                        if(data.success == '1'){
                            me.index();
                            me.casings = [];
                            $('.nav-list li:last-child').removeClass('active');
                            $('.nav-list li:first-child').addClass('active');
                        }
                        $('#casings-confirm-modal').modal('hide');
                    });
                })
                // cancel
                $('[name="cancel-shipment"]').unbind().click(function(){
                    $('#casings-confirm-modal').modal('hide');
                    me.casings = [];
                    me.add();
                })
            })
            // cancel event
            $('#add-new-shipment').find('[name=cancel]').unbind().click(function(){
                if(confirm('Cancel this shipment?')){
                    $('#add-new-shipment').empty().hide();
                    $('#shipments-table').show();
                }
            })
        },
        addToCasingArray: function(id){
            var index = $.inArray(parseInt(id),Shipments.casings);
            // not found - add
            if(index == -1){
                Shipments.casings.push(id);
            }
            // found - remove
            else{
                delete Shipments.casings[index];
            }
        },
        hideAll: function(){
            // destroy dataTables instance if it exists
            if( $('#shipments-table').hasClass('dataTable') ){
                $('#shipments-table').dataTable().fnDestroy();
            }
            // destroy casing table
            $('#add-new-shipment').hide();
            if( $('#casings-table').hasClass('dataTable') ){
                $('#casings-table').dataTable().fnDestroy();
            }
            $('#shipments-table').hide();
            $('#add-new-shipment').hide();
            $('#report-table').hide();
            $('#shipped-goods').hide();
            $('#page-sub-title').html('');
        },
        loadShipments: function(){
            this.hideAll();
            $.get('/shipments/',function(response){
                $('#contentwrapper .main_content').html(response);
            })
        },
        getBatch: function(id,callback){
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/shipments/getbatch',
                data: 'data[Batch][id]='+id,
                success: function(data){
                    var o = me.tools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        },
        getReport: function(callback){
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/shipments/fulfillment/',
                success: function(data){
                    var o = me.tools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        },
        save: function(form,callback){
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/shipments/add/',
                data: 'data='+JSON.stringify(form),
                success: function(data){
                    var o = me.tools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        },
        loadTable: function(data){
            var len = data.length;
            $('#report-table tbody').empty();
            // destroy
            if( $('#report-table').hasClass('dataTable') ){
                $('#report-table').dataTable().fnDestroy();
                $('#report-table tbody').empty();
                console.log('clear')
            }
            if(len == 0){
                $('#report-table tbody').append($('#report-row-empty').clone().html());
                return false;
            }
            
            var template = $('#report-row-template').clone();
            
            for(var i=0; i<len; i++){
                $('#report-table tbody').append($(template).html());
                var row = $('#report-table tbody tr').last();
                
                $(row).attr('data-id',data[i].CoItem.id);
                $(row).find(':checkbox').attr('casing-id',data[i].Casing.id);
                this.tools.renderRow(row,data[i].Casing);
                $(row).find('[data-id="ref"]').text(data[i].Co.ref);
                $(row).find('[data-id="company_name"]').text(data[i].Casing.Customer.company_name);
                $(row).find('[data-id="line_number"]').text(data[i].CoItem.line_number);
                $(row).find('[data-id="item_type"]').text(data[i].CoItemType.name);

                // item
                var item = $(row).find('[data-id=item]');
                if(data[i].Casing.size_id > 0){
                    $(item).text(data[i].Casing.Size.size_code);
                }
                else{
                    $(item).text(data[i].Casing.TireSize.size_code);
                }
                $(item).append(data[i].Casing.TreadDesign.tread_abb+data[i].Casing.TreadWidth.size_mm);
                // tire size name
                $(row).find('[data-id="tiresize"]').text(data[i].Casing.TireSize.name);
                // brand
                var brand = $(row).find('[data-id="brand"]');
                if(data[i].Casing.manufacturer_id > 0){
                    $(brand).text(data[i].Casing.Manufacturer.name);
                }
                else if(data[i].Casing.manufacturer_plant_id > 0) {
                    $(brand).text(data[i].Casing.ManufacturerPlant.Manufacturer.name);
                }
                // dot code
                $(row).find('[data-id="dot"]').text(data[i].Casing.plant_dot+data[i].Casing.size_dot+data[i].Casing.product_line_dot+data[i].Casing.production_week);
                // desc.
                $(row).find('[data-id="desc"]').text(data[i].Casing.TreadDesign.name);
                // tread size
                $(row).find('[data-id="size_mm"]').text(data[i].Casing.TreadWidth.size_mm);
            }
        }
    }
})