<div class="accordion-group">
    <div class="accordion-heading">
        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="Shipments.init()">
            <i class="icon-th"></i> Shipments
        </a>
    </div>
    <div class="accordion-body collapse in" id="collapseOne">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li class="active"><a href="javascript:Shipments.index()">List Shipments</a></li>
                <li><a href="javascript:Shipments.add()">Add New</a></li>
            </ul>
        </div>
    </div>
    <div class="accordion-heading">
        <a href="#collapse2" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="Molds.init()">
            <i class="icon-th"></i> Molds
        </a>
    </div>
    <div class="accordion-body collapse" id="collapse2">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li><a href="javascript:Molds.index()">List Molds</a></li>
                <li><a href="javascript:Molds.add()">Add Mold</a></li>
            </ul>
        </div>
    </div>
    <div class="accordion-heading">
        <a href="#collapse5" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="BeadPlate.init()">
            <i class="icon-th"></i> Bead Plates
        </a>
    </div>
    <div class="accordion-body collapse" id="collapse5">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li><a href="javascript:BeadPlate.index()">List Bead Plates</a></li>
                <li><a href="javascript:BeadPlate.add()">Add Bead Plate</a></li>
            </ul>
        </div>
    </div>
    <div class="accordion-heading">
        <a href="#collapse3" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="MoldTypes.init()">
            <i class="icon-th"></i> Mold Types
        </a>
    </div>
    <div class="accordion-body collapse" id="collapse3">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li><a href="javascript:MoldTypes.index()">List Mold Types</a></li>
                <li><a href="javascript:MoldTypes.add()">Add Mold Type</a></li>
            </ul>
        </div>
    </div>
    <div class="accordion-heading">
        <a href="#collapse4" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle" onclick="ProductivityReport.init()">
            <i class="icon-th"></i>Productivity
        </a>
    </div>
    <div class="accordion-body collapse" id="collapse4">
        <div class="accordion-inner">
            <ul class="nav nav-list">
                <li><a href="javascript:ProductivityReport.index()">Productivity Report</a></li>
                <li><a href="javascript:ProductivityReport.graph()">Productivity Graph</a></li>
            </ul>
        </div>
    </div>
</div>