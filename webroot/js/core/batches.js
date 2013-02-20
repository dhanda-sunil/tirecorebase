$(function() {

    Batches = {
        init: function(){
            var me = this;

            var fg = document.querySelector(".fg-data");
            var inv = document.querySelector(".inv-data");

            // Set the focus to the textarea (only works if field is not hidden)
            setInterval(function () {
                fg.focus();
                inv.focus();
            }, 5);

            // Only allow one of the batch processes to be open at a give time
            $('.batch-buttons').on('click', ":button", function (evt) {
                var me = $(this);
                var neighbors = me.siblings();
                if (neighbors.hasClass('btn-primary')) return false;
                console.log(me);
                console.log(neighbors);
                if (me.hasClass('btn-primary')) {
                    $(me.data('target')).hide();
                    me.removeClass('btn-primary');
                } else {
                    $(me.data('target')).show();
                    me.addClass('btn-primary');
                }
            });

            $(window).focus(function () {
                $('#inv3 .scanCode').show();
                $('#fg3 .scanCode').show();
            });
            $(window).blur(function () {
                $('#fg3 .scanCode').hide();
                $('#inv3 .scanCode').hide();
            });

            $(fg).keyup(function (e) {
                var keyCode = e.keyCode || e.which;

                if (keyCode == 13) {
                    var $this = $(this);
                    $.post("/batches/add.json", {
                        "data[Batch][data]":$(this).val(),
                        "data[Batch][type]":'shipping'
                    }, function (data) {
                        $this.val('');
                        $('#fg3-content').collapse('toggle');
                        $('#fg4-content').collapse('toggle');
                    });
                }
            });
            $(inv).keyup(function (e) {
                var keyCode = e.keyCode || e.which;

                if (keyCode == 13) {
                    var $this = $(this);
                    $.post("/batches/add.json", {
                        "data[Batch][data]":$(this).val(),
                        "data[Batch][type]":'inventory'
                    }, function (data) {
                        $this.val('');
                        $('#inv3-content').collapse('toggle');
                        $('#inv4-content').collapse('toggle');
                    });
                }
            });

//            CoreTools.addLibrary('lib/datatables',function(){
//                if(!$('#shipments-table tr').hasClass('NoRows')){
//                    $('#shipments-table').dataTable({
//                        "sDom": '',
//                        "iDisplayLength":150,
//                        bDestroy:true
//                    });
//                }
//            });
       },
        getShipment: function(id){
            var me = this;
            $('#casings-modal').modal();

            $.get('/shipments/goods/'+id,function(response){
                var o = CoreTools.parseJson(response);
                var data = o.json[0].ShipmentGood;
                var len = data.length;
                $('#shipment-goods-table tbody').empty();

                if(len == 0){
                   $('#shipment-goods-table tbody').append($('#report-row-empty').clone().html());
                    return false;
                }

                var template = $('#report-row-template').clone();

                for(var i=0; i<len; i++){
                    $('#shipment-goods-table tbody').append($(template).html());
                    var row = $('#shipment-goods-table tbody tr').last();
                    $(row).attr('data-id',data[i].FinishedGood.Casing.CoItem.id);
                    try{
                        $(row).find(':checkbox').attr('casing-id',data[i].FinishedGood.Casing.id);
                    }
                    catch(err){}

                    CoreTools.renderRow(row,data[i].FinishedGood.Casing);
                    $(row).find('[data-id="ref"]').text(data[i].FinishedGood.Casing.CoItem.Co.ref);
                    $(row).find('[data-id="company_name"]').text(data[i].FinishedGood.Casing.Customer.company_name);
                    $(row).find('[data-id="line_number"]').text(data[i].FinishedGood.Casing.CoItem.line_number);
                    $(row).find('[data-id="item_type"]').text(data[i].FinishedGood.Casing.CoItem.CoItemType.name);

                    // item
                    var item = $(row).find('[data-id=item]');
                    if(data[i].FinishedGood.Casing.size_id > 0){
                        $(item).text(data[i].FinishedGood.Casing.Size.size_code);
                    }
                    else{
                        $(item).text(data[i].FinishedGood.Casing.TireSize.size_code);
                    }
                    $(item).append(data[i].FinishedGood.Casing.TreadDesign.tread_abb+data[i].FinishedGood.Casing.TreadWidth.size_mm);
                    // tire size name
                    $(row).find('[data-id="tiresize"]').text(data[i].FinishedGood.Casing.TireSize.name);
                    // brand
                    var brand = $(row).find('[data-id="brand"]');
                    if(data[i].FinishedGood.Casing.manufacturer_id > 0){
                        $(brand).text(data[i].FinishedGood.Casing.Manufacturer.name);
                    }
                    else if(data[i].FinishedGood.Casing.manufacturer_plant_id > 0) {
                        $(brand).text(data[i].FinishedGood.Casing.ManufacturerPlant.Manufacturer.name);
                    }
                    // dot code
                    $(row).find('[data-id="dot"]').text(data[i].FinishedGood.Casing.plant_dot+data[i].FinishedGood.Casing.size_dot+data[i].FinishedGood.Casing.product_line_dot+data[i].FinishedGood.Casing.production_week);
                    // desc.
                    $(row).find('[data-id="desc"]').text(data[i].FinishedGood.Casing.TreadDesign.name);
                    // tread size
                    $(row).find('[data-id="size_mm"]').text(data[i].FinishedGood.Casing.TreadWidth.size_mm);

                    $('#casings-modal').find('[name=print]').unbind().click(function(){
                        window.open('/shipments/goods/'+id+'/1');
                    })
                }
            })
        },
        addShipment: function(){
            var me = this;
            this.hideAll();
            // change title
            $('#title').text('Add Shipments');
            // clone template
            var form = $('#add-new-shipment-template').clone();
            $('#add-new-shipment').html($(form).html()).show();
            // hide shipments tablke

            // add drop down events for Select by
            $('.dropdown-menu li').unbind().click(function(){

                var item = $(this).text().toLowerCase();

                $('.report-option').each(function(){
                    $(this).hide();
                })

                $('#'+item+'-dropdown').show();
            })
            // add events to load report table on report selected
            $('.report-option').unbind().change(function(){
                if($(this).val() != ''){
                    me.getReport( $(this).attr('data-id'), {id:$(this).val()}, function(response){
                        me.loadTable(response);
                    });
                }
            })
            // save event
            $('#add-new-shipment').find('[name=save]').unbind().click(function(){
                // data object
                var data = {
                    Shipment: {
                        name: $('#add-new-shipment').find('#shipment-name').val(),
                        coItems: []
                    }
                }
                // get select casings
                $('#add-new-shipment :checked').each(function(){
                    //console.log($(this).attr('co-item-id'),'co-item-id');
                    if($(this).attr('checked') == 'checked'){
                        data.Shipment.coItems.push($(this).attr('casing-id'));
                    }
                })
                // call save with callback
                me.save(data,function(result){
                    console.log(result);
                });
            })
            // cancel event
            $('#add-new-shipment').find('[name=cancel]').unbind().click(function(){
                if(confirm('Cancel this shipment?')){
                    $('#add-new-shipment').empty().hide();
                    $('#shipments-table').show();
                }
            })
        },
        hideAll: function(){
            $('#shipments-table').hide();
            $('#add-new-shipment').hide();
            $('#report-table').hide();
        },
        loadShipments: function(){
            this.hideAll();
            $.get('/shipments/',function(response){
                $('#contentwrapper .main_content').html(response);
            })
        },
        getReport: function(item,param,callback){
            $.ajax({
                type: 'POST',
                url: '/shipments/fulfillment/'+item,
                data: 'data='+JSON.stringify(param),
                success: function(data){
                    var o = CoreTools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        },
        save: function(form,callback){
            $.ajax({
                type: 'POST',
                url: '/shipments/add/',
                data: 'data='+JSON.stringify(form),
                success: function(data){
                    var o = CoreTools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        },
        loadTable: function(data){
            var len = data.length;
            $('#report-table tbody').empty();

            if(len == 0){
                $('#report-table tbody').append($('#report-row-empty').clone().html());
                return false;
            }

            var template = $('#report-row-template').clone();

            for(var i=0; i<len; i++){
                $('#report-table tbody').append($(template).html());
                var row = $('#report-table tbody tr').last();

                $(row).attr('data-id',data[i].CoItem.id);
                try{
                    $(row).find(':checkbox').attr('casing-id',data[i].Casing.id);
                }
                catch(err){}

                CoreTools.renderRow(row,data[i].Casing);
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

            // init dataTables
            $('#report-table').dataTable({
                "sDom": '',
                "iDisplayLength":150,
                bDestroy:true
            });
        }
//        markShipped: function(element){
//
//            var shipped = 0;
//
//            if( $(element).attr('checked') == 'checked'){
//                shipped = 1;
//            }
//            console.log($(element))
//            $.get('/retreads/mark_shipped/'+$(element).attr('co-item-id')+'/'+shipped,function(data){
//                var o = CoreTools.parseJson(data);
//                if(o.json.success == '1'){
//                    console.log('good');
//                }
//                else{
//                    alert('error');
//                }
//            })
//        }
    }
})