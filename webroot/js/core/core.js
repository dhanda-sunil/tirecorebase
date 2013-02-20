var Core = {}
var CoreTools = {}
var coreTools = {}

$(function(){
   Core = {
       init: function(){
            //this.getMessageCount();
            this.actionMenuItemToggle();
            this.menuEvents();
            $('#mainNavigation').modal('show');
       }
       ,load: function(){
           
       }
       ,getMessageCount: function(){
            var me = this;
            $.get('/messages/unreadcount/',function(response){
                
                if($('#unread-mail').text() != response){
                    // notification ui event
                }
                
                $('#unread-mail').text(response);
                
                setTimeout(function(){me.getMessageCount()},3000);
            })
        }
        ,menuEvents: function(){
            var me = this;
            $('#mainNavigationCurrent a').click(function(){
                $('#main-content').empty();
                var callback = null;
                var control = $(this).attr('control');
                
                switch(control){
                    case 'materials':
                        callback = function(){Materials.init()}
                        break;
                    case 'retreads':
                        me.loadSideMenu(control);
                        control = false;
                        $('#mainNavigation').modal('hide');
                        $LAB
                        .script('/js/core/shipments.js').wait(function(){
                            Shipments.init();
                        })
                        .script('/js/core/molds.js')
                        .script('/js/core/mold_types.js')
                        .script('/js/core/productivity_report.js')
                        .script('/js/core/bead_plates.js')
                        break;
                    case 'shipments':
                        callback = function(){Shipments.init()}
                        break;
                    case 'customers':
                        callback = function(){Customers.init()}
                        break;
                    case 'users':
                        me.loadSideMenu(control);
                        control = false;
                        $('#mainNavigation').modal('hide');
                        $LAB
                        .script('/js/core/users.js').wait(function(){
                            User.init();
                        })
                        .script('/js/core/user_groups.js')
                        break;
                    case 'retread_templates':
                        callback = function(){RetreadTemplate.init()}
                        break;
                    case 'batches':
                        callback = function(){Batches.init()}
                        break;
                }
                if(callback!=null){
                    me.loadControl(control,callback);
                    return true;
                }
                else if(control!= false){
                    me.loadControl(control);
                }
            })
        } 
        ,actionMenuItemToggle: function(){
            $('.nav-list li').unbind().click(function(){
                //console.log(this,'click')
                $('.nav-list li').removeClass('active');
                $(this).addClass('active');
            })
        }
        ,loadControl: function(control,callback){
            var me = this;
            // hide menu
            $('#mainNavigation').modal('hide');
            // get controller
            $.get('/'+control,function(response){
                $('#main-content').html(response);
                if(callback != undefined){
                    callback();
                }
            });
            // load side menu
            this.loadSideMenu(control);
            // load controls script
            try{
                $LAB
                .script('/js/core/'+control+'.js').wait()
            }
            catch(err){
                
            }
        },
        loadSideMenu: function(control){
            var me = this;
            // empty sidebar
            $('.sidebar #side_accordion').empty();
            // get sidebar action menu
            if($('.sidebar #side_accordion').length){
                $.get('/'+control+'/sidebar_action',function(response){
                    $('.sidebar #side_accordion').html(response);
                    me.actionMenuItemToggle();
                });
            }
        }
   }
   
   CoreTools = function(){
       this.inQueue = 0;
   }
   
   CoreTools.prototype.init = function(){
       if(this.resources.length == 0){
           this.getResources();
           console.log('CoreTools initialized');
       }
   }
   CoreTools.prototype.resources = [];
   CoreTools.prototype.libraries = [];
   CoreTools.prototype.baseHref= $('base').attr('href');
   CoreTools.prototype.getResources= function(){
        var me = this;
        $('script').each(function(){
            me.pushResource(this.src);
        })
        $('link').each(function(k,v){
            me.pushResource(this.href);
        })
    }
    CoreTools.prototype.pushResource= function(resource){
       if(resource != '' && resource != undefined){
           this.resources.push(resource);
       }
    }
    CoreTools.prototype.addStyle= function(src,callback){
        var me = this;
        this.init();
        src = me.baseHref+src;
         // add if style not found
         if( $.inArray(src,this.resources) == -1 ){
             console.log(src,'loading...')
             var s = document.createElement('link');
             s.rel = 'stylesheet';
             s.async = true;
             s.href = src;
             var x = document.getElementsByTagName('link')[0];
             x.parentNode.insertBefore(s, x);
             try{
                 s.onload = function(){
                     me.inQueue--;
                     if(callback!=undefined){
                         callback();
                     }
                     console.log(src,'loaded')
                 }
             }
             catch(err){
                 console.log(err,'Error loading style '+src)
             }
             // add to resources
             this.pushResource(src);
         }
         else{
             me.inQueue--;
             if(callback!=undefined){
                 callback();
             }
         }
    }
    CoreTools.prototype.parseJson = function(data){
        var r = {
            json: '',
            result: true,
            error: ''
        }

        if(data){

            try{
                r.json = JSON.parse(data);

                if(typeof(r.json) == 'object'){

                    if(r.json.success == '1'){
                        if(r.json.message){
                            this.notification('success',r.json.title,r.json.message);
                        }
                        else{
                            this.notification('success',r.json.title);
                        }
                    }
                    else if(r.json.success == '0'){

                        var str = '';
                        if(r.json.errors){
                            $.each(r.json.errors,function(k,v){
                                str+= '<p><i class="splashy-error_small"></i> '+v+'</p>';
                            })
                        }
                        if(r.json.title){ 
                            this.notification('error',r.json.title,str);
                        }
                        else{
                            this.notification('error','Error Encountered',str);
                        }
                    }
                }
                else{
                    r.error = 'Server response is not an object';
                    r.result = false;
                }
            }
            catch(err){
                r.error+='Malformed data returned from server: '+err+'; server-data: '+data;
                r.result = false;
            }
        }
        else{
            r.error+= 'Invalid server response; server-data: '+data+'; verify server response is being passed into CoreTools.parseJson()';
            r.result = false;
        }

        if(r.result == false){
            console.log(r.error,'Error Decoding JSON');
            console.log(data,'Server response');
        }

        return r;
    }
    CoreTools.prototype.response= function(data){
        var me = this;
        if(data != undefined && data != null && data != '' && typeof(data) == 'object'){

            if(data.success == '1'){
                if(data.message){
                    this.notification('success',data.title,data.message);
                }
                else{
                    this.notification('success',data.title);
                }
            }
            else if(data.success == '0'){

                var str = '';
                if(data.errors){
                    $.each(data.errors,function(k,v){
                        if(typeof(v) == 'object'){
                            $.each(v,function(k2,v2){
                                me.notification('error',data.title,v2);
                            })
                        }
                        else{
                            me.notification('error',data.title,v);
                        }
                        
                    })
                }
                else{
                    if(data.title){ 
                        this.notification('error',data.title,str);
                    }
                    else{
                        this.notification('error','Error Encountered',str);
                    }
                }
            }
        }
        else{
            data.error = 'Server response is not an object';
            data.result = false;
        }
    }
    CoreTools.prototype.renderRow= function(element,record){
        $.each(record,function(key,value){
             $(element).find('[data-id="'+key+'"]').text(value);
         })
    }
/**
 * Sets values from an object into form inputs
 * @param element (object)
 * @param record (object)
 */
    CoreTools.prototype.renderRecord= function(element,record){
        //@todo may need additional logic for radio buttons
        
        // loop through models
        $.each(record,function(model,value){
            
            if(typeof(value) == 'object'){
                // loop through fields
                $.each(value,function(field,v){
                    var input = $(element).find('[name="data['+model+']['+field+']"]');
                    //console.log(model+' '+field+' '+v+' '+$(input).val(),'field');
                    if($(input).attr('type') == 'checkbox' && v > 0){
                        $(input).attr('checked','checked');
                    }
                    else if($(input).attr('type') == 'radio'){
                        $(input).each(function(){
                            if($(input).attr('type') == 'radio' && $(this).val() == v){
                                $(this).attr('checked','checked');
                            }
                        })
                    }
                    else{
                        $(input).val(v);
                    }
                })
            }
            else{
                var input = $(element).find('[name="'+model+'"]');

                if($(input).attr('type') == 'checkbox' && value > 0){
                    $(input).attr('checked','checked');
                }
                else if($(input).attr('type') == 'radio' && $(input).val() == v){
                    $(input).each(function(){
                        if($(input).attr('type') == 'radio' && $(this).val() == v){
                            $(this).attr('checked','checked');
                        }
                    })
                }
                else{
                    $(input).val(value);
                }
            }
        })
    }
    
/**
 * retrieves input field data from an element container and converts into a CakePHP compatible format
 * @param element (Object)
 * @param encode (Boolean) 1 or 0 whether to URL encode data
 * @return data (Object)
 */
    CoreTools.prototype.getData = function(element,encode){
       
       var select = $(element).find('select');
       var input = $(element).find('input');
       var inputs = $.merge(select,input);
       var data = {};
       //console.log(input,'input');
       $.each(inputs,function(){
            if($(this).attr('type') != 'button'){
                if($(this).attr('type') != undefined){
                    switch($(this).attr('type')){
                        case 'checkbox':
                            data[$(this).attr('name')] = ( ($(this).attr('checked') == 'checked') ? $(this).val():0 );
                            break;
                        case 'radio':
                            if(data[$(this).attr('name')] == undefined){
                                data[$(this).attr('name')] = '';
                            }
                            if($(this).attr('checked') == 'checked'){
                                data[$(this).attr('name')] = $(this).val();
                            }
                            break;
                        default:
                            data[$(this).attr('name')] = (encode == 1) ? encodeURIComponent($(this).val()) : $(this).val();
                            break;
                    }
                }
                else{
                  data[$(this).attr('name')] = (encode == 1) ? encodeURIComponent($(this).val()) : $(this).val();
                }
            }
       })
       return data;
    }
    
/**
 * displays notifications in the top-right of the application window
 * @param type (String) error, success, or info
 * @param title (String) 
 * @param message (String)
 */
    CoreTools.prototype.notification = function(type,title,message){
        console.log(message);
        $.sticky(title+'<br/><span style="font-weight:normal !important;">'+( (message) == undefined ? '':message)+'</span>', 
            {
                autoclose : 5000, 
                position: "top-right", 
                type: "st-"+type 
            }
        )
    }
    
/**
 * saves users datatable settings
 * @param oTable (Object) 
 * @param controller (String) 
 * @param option (String)
 * @param value (String)
 * @return boolean
 */
    CoreTools.prototype.saveDataTableSettings = function(oTable,controller,option,value){
        if(oTable.oData == undefined){
            return oTable.oData = value;
        }
        
        if(oTable.oData.ColReorder.toString() != value.ColReorder.toString() || oTable.oData.abVisCols.toString() != value.abVisCols.toString()){
            $.ajax({
                type: 'POST',
                url: '/user_prefs/edit.json',
                data: 'data[UserPref][object]='+controller+'&data[UserPref][option]='+option+'&data[UserPref][value]='+JSON.stringify(value),
                success: function(data){
                    console.log(data);
                }
            });
            return true;
        }
        return false;
    }
/**
 * retrieves datatable settings from user preferences
 * @param object (String) 
 * @param option (String)
 * @return object
 */
    CoreTools.prototype.getDataTableSettings = function(object,option){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/user_prefs/view/"+object+"/"+option+".json",
            async: false
        }).done(function(data) {
            if(typeof(data) != 'object' || data.UserPref == undefined){
                o = false;
            }
            else{
                o = data.UserPref.value;
            }
        });

        return o;
    }
   
   Core.init();
   coreTools = new CoreTools();
})