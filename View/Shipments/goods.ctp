<style type="text/css">
    body,table,tr,td{
        font-size: 8px;
    }
    table{
        border-collapse:collapse;
    }
    td,th{
        border:1px solid #ccc;
    }
</style>
<div style="text-align:center">
    <strong>Shipped Goods</strong><br/>
    <span><?=date('m/d/Y h:i a')?></span<br/>
</div>
<table>
    <thead>
    <tr>
        <th>Workorder</th>
        <th>Customer</th>
        <th>Line</th>
        <th>Barcode</th>
        <th>Code</th>
        <th>Item No.</th>
        <th>Tire Size</th>
        <th>Brand</th>
        <th>DOT</th>
        <th>Desc.</th>
        <th>Tread Size</th>
    </tr>
    </thead>
    <tbody>
        <? if( count($casings) ): ?>
        <? foreach($casings[0]['ShipmentGood'] as $i): ?>
        <tr>
            <td data-id="ref"><?=$i['FinishedGood']['Casing']['CoItem']['Co']['ref']?></td>
            <td data-id="company_name"><?=$i['FinishedGood']['Casing']['Customer']['company_name']?></td>
            <td data-id="line_number"><?=$i['FinishedGood']['Casing']['CoItem']['line_number']?></td>
            <td data-id="barcode"><?=$i['FinishedGood']['Casing']['barcode']?></td>
            <td data-id="item_type"><?=$i['FinishedGood']['Casing']['CoItem']['CoItemType']['name']?></td>
            <td data-id="item">
                <? if(isset($i['FinishedGood']['Casing']['Size']['size_code'])): ?>
                <?=trim($i['FinishedGood']['Casing']['Size']['size_code'])?>
                <? else: ?>
                <?=trim($i['FinishedGood']['Casing']['TireSize']['size_code'])?>
                <? endif;?>
                <?=trim($i['FinishedGood']['Casing']['TreadDesign']['tread_abb'])?><?=trim($i['FinishedGood']['Casing']['TreadWidth']['size_mm'])?>
            </td>
            <td data-id="tiresize"><?=$i['FinishedGood']['Casing']['TireSize']['name']?></td>
            <td data-id="brand">
                <? if($i['FinishedGood']['Casing']['manufacturer_id']): ?>
                <?=$i['FinishedGood']['Casing']['Manufacturer']['name']?>
                <? else: ?>
                <?=$i['FinishedGood']['Casing']['ManufacturerPlant']['Manufacturer']['name']?>
                <? endif; ?>
            </td>
            <td data-id="dot">
                <?=$i['FinishedGood']['Casing']['plant_dot']?><?=$i['FinishedGood']['Casing']['size_dot']?><?=$i['FinishedGood']['Casing']['product_line_dot']?><?=$i['FinishedGood']['Casing']['production_week']?>
            </td>
            <td data-id="desc"><?=$i['FinishedGood']['Casing']['TreadDesign']['name']?></td>
            <td data-id="size_mm"><?=$i['FinishedGood']['Casing']['TreadWidth']['size_mm']?></td>
        </tr>
        <? endforeach; ?>
        <? else: ?>
        <tr>
            <td colspan="20">No casings found. Please try another search.</td>
        </tr>
        <? endif; ?>
    </tbody>
</table>