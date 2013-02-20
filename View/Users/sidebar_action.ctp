<div class="accordion-group">
    <div class="accordion-heading">
        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="User.init()">
            <i class="icon-user"></i> Users
        </a>
    </div>
    <div class="accordion-body collapse in" id="collapseOne">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li class="active"><a href="javascript:User.index()">List All</a></li>
                <li><a href="javascript:User.add()">Add New</a></li>
            </ul>
        </div>
    </div>
    <? if($user['UserGroup']['name'] == 'Root'): ?>
    <div class="accordion-heading">
        <a href="#collapse-2" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="UserGroup.init()">
            <i class="icon-user"></i> Groups (Root Only)
        </a>
    </div>
    <div class="accordion-body collapse" id="collapse-2">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li><a href="javascript:UserGroup.index()">List All</a></li>
                <li><a href="javascript:UserGroup.add()">Add New</a></li>
            </ul>
        </div>
    </div>
    <? endif; ?>
</div>