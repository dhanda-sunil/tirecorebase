<?php
$jsClassName = preg_replace('/\s/','',$pluralHumanName);
?>
<div class="accordion-group">
    <div class="accordion-heading">
        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-user"></i> <?php echo $pluralHumanName; ?>
        </a>
    </div>
    <div class="accordion-body collapse in" id="collapseOne">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li class="active" action="index"><a href="javascript:<?php echo $jsClassName ?>.index()">List All</a></li>
                <li><a href="javascript:<?php echo $jsClassName ?>.add()">Add <?php echo $singularHumanName; ?></a></li>
            </ul>
        </div>
    </div>
</div>