/**
 * Customers
 * @todo remove tab
 */
$(function() {
    
    Customers = {
        id:0,
        customerTabs:[],
        activeTabId: '',
/**
 * initialize libraries
 */
        init: function(){
            var me = this;
            coreTools.addStyle('lib/datatables/css/jquery.dataTables.css');
            coreTools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');
            coreTools.addStyle('lib/datepicker/datepicker.css');
            
            $LAB
            .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
            .script('/lib/jquery.inputmask.min.js')
            //.script('/lib/jeditable/jquery.jeditable.min.js').wait()
            .script('/lib/datatables/extras/ColVis/media/js/ColVis.min.js')
            .script('/lib/datepicker/bootstrap-datepicker.min.js')
            .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
            .script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
                me.index();
            });
            this.customerTabs=[];
        }
/**
 * load main index into dom
 * @return void
 */ 
        ,index: function(){
            $('#customer-title').text('Customers');
            $('#customer-form').hide();
            $('#customer-add').hide();
            $('#customer-main').show();
            // destroy dataTables instance if it exists
            if( $('#customers-table').hasClass('dataTable') ){
                $('#customers-table').dataTable().fnDraw();
                $('.customer-view').show();
                return; 
            }
            // init dataTables
            $('#customers-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "bStateSave": true,
                "sAjaxSource": "/customers/index.json",
                "sDom": 'CRTfrtip',
                "oColVis": {
                    "aiExclude": [5,6]
                },
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
                    "aButtons": [
                        {
                            "sExtends": 'copy',
                            "mColumns":[0,1,2,3,4]
                        },
                        {
                            "sExtends": 'print',
                            "mColumns":[0,1,2,3,4]
                        },
                        {
                            "sExtends": 'xls',
                            "mColumns":[0,1,2,3,4]
                        },
                        {
                            "sExtends": 'pdf',
                            "mColumns":[0,1,2,3,4]
                        }
                    ]
                },
                "aoColumns":[
                    null,
                    {bSortable: false},
                    {bSortable: false},
                    {bSortable: false},
                    {bSortable: false},
                    {bVisible: false,bSortable: false},
                    {bSortable: false},
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(5)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="Customers.view('+aData[5]+')"></i>');
                },
                "fnStateSave": function (oSettings, oData) {
                    
                    if(this.oData == undefined){
                        this.oData = oData;
                        return; 
                    }
                    if( coreTools.saveDataTableSettings(this,'Customers','index.datatable',oData) == true ){
                        this.oData = oData;
                    }
                },
                "fnStateLoad": function (oSettings) {
                    o = coreTools.getDataTableSettings('Customers', 'index.datatable');
                    console.log(o,'come on!');
                    if(o != false){
                        return o;
                    }
                }
            });
        }
/**
 * removes a tab and unloads tables in customer view
 * @param id
 * @return void
 */
        ,hide: function(id){
            var index = $.inArray(parseInt(id),this.customerTabs);
            
            if(index < 0){
                 index = $.inArray(id,this.customerTabs);
            }
            
            if( index >= 0 ){
                // remove from tabs array
                this.customerTabs.splice(index,1);
                // remove from tabs
                $('#customer-tab-list a[href="#tab-'+id+'"]').parent().empty().remove();
                $('.tab-content div[id="#tab-'+id+'"]').empty().remove();
                $('#customer-tab-list a[href="#tab-0"]').tab('show');
                // remove datatable instances from view
                if( $('.customer-view table') && $('.customer-view table').hasClass('dataTable') ){
                    $('.customer-view table').dataTable().fnDestroy();
                    $('.customer-view table').empty().remove();
                }
                $('.customer-view').hide();
            }
        }
/**
 * adds a tab
 * @param id
 * @return void
 */
        ,addTab: function(id){
            $('#customer-tab-list').append('<li><a href="#tab-'+id+'" data-toggle="tab">Loading...</a></li>');
            $('#customer-main .tab-content').append('<div class="tab-pane" id="tab-'+id+'">');
            $('#customer-tab-list li').unbind().click(function(){
                var href = $(this).find('a:first-child');
                if(href == undefined){
                    href = $(this);
                }
                if($(href).attr('href') == '#tab-0'){
                    $('.customer-view').hide();
                }
                else{
                    Customers.id = $(href).attr('href').replace('#tab-','');
                    Customers.activeTabId = $(href).attr('id');
                    $('.customer-view').show();
                }
            })
        }
/**
 * displays edit form
 * @param id
 * @return void
 */
        ,view: function(id){
            
            var tab, content = {}
            $('.customer-view').show();
            
            if($.inArray(id,this.customerTabs) >= 0){
                $('#customer-tab-list a[href="#tab-'+id+'"]').tab('show');
                // close customer event
                return;
            }
            
            // add to customerTabs
            this.customerTabs.push(id);
            Customers.activeTabId = 'tab-'+id;
            
            // add tab + tab content
            this.addTab(id);
            
            this.id = Customers.id = id;
            var me = this;
            
            // set active tab
            $('#customer-tab-list a[href="#tab-'+id+'"]').tab('show');
            tab = $('#customer-tab-list').find('.active');
            content = $('#customer-main .tab-content').find('.active');

            // get template + populate tab with cloned template
            var template = $('#customer-record-template').clone();
            $(content).html( $(template).html() );
            $(content).find('.add-only').empty().remove();
            
            // load input masks
            $(content).find('[name="data[Customer][phone_number]"]').inputmask("(999) 999-9999");
            $(content).find('[name="data[Customer][fax_number]"]').inputmask("(999) 999-9999");
            $(".uni_style").uniform();
            $(content).find('#dp_start').datepicker();
            $.getJSON('/customers/view/'+Customers.id+'.json',function(data){
                var obj = data;
                me.id = obj.Customer.id;
                
                // set title to customers name
                $(tab).find('a').text(obj.Customer.company_name);
               
                // populate fields within tab
                coreTools.renderRecord(content,obj);
               
                // close customer event
                $(content).find('.close-customer').click(function(){
                    me.hide(Customers.id);
                })

                // save customer event 
                $(content).find('.save-customer').last().unbind().click(function(){
                    
                    me.id = $('#customer-main .tab-content').find('.active').attr('id').replace('tab-','');
                    var data = coreTools.getData($(content));

                    // save customer callbac
                    me.save(data,function(response){
                        
                        coreTools.response(response);
                        
                        if(response.success == '1'){
                            var customer = response.Customer;
                            var row = $('#customers-table').find('tr[data-id="'+customer.id+'"]');
                            // update tab text
                            $('#customer-tab-list').find('a[href="#tab-'+customer.id+'"]').text(customer.company_name);
                            coreTools.renderRow(row,customer);
                            me.index();
                        }
                    })
                })
            });
            
            this.getContacts();
            this.getAccounts();
            this.getAddresses();
        }
/**
 * displays add form
 * @return void
 */
        ,add: function(){
            // id must not be set to add new record
            this.id = 0;
            var me = this;
            // set title
            $('#customer-main').hide();
            $('.customer-view').hide();
            $('#customer-title').text('Add Customer');
            
            // show template
            var content = $('#customer-form');
            var template = $('#customer-record-template').clone();
            $(content).show();
            $(content).html( $(template).html() );
            $(content).find('.edit-only').empty().remove();
            // autoset customer to active
            $(content).find('[name="data[Customer][active]"]').attr('checked','checked');
            // hide delete btn
            $(content).find('.delete-customer').show();
            // set input masks
            $(content).find('[name="data[Customer][phone_number]"]').inputmask("(999) 999-9999");
            $(content).find('[name="data[Customer][fax_number]"]').inputmask("(999) 999-9999");
            $(".uni_style").uniform();
            $(content).find('#dp_start').datepicker();
            // save event
            $(content).find('.save-customer').last().unbind().click(function(){
                
                var data = coreTools.getData($(content));
                
                me.save(data,function(response){
                    
                    coreTools.response(response);
                    
                    if(response.success == '1'){
                        var template = $('#customer-table-template').clone();
                        $('#customers-table tbody').append( $(template).html() );
                        var row = $('#customers-table tr').last();
                        $(row).attr('data-id',response.Customer.id);
                        $(row).find('[data-id]').html('<i class="icon-edit" style="cursor:pointer" onclick="Customers.view('+response.Customer.Customer.id+')" value=""></i>');
                        coreTools.renderRow(row,response.Customer);
                        $('#customers-table').dataTable().fnDraw();
                        $('#customer-title').text('Customers');
                        $('#customer-form').hide();
                        $('#customer-add').hide();
                        $('#customer-main').show();
                        Customers.view(response.Customer.Customer.id);
                    }
                });
            })
        }
/**
 * saves customer
 * @param data (object)
 * @param callback (function)
 * @return void
 */
        ,save: function(data,callback){
            var me = this;
            var action = (this.id > 0) ?  'edit/'+this.id:'add/';
            
            $.ajax({
                type: 'POST',
                url: '/customers/'+action+'.json',
                data: data,
                success: function(data){
                    if(callback != undefined){
                        callback(data);
                    }
                }
            });
        }
/**
 * saves data associated with a customer (addresses, contacts, accounts)
 * @param template (object) template to be loaded
 * @param url (string) 
 * @param onload (function) callback for when form loads
 * @param onsave (function) callback for when xhr response is received
 * @return void
 */
        ,saveAssociatedRecord: function(template,url,onload,onsave){
            var me = this;
            $('#page-modal .modal-body').html($(template).clone().html());
            $('#page-modal').modal();
            $('#page-modal #modal-title').text('Add');
            
            onload();
            
            // save event
            $('#page-modal [name="save-modal"]').unbind().click(function(){
                var data = coreTools.getData($('#page-modal .modal-body'));
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(data){
                        coreTools.response(data);
                        onsave(data);
                    }
                });
            })
        }
/**
 * display edit contact form
 * @param id (int)
 */        
        ,editContact: function(id){
            var customer_id = this.id;
            var me = this;
            
            this.saveAssociatedRecord($('#contact-add-template'), '/contacts/edit/'+id+'.json', function(){
                $.getJSON('/contacts/view/'+id+'.json', function(response){
                    coreTools.renderRecord($('#page-modal .modal-body'),response);
                });
                $('#page-modal .modal-body [name="data[Contact][ref_id]"]').val(customer_id);
                $('#page-modal .modal-body [name="data[Contact][phone_number]"]').inputmask("(999) 999-9999");
                $(".uni_style").uniform();
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getContacts();
                }
            })
        }
/**
 * display edit account form
 * @param id (int)
 */  
        ,editAccount: function(id){
            var customer_id = this.id;
            var me = this;
            
            this.saveAssociatedRecord($('#account-add-template'), '/accounts/edit/'+id+'.json', function(){
                $.getJSON('/accounts/view/'+id+'.json', function(response){
                    coreTools.renderRecord($('#page-modal .modal-body'),response);
                    $(".uni_style").uniform();
                });
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getAccounts();
                }
            })
        }
/**
 * display edit address form
 * @param id (int)
 */  
        ,editAddress: function(id){
            var customer_id = this.id;
            var me = this;
            
            this.saveAssociatedRecord($('#address-add-template'), '/addresses/edit/'+id+'.json', function(){
                $.getJSON('/addresses/view/'+id+'.json', function(response){
                    coreTools.renderRecord($('#page-modal .modal-body'),response);
                    $(".uni_style").uniform();
                });
                $('#page-modal .modal-body [name="data[Address][ref_id]"]').val(customer_id);
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getAddresses();
                }
            })
        }
/**
 * display add contact form
 */  
        ,addContact: function(){
            var id = this.id;
            var me = this;
            this.saveAssociatedRecord($('#contact-add-template'), '/contacts/add.json', function(){
                $('#page-modal .modal-body [name="data[Contact][ref_id]"]').val(id);
                $('#page-modal .modal-body [name="data[Contact][phone_number]"]').inputmask("(999) 999-9999");
                $(".uni_style").uniform();
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getContacts();
                }
            })
        }
/**
 * display add account form
 */  
        ,addAccount: function(){
            var id = this.id;
            var me = this;
            this.saveAssociatedRecord($('#account-add-template'), '/accounts/add.json', function(){
                
                // make random account number
                var company = $('.tab-content .active [name="data[Customer][company_name]"]').val().replace(' ','');
                var account = company.substring(0,5) +''+ id +''+ new Date().getDate() +''+ new Date().getMonth() +''+ Math.floor(Math.random()* 999999);
                $('[name="data[Account][number]"]').val('');
                $('[name="data[Account][number]"]').val(account);
                
                $('#page-modal .modal-body [name="data[Account][customer_id]"]').val(id);
                $(".uni_style").uniform();
                $('#page-modal .modal-body #same-as-billing').click(function(){
                    
                    if($(this).attr('checked') == 'checked'){
                        var shipping = $('.account-shipping-address input');
                        $('.account-billing-address input').each(function(key,value){
                            $(shipping[key+1]).val($(value).val());
                        });
                    }
                })
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getAccounts();
                }
            })
        }
/**
 * display add address form
 */  
        ,addAddress: function(){
            var id = this.id;
            var me = this;
            this.saveAssociatedRecord($('#address-add-template'), '/addresses/add.json', function(){
                $('#page-modal .modal-body [name="data[Address][ref_id]"]').val(id);
                $(".uni_style").uniform();
            }, function(data){
                if(data.success == '1'){
                    $('#page-modal').modal('hide');
                    me.getAddresses();
                }
            })
        }
/**
 * retrieves customer contacts and displays in table
 */  
        ,getContacts: function(){
            var id = Customers.id;
            
            if( $('#'+Customers.activeTabId+' .contacts-table').hasClass('dataTable') ){
                $('#'+Customers.activeTabId+' .contacts-table').dataTable().fnDraw();
                return;
            }
            
            $('#'+Customers.activeTabId+' .contacts-table').dataTable({
                "iDisplayLength": 20,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/contacts/getby_type/customers/"+id+".json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns":[
                    null,
                    null,
                    null,
                    null,
                    {bSearchable: false,bSortable: false},
                    {bVisible: false},
                ],                
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(4)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="Customers.editContact('+aData[4]+')"></i>');
                }
            });
        }
/**
 * retrieves customer accounts and displays in table
 */          
        ,getAccounts: function(){
            var id = Customers.id;
            
            if( $('#'+Customers.activeTabId+' .accounts-table').hasClass('dataTable') ){
                $('#'+Customers.activeTabId+' .accounts-table').dataTable().fnDraw();
                return;
            }
            
            $('#'+Customers.activeTabId+' .accounts-table').dataTable({
                "iDisplayLength": 20,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/customers/get_accounts/"+id+".json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(5)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="Customers.editAccount('+aData[5]+')"></i>');
                }
            });
        }
/**
 * retrieves customer addresses and displays in table
 */  
        ,getAddresses: function(){
            var id = Customers.id;
            
            if( $('#'+Customers.activeTabId+' .addresses-table').hasClass('dataTable') ){
                $('#'+Customers.activeTabId+' .addresses-table').dataTable().fnDraw();
                return;
            }
            
            $('#'+Customers.activeTabId+' .addresses-table').dataTable({
                "iDisplayLength": 20,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/addresses/getby_type/customers/"+id+".json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(7)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="Customers.editAddress('+aData[7]+')"></i>');
                }
            });
        }
    }
})