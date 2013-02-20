/**
 * Customers
 * @todo remove tab
 * @todo datatables refactoring
 * @todo same as shipping address
 * @todo edit page
 */
$(function() {
    
    ProductivityReport = {
        id:0,
        tools: new CoreTools(),
        pageTabs:[],
        init: function(){
            var me = this;
            //@todo this should probably not be tied to the DOM
            if($('#page-title').text() != 'Productivity Report'){
                $.get('/retreads/productivity_report',function(response){
                    $('#main-content').html(response);
                    me.tools.addStyle('lib/datatables/css/jquery.dataTables.css');
                    me.tools.addStyle('lib/datatables/extras/TableTools/media/css/TableTools.css');
                    me.tools.addStyle('/lib/datepicker/datepicker.css');

                    $LAB
                    .script('/lib/datatables/js/jquery.dataTables.min.js').wait()
                    .script('/lib/datepicker/bootstrap-datepicker.min.js').wait(function(){
                        $('#dp_start').datepicker({
                            'startDate': '01-01-2013'
                        });
                        $('#dp_end').datepicker();
                    })
                    .script('/lib/datatables/extras/TableTools/media/js/TableTools.min.js').wait(function(){
                        me.index();
                    })
                })
                $('.nav-list').removeClass('active');
                $('#collapse4 li:first-child').addClass('active');
            }
        }
        ,graph: function(){
            var me = this;
            me.tools.addStyle('lib/nvd3/src/nv.d3.css');
            
            $LAB
            .script('/lib/nvd3/lib/d3.v2.js').wait()
            .script('/lib/nvd3/lib/fisheye.js').wait()
            .script('/lib/nvd3/nv.d3.min.js').wait(function(){
                var data = 'start_date='+$('#dp_start').find('input').val()+'&end_date='+$('#dp_end').find('input').val()+'&checkpoint_id='+$('#checkpoint-id').val()+'&graph=average_time';
                me.fetchGraph(data);
                
                $('#productivity-table').hide();
                $('#productivity-table_wrapper').hide();
                $('#chart svg').show();
                $('#graph-options').val('average_time');
                $('#graph-options').show().change(function(){
                    data = 'start_date='+$('#dp_start').find('input').val()+'&end_date='+$('#dp_end').find('input').val()+'&checkpoint_id='+$('#checkpoint-id').val()+'&graph='+$(this).val();
                    me.fetchGraph(data);
                });
            })
        }
        ,fetchGraph: function(data){
            $.post('/retreads/productivity_report.json', data, function(data){
                nv.addGraph(function() {
                  var chart = nv.models.discreteBarChart()
                      .x(function(d) { return d.label })
                      .y(function(d) { return d.value })
                      .staggerLabels(true)
                      .tooltips(false)
                      .showValues(true)

                  d3.select('#chart svg')
                      .datum(data)
                    .transition().duration(500)
                      .call(chart);

                  nv.utils.windowResize(chart.update);

                  return chart;
                });
            })
        }
        ,index: function(){
            var me = this;
            this.clear();
            
            $('.run-report').unbind().click(function(){
                var start = $('#dp_start').find('input').val();
                var end = $('#dp_end').find('input').val();
                var data = 'start_date='+start+'&end_date='+end+'&checkpoint_id='+$('#checkpoint-id').val();
                
                $.post('/retreads/productivity_report', data, function(response){
                    $('#main-content').html(response);
                    me.index();
                    $('#dp_start').find('input').val(start);
                    $('#dp_end').find('input').val(end);
                    $('#dp_end').datepicker();
                    $('#dp_end').datepicker();
                })
            })

            var dataTable = $('#productivity-table').dataTable({
                "iDisplayLength": 500,
                "sDom": 'RTfrtip',
                "oTableTools": {
                    "sSwfPath": "/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
            
            $('#productivity-table').show();
            $('#productivity-table_wrapper').show();
        }
        ,clear: function(){
            $('.dataTable').each(function(){
                $(this).dataTable().fnDestroy();
            })
            $('#chart svg').hide();
            $('#graph-options').hide();
        }
    }
})