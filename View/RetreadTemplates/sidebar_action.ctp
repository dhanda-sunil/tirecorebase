<div class="accordion-group">
    <div class="accordion-heading">
        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-folder-close"></i> Preference Templates
        </a>
    </div>
    <div class="accordion-body collapse in" id="collapseOne">
        <div class="accordion-inner">
            <ul id="PreferencesNav" class="nav nav-list">
                <? foreach($template_list as $x => $i): ?>
                <li class="<?=$i == 'Default' ? 'active':''?>"><a href="javascript:RetreadTemplate.loadTemplate(<?=$x?>)"><?=$i?></a></li>
                <? endforeach; ?>
                <li><a href="javascript:RetreadTemplate.addTemplate()">Add New</a></li>
            </ul>
        </div>
    </div>
</div>