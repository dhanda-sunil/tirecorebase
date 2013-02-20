<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body{font-family:Arial;color:#0F0F0F;}
            #Area{width:350px}
            #Barcode{display:block;margin:0 auto 15px auto}
            .Content{width:335px;margin:0 auto 0 auto; background:#fff}
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
                <h2>S.L. TRUCK CENTER</h2>
                <img id="Barcode" src="<?=$data['image']?>" />
            </div>
            <div class="Content RoundBorder" style="margin-top:5px">
                <h2><?=$data['Customer']['company_name']?></h2>
            </div>
        </div>
    </body>
</html>