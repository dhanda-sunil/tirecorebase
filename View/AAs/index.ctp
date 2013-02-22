<!-- THIS TEMPLATE IS BAKED! -->
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">A As</span> <span id="page-sub-title"></span></h3>
</div>

<table id="page-table" class="table table-bordered table-striped table_vam">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Test</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="page-container"></div>

<div id="page-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <input type="button" class="btn btn-inverse" name="save" value="Save changes" />
        <input type="button" class="btn" name="cancel" value="Cancel" />
    </div>
</div>

<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-record-template">
<div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
        <fieldset>
            <p class="f_legend">A A Information</p>
			<div class="control-group">
				<label class="control-label">Id <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[AA][id]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Name <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[AA][name]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Test <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[AA][test]" />
				</div>
			</div>
        </fieldset>
        </form>
    </div>
</div>
<div class="form-actions">
    <input type="button" class="btn btn-inverse save-record" name="save" value="Save changes" />
    <input type="button" class="btn close-record" name="cancel" value="Close" />
</div>
</script>
<script>
/**
 * THIS SHOULD BE MOVED INTO ITS OWN JAVASCRIPT FILE
 */
$(function() {
    
    AA = {
        id: 0,
        init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if($('#page-title').text() != 'A As'){
                $.get('/a_as/index',function(response){
                    $('#main-content').html(response);
                    coreTools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    coreTools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait()
                    .script('/lib/datatables/extras/ColReorder/media/js/ColReorder.min.js').wait(function(){
                        me.index();
                    });
                })
            }
            else{
                this.index();
            }
        }
        ,index: function(){
            
            this.clear();
            $('#page-table').show();
            $('.nav-list li').removeClass('active');
            $('#collapse4 li:first-child').addClass('active');
            
            // init dataTables
            $('#page-table').dataTable({
                "iDisplayLength": 100,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/a_as/index.json",
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        ,add: function(){
            this.id = 0;
            var me = this;
            this.clear();
            
            // change title
            $('#page-sub-title').html('<br/>Add New A A');
            // clone template
            var form = $('#page-record-template').clone();
            
            $('#page-container').html($(form).html()).show();
            
            // save
            $('#page-container .save-record').unbind().click(function(){
                var record = coreTools.getData($('#page-container'));
                me.save(record, function(response){
                    if(response.success == '1'){
                        me.index();
                    }
                })
            })
            // cancel
            $('#page-container [name="cancel"]').unbind().click(function(){
                me.index();
            })
        }
        ,view: function(id){
            this.id = id;
            var me = this;
            
            $.get('/a_as/view/'+id+'.json',function(record){
                
                var form = $('#page-record-template').clone();
                $('#page-modal #modal-title').text('Edit');
                $('#page-modal .modal-body').html($(form).html()).show();
                $('#page-modal').modal();
                $('#page-modal .control-buttons').hide();
                
                coreTools.renderRecord($('#page-modal .modal-body'),record);
                
                // save
                $('#page-modal [name="save"]').click(function(){
                    var record = coreTools.getData($('#page-modal'));
                    me.save(record, function(response){
                        coreTools.response(response);
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
                url: '/a_as/'+action+'.json',
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
</script>