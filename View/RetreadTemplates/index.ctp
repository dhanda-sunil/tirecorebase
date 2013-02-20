<div class="heading clearfix">
    <h3 class="pull-left">Retread Preferences</h3>
</div>
<div id="preference-form-main">
    <p>Select a preference from the left</p>
</div>

<!-- INDIVIDUAL ACCORDION TEMPLATE -->
<script type="text/template" id="accordian-template">
<div class="accordion-group">
    <div class="accordion-heading">
        <a data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
        <!-- HEADING HERE -->
        </a>
    </div>
    <div class="accordion-body collapse" style="height: 0px; ">
        <div class="accordion-inner">
         <!-- FORM HERE -->
         </div>
    </div>
</div>
</script>

<!-- MAIN FORM TEMPLATE -->
<script type="text/template" id="preference-form-main-template">
<form class="form_validation_ttip" novalidate="novalidate">
    <div class="formSep">
        <div class="row-fluid">
            <div class="span12">
                <label>Template Name <span class="f_req">*</span></label>
                <input type="text" class="template_name" class="span8">
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <select id="tire_size_select" multiple="multiple">
                        <? foreach($tireSizes as $i): ?>
                        <option value="<?=$i['TireSize']['id']?>"><?=$i['TireSize']['name']?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="help-block" style="margin-top:5px">*Move a tiresize from to the right to set preferences for the tiresize. Tires sizes without preferences 
            will use the default preferences</div>
    </div>
    <div class="formSep">
    <div class="accordion preference-group">
        <!-- ACCORDION ELEMENTS -->
    </div>
    <div class="form-actions">
        <input type="button" class="btn btn-inverse save-template" value="Save changes" />
        <input type="button" class="btn cancel-template-change" value="Cancel" />
        <button type="button" class="btn delete-template" title="Delete" style="display:none"><i class="icon-remove-sign"></i></button>
    </div>
</form>
</script>

<!-- PREFERENCES -->
<script type="text/template" id="preference-template">
<div class="standard-options">
    <div class="row-fluid">
         <div class="span12">
             <label>Maximum Tire Age <!--<span class="f_req">*</span>--></label>
             <select data-id="max-age">
                 <option value="">---</option>
                 <?for($i=0;$i<10;$i++): ?>
                 <option value="<?=$i?>"><?=$i?></option>
                 <?endfor; ?>
             </select>
         </div>
     </div>
     <div class="row-fluid">	
         <div class="span12">
             <label>Maximum Total Retreads</label>
             <select data-id="max-retreads">
                 <option value="">---</option>
                 <?for($i=0;$i<10;$i++): ?>
                 <option value="<?=$i?>"><?=$i?></option>
                 <?endfor; ?>
             </select>
             <span class="help-block">*Since tire was originally manufactured</span>
         </div>
     </div>
     <div class="row-fluid">	
         <div class="span12">
             <label>Maximum Total Repairs</label>
             <select data-id="max-repairs">
                 <option value="">---</option>
                 <?for($i=0;$i<10;$i++): ?>
                 <option value="<?=$i?>"><?=$i?></option>
                 <?endfor; ?>
             </select>
            <span class="help-block">*Since tire was originally manufactured</span>
         </div>
     </div>
     <div class="row-fluid">
         <div class="span12">
             <label>Repairs Per Re-Cap<!--<span class="f_req">*</span>--></label>
             <select data-id="max-recap">
                 <option value="">---</option>
                 <?for($i=0;$i<10;$i++): ?>
                 <option value="<?=$i?>"><?=$i?></option>
                 <?endfor; ?>
             </select>
             <span class="help-block">*Repairs allowed per casing</span>
         </div>
     </div>
     <div class="row-fluid">
         <div class="span12">
             <label>Non-Retreadable Casings</label>
             <select data-id="nrt-pref">
                 <option value="">---</option>
                 <option value=scrap">Scrap</option>
                 <option value=return">Return as received</option>
             </select>
         </div>
     </div>
     <div class="row-fluid">
        <div class="span12">
            <label>Preferred Tread Design</label>
            <select data-id="tread-pref">
                <option value="">---</option>
                <? foreach($treadDesigns as $i): ?>
                <option value="<?=$i['TreadDesign']['id']?>"><?=$i['TreadDesign']['name']?> (<?=$i['TreadDesign']['tread_abb']?>)</option>
                <? endforeach; ?>
            </select>
        </div>
     </div>
    <br/>
</div>
 <div class="row-fluid">
    <div class="span8">
     <div class="w-box" id="w_sort02">
         <div class="w-box-header">
             Patch Preferences
         </div>
         <div class="w-box-content">
             <table class="table table-striped allowed-patch-locations">
                 <thead>
                     <tr>
                         <th>Patch Type</th>
                         <th colspan="6">Allow Patches in Following Locations</th>
                     </tr>
                 </thead>
                 <tbody>
                     <? foreach($materials as $material_id => $material): ?>
                     <tr>
                         <td><?=$material?></td>
                         <? foreach($patches as $patch_id => $patch): ?>
                         <td>
                             <input type="checkbox" id="<?=$patch_id.'-'.$material_id?>" material-id="<?=$material_id?>" patch-id="<?=$patch_id?>" pref-name="<?=$patch.'-'.$material?>" /> 
                             <span style="cursor:pointer" for="<?=$patch_id.'-'.$material_id?>" onclick="RetreadTemplate.pseudoLabel(this)"><?=$patch?></span>
                         </td>
                         <? endforeach; ?>
                     </tr>
                     <? endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
     </div>
 </div>
 <div class="row-fluid">
     <div class="span8">
     <div class="w-box" id="w_sort02">
         <div class="w-box-header">
             Location Preferences
         </div>
         <div class="w-box-content">
             <table class="table table-striped repairs-per-location">
                 <thead>
                     <tr>
                         <th>Patch Location</th>
                         <th>Maximum Repairs per Patch Location</th>
                     </tr>
                 </thead>
                 <tbody>
                     <? foreach($patches as $patch_id => $patch): ?>
                     <tr>
                         <td><?=$patch?></td>
                         <td><input type="text" value="" patch-id="<?=$patch_id?>" patch-name="<?=$patch?>" /></td>
                     </tr>
                     <? endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
     </div>
 </div>
</script>