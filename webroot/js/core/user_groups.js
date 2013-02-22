/**
 * Users
 * @todo remove tab
 */
$(function() {
    
    UserGroup = {
        id:0,
        pageTabs:[],
/**
 * initializes libraries and other required functionality
 * @return void
 */
        init: function(){
            if($('#page-title').text() != 'User Groups'){
                var me = this;
                $.get('/user_groups/index',function(response){
                    $('#main-content').html(response);
                    coreTools.addStyle('/lib/datatables/css/jquery.dataTables.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait(function(){
                        me.index();
                    })
                })
            }
            else{
                this.index();
            }
            $('.nav-list').removeClass('active');
            $('#collapse-2 li:first-child').addClass('active');
        }
/**
 * load main index into dom
 * @return void
 */ 
        ,index: function(){
            $('#page-main').show();
            $('#add-form').hide();
            if( $('#page-table').hasClass('dataTable') ){
                $('#page-table').dataTable().fnDestroy();
            }
            $('#page-table').dataTable({
                "bProcessing": true
                ,"bServerSide": true
                ,"sAjaxSource": "/user_groups/index.json"
                ,"sDom": 'Rfrtip'
                ,"aoColumns":[
                    null,
                    null,
                    {bSortable: false}
                ]
                ,"fnCreatedRow": function(nRow, aData, iDataIndex){
                    $('td:eq(2)', nRow).html('<i class="icon-edit" style="cursor:pointer" onclick="UserGroup.view('+aData[0]+')"></i>');
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
            $('#page-title').text('Add User Group');
            
            // show template
            var content = $('#add-form');
            var template = $('#page-record-template').clone();
            $(content).show();
            $(content).html( $(template).html() );
            
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
            
            $.getJSON('/user_groups/view/'+id+'.json',function(record){               
                // set title to customers name
                $(tab).find('a').text(record.UserGroup.name);
                coreTools.renderRecord(content,record);
                
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
                url: '/user_groups/'+action+'.json',
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