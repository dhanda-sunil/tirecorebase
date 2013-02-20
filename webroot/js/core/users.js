/**
 * Users
 * @todo remove tab
 */
$(function() {
    
    User = {
        id:0,
        pageTabs:[],
/**
 * initializes libraries and other required functionality
 * @return void
 */
        init: function(){
            if($('#page-title').text() != 'Users'){
                var me = this;
                $.get('/users/index',function(response){
                    $('#main-content').html(response);
                    coreTools.addStyle('/lib/datatables/css/jquery.dataTables.css');
                    coreTools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    .script('/lib/datatables/extras/ColVis/media/js/ColVis.min.js')
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait(function(){
                        me.index();
                    })
                })
            }
            else{
                this.index();
            }
        }
/**
 * load main index into dom
 * @return void
 */ 
        ,index: function(){
            $('#page-main').show();
            $('#add-form').hide();
            
            if( $('#page-table').hasClass('dataTable') ){
                $('#page-table').dataTable().fnDraw();
                return;
            }
            
            $('#page-table').dataTable({
                "bProcessing": true
                ,"bServerSide": true
                ,"sAjaxSource": "/users/index.json"
                ,"sDom": 'CRTfrtip'
                ,"oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
                ,"oColVis": {
                    "aiExclude": [0,5]
                }
                ,"aoColumns":[
                    null,
                    null,
                    null,
                    null,
                    null,
                    {bSortable: false,bVisible: false}
                ]
                ,"fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(0)', nRow).html('<a href="javascript:User.view('+aData[5]+')">'+aData[0]+'</a>');
                }
            });
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
            $('#page-main').hide();
            $('#add-form').show();
            $('#page-title').text('Add User');
            
            // show template
            var content = $('#add-form');
            var template = $('#page-record-template').clone();
            $(content).show();
            $(content).html( $(template).html() );
            
            // auto-generate username
            $(content).find('[name="data[User][username]"]').unbind().focus(function(){
                if($(this).val() == ''){
                    var first = $(content).find('[name="data[User][first_name]"]').val().substr(0, 1);
                    var last = $(content).find('[name="data[User][last_name]"]').val().substr(0, 4);
                    var username = (first+last).toLowerCase()
                    $(this).val(username);
                }
            })
            
            // autoset to active
            $(content).find('[name="data[User][active]"]').attr('checked','checked');
            
            // hide delete btn
            $(content).find('.delete-customer').show();

            // close window
            $(content).find('.close-record').unbind().click(function(){
                me.index();
            });

            // save event
            $(content).find('.save-record').last().unbind().click(function(){
                var record = coreTools.getData($(content));
                me.save(record,function(data){
                    if(data.success == '1'){
                        me.index();
                    }
                })
            })
        }
/**
 * displays edit form
 * @param id
 * @return void
 */
        ,view: function(id){
            var tab, content = {}
            this.id = id;
            var me = this;
            if($.inArray(id,this.pageTabs) >= 0){
                $('#page-tab-list a[href="#tab-'+id+'"]').tab('show');
                // close page event
                return;
            }
            // add to pageTabs
            me.pageTabs.push(id);
            
            // add tab + tab content
            this.addTab(id);
            
            // set active tab
            $('#page-tab-list a[href="#tab-'+id+'"]').tab('show');
            tab = $('#page-tab-list').find('.active');
            content = $('#page-main .tab-content').find('.active');

            // get template + populate tab with cloned template
            var template = $('#page-record-template').clone();
            
            $(content).html( $(template).html() );
            
            $.getJSON('/users/view/'+id+'.json',function(record){               
                // set title to customers name
                $(tab).find('a').text(record.User.first_name+' '+record.User.last_name);
                coreTools.renderRecord(content,record);
                $(content).find('[name="data[User][password]"]').val('');
                // close page event
                $(content).find('.close-record').last().click(function(){
                    me.hide($('#page-main .tab-content').find('.active').attr('id').replace('tab-',''));
                })

                // save page event 
                $(content).find('.save-record').last().unbind().click(function(){
                    var record = coreTools.getData($(content));
                    
                    me.save(record,function(data){
                        console.log(data);
                    })
                })
            })
        }
/**
 * saves user
 * @param record
 * @param callback
 * @return void
 */
        ,save: function(record,callback){
            var me = this;
            var action = (this.id > 0) ?  'edit/'+this.id:'add';
            console.log(record,'record');
            $.ajax({
                type: 'POST',
                url: '/users/'+action+'.json',
                data: record,
                success: function(data){
                    if(callback != undefined){
                        coreTools.response(data);
                        callback(data);
                    }
                }
            });
        }
/**
 * removes a tab
 * @param id
 * @return void
 */
        ,hide: function(id){
            //console.log(id,'id')
            var index = $.inArray(parseInt(id),this.pageTabs);
            //console.log(this.pageTabs,'pageTabs');
            //console.log(index,'index');
            if(index >= 0){
                this.pageTabs.splice(index,1);
                $('#page-tab-list a[href="#tab-'+id+'"]').parent().empty().remove();
                $('.tab-content div[id="#tab-'+id+'"]').empty().remove();
                $('#page-tab-list a[href="#tab-0"]').tab('show');
            }
        }
/**
 * adds a tab
 * @param id
 * @return void
 */
        ,addTab: function(id){
            $('#page-tab-list').append('<li><a href="#tab-'+id+'" data-toggle="tab">Loading...</a></li>');
            $('#page-main .tab-content').append('<div class="tab-pane" id="tab-'+id+'">');
        }
    }
})