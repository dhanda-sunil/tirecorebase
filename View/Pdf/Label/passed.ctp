<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body{font-family:Arial;color:#0F0F0F;}
            #Area{width:350px}
            .Barcode{display:block;margin:0 auto 15px auto}
            .Content{width:335px;margin:0 auto 0 auto; background:#fff; padding:5px}
            .RoundBorder{
                border:1px solid #000;
                -moz-border-radius: 4px;
               -webkit-border-radius: 4px;
               -khtml-border-radius: 4px;
               border-radius: 4px;
            }
            h2{text-align:center;font-weight:normal;font-size:24px;line-height:20px;}
        </style>
    </head>
    <body>
        <div id="Area" class="">
            <div class="Content RoundBorder">
                <h2><?=$data['CoItem']['Co']['User']['Location']['name']?></h2>
                <img class="Barcode" src="<?=$data['CasingImage']?>" />
            </div>
            <div class="Content RoundBorder" style="margin-top:5px">
                <h2><?=$data['Customer']['company_name']?></h2>
                <div style="text-align:center">
                    <?=$data['CoItem']['Co']['id']?> - <?=$data['CoItem']['line_number']?> of <?=$data['Lines']?>
                </div>
                <div>
                    <?=$data['CoItem']['Co']['User']['first_name']?> <?=substr($data['CoItem']['Co']['User']['last_name'],0,1)?>. <?=$data['CoItem']['Co']['User']['Location']['name']?>
                </div>
                <h2><?=$data['TireSize']['tread_width_id']?>/<?=$data['TireSize']['aspect_ratio']?>R<?=$data['TireSize']['diameter']?></h2>
                <div>
                    <?=$data['TreadDesign']['name']?><br/>
                    Tread Size: <?=$data['TreadWidth']['size_standard']?> (<?=$data['TreadWidth']['size_mm']?>)
                    <?=$data['ManufacturerProductLine']['ManufacturerPlant']['Manufacturer']['name']?> S/N:<?=$data['Casing']['production_week']?>
                    Times Capped: <?=$data['Casing']['previous_caps']?>
                    <img class="Barcode" src="<?=$data['FinishedImage']?>" />
                </div>
            </div>
        </div>
    </body>
</html>