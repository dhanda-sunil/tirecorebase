/**
 * RetreadTemplate
 * @todo better error handling on save event
 */
$(function() {
    
    RetreadTemplate = {
        id: 0,
        name: '',
        tools: new CoreTools(),
        init: function(){
            var me = this;
            this.tools.addStyle('/lib/multi-select/css/multi-select.css');
            $LAB
            .script('/lib/multi-select/js/jquery.multi-select.js').wait(function(){
                me.loadTemplate();
            })
        }
        ,initSave: function(callback){
            var me = this;
            $('#preference-form-main .save-template').unbind().click(function(){
                me.saveTemplate(callback);
            })
            $('#preference-form-main .cancel-template-change').unbind().click(function(){
                me.cancelChange();
            })
        }
        ,initMultiSelect: function(){
            if($('#tire_size_select').length) {
                var me = this;
                $('#tire_size_select').multiSelect({
                    selectableHeader: "<div class='custom-header'>Tire Sizes</div>"
                    ,selectedHeader: "<div class='custom-header'>Set Preferences</div>"
                    ,afterSelect: function(value,option){
                        me.addAccordion(value,option);
                    }
                    ,afterDeselect: function(value,option){
                        $('#preference-id-'+value).remove();
                    }
                    // there is no beforeDeselect to warn the user prior to removing @todo warn user before removing an accordion setting?
                });
            }
        }
        ,addAccordion: function(value,option){
            
            if( $('#preference-form-main .accordian-group').length == 0 ){
                $('#preference-form-main .preference-group').attr('id','accordion1');
            }
            
            // clone accordion template and append to existing group of preference accordions
            $('#preference-form-main .preference-group').append( $('#accordian-template').clone().html() );
            
            // get the new preferences accordion div
            var pref = $('#preference-form-main .accordion-group').last();
            
            // clone preference template and append to the new preference accordions body
            $(pref).find('.accordion-inner').html( $('#preference-template').clone().html() );
            
            // set title and identifiers
            var identifier = 'collapse'+($('.accordion-group').length-1);
            $(pref).find('a').last().text(option);
            $(pref).find('a').last().attr('href','#'+identifier);
            $(pref).find('.accordion-body').last().attr('id',identifier);
            
            // add unique identifier
            $('#preference-form-main .accordion-group').last().attr('id','preference-id-'+value);
            $('#preference-form-main .accordion-group').last().attr('data-id',value);
        }
        ,addTemplate: function(){
            $('#preference-form-main').empty().html($('#preference-form-main-template').html());
            $('.delete-template').hide();
            this.id = 0;
            this. name = '';
            var me = this;
            this.initMultiSelect();
            this.addAccordion(0,'Default');
            this.initSave(function(data){
                if(data.RetreadTemplate != undefined){
                    $('#PreferencesNav .active').removeClass('active').before('<li class="active"><a href="javascript:RetreadTemplate.loadTemplate('+data.RetreadTemplate.id+')">'+data.RetreadTemplate.name+'</a></li>');
                    me.loadTemplate(data.RetreadTemplate.id);
                    Core.actionMenuItemToggle();
                }
            });
        }
        ,loadTemplate: function(id){
            
            var me = this;
            var url = isNaN(id) ? '/retread_templates/view/': '/retread_templates/view/'+id;
            
//            if( !$('#preference-form-main').length ){
//                return false;
//            }
            
            $.get(url,function(data){
                
                var o = me.tools.parseJson(data);
                if(o.result == true){
                    o = o.json;
                    //console.log(o,'o')
                    me.id = o.RetreadTemplate.id;
                    me.name = o.RetreadTemplate.name;
                    // load template form
                    $('#preference-form-main').empty().html($('#preference-form-main-template').html());
                    // set template name
                    $('#preference-form-main .template_name').val(o.RetreadTemplate.name);
                    
                    var multiSelect = []; // we'll use this this to store tire sizes to be pre-selected in #tire_size_select
                    
                    // load existing selected tiresizes
                    if(o.RetreadTemplatePreference.length > 0){
                        for(var i=0; i<o.RetreadTemplatePreference.length; i++){
                            // add tire size to accordion
                            if(i > 0){
                                me.addAccordion(o.RetreadTemplatePreference[i].tire_size_id, o.RetreadTemplatePreference[i].tire_size_name);
                                multiSelect.push(o.RetreadTemplatePreference[i].tire_size_id);
                            }
                            else{
                                me.addAccordion(0,'Default');
                            }
                            
                            // get active accordion
                            var prefDiv = $('#preference-form-main .accordion-group').last();
                            
                            // load preference values
                            for(var j=0; j < o.RetreadTemplatePreference[i].preferences.length; j++){

                                var pref = o.RetreadTemplatePreference[i].preferences[j];
                                
                                // set Allow Patches in Following Locations
                                if(pref.material_id > 0 && pref.patch_location_id > 0){
                                    $(prefDiv).find('#'+pref.patch_location_id+'-'+pref.material_id).attr('checked',true);
                                }
                                // set Maximum Repairs per Patch Location
                                else if(pref.patch_location_id > 0){
                                    $(prefDiv).find('[patch-id="'+pref.patch_location_id+'"]').val(pref.value);
                                }
                                // set Default preference settings
                                else{
                                    $(prefDiv).find('[data-id="'+pref.name+'"]').last().val(pref.value);
                                }
                            }
                        }
                    }
                    else{
                        me.addAccordion(i,'Default');
                    }
                    
                    // initialize multi-select
                    $('#tire_size_select').val(multiSelect);
                    me.initMultiSelect();
                    
                    // initialize save
                    me.initSave(function(data){
                        if( data.RetreadPreferences.attempts == data.RetreadPreferences.succeeded ){
                            $('#PreferencesNav .active a').text(data.RetreadTemplate.name);
                        }
                    });
                    
                    // show delete button and initialize delete 
                    $('#preference-form-main .delete-template').unbind().click(function(){
                        me.deleteTemplate(function(data){
                            if(data.success == '1'){
                                $('#preference-form-main').html('<p>Select a template</p>');
                                $('#PreferencesNav .active').removeClass('active').remove();
                            }
                        });
                    }).show();
                }
                else{
                    // error handling
                }
            })
            return true;
        }
        ,saveTemplate: function(callback){
            var me = this;
            var url = '/retread_templates/' + ((this.id > 0) ? 'edit/'+this.id : 'add/');
            
            var data = {
                id: this.id,
                name: $('#preference-form-main .template_name').val(),
                preferences:[]
            }
            
            // loop through each tire setting w/in the template
            $('#preference-form-main .accordion-group').each(function(){
                
                // add preferences
                var dataid = $(this).attr('data-id') == '1' ? '0':$(this).attr('data-id');
                
                // loop through each selectbox
                var iterator=1;
                $(this).find('select').each(function(){
                    data.preferences.push({
                        name: $(this).attr('data-id'),
                        tire_size_id: dataid,
                        value: $(this).val(),
                        is_default: iterator
                    });
                    iterator++;
                })
                
                // loop Allow Patches in Following Locations
                $(this).find('.allowed-patch-locations input:checked').each(function(){
                    data.preferences.push({
                        name: $(this).attr('pref-name'),
                        tire_size_id: dataid,
                        material_id: $(this).attr('material-id'),
                        patch_location_id: $(this).attr('patch-id'),
                        value: '1'
                    })
                })
                
                // loop Maximum Repairs per Patch Location
                $(this).find('.repairs-per-location input').each(function(){
                    data.preferences.push({
                        name: $(this).attr('patch-name'),
                        tire_size_id: dataid,
                        patch_location_id: $(this).attr('patch-id'),
                        value: $(this).val()
                    })
                })
            })
            
            $.ajax({
                type: 'POST',
                url: url,
                data: 'data[RetreadTemplatePreference]='+JSON.stringify(data),
                success: function(data){
                    var o = me.tools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                    }
                }
            });
        }
        ,cancelChange: function(){
            if( confirm('Any changes made will be lost, continue?') ){
                this.loadTemplate(this.id);
            }
        }
        ,deleteTemplate: function(callback){
            if( confirm('Are you sure you want to delete this template?') ){
                var me = this;
                $.get('/retread_templates/delete/'+this.id,function(data){
                    var o = me.tools.parseJson(data);
                    if(callback != undefined){
                        callback(o.json);
                        me.id = 0;
                        me.name = '';
                    }
                });
            }
        }
        // this was built because the Patch Preferences checkboxes share the same IDs and this broke the default HTML support for label for=
        ,pseudoLabel: function(element){
            // check nearest sibling checkbox to see if its checked, then toggle its checked state
            var checkbox = $(element).parent().find('#'+$(element).attr('for'));
            if( checkbox.attr('checked') == 'checked' ){
                checkbox.attr('checked',false);
            }
            else{
                checkbox.attr('checked',true);
            }
        }
    }
    
    //RetreadTemplate.init();
})