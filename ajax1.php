
<?php
if ($_REQUEST) {
    $a = file_get_contents($_REQUEST["page"]);
    $b = json_decode($a, true);
?>
 <table class="tg">
        <tr>
            <th class="tg-0lax">نوع ارز</th>
            <th class="tg-0lax">شهر</th>
            <th class="tg-0lax">خرید</th>
            <th class="tg-0lax">فروش</th>
        </tr>     
     <?php
      for($i=0;$i<=23;$i++){?>
        <tr>
            <th class="tg-0lax"><?= $b["Currency"][$i]["Code"]?></th>
            <th class="tg-0lax"><?= $b["Currency"][$i]["Currency"]?></th>
            <th class="tg-0lax"><?= $b["Currency"][$i]["Sell"]?></th>
            <th class="tg-0lax"><?= $b["Currency"][$i]["Buy"]?></th>
        </tr>
     <?php }?>
    </table>
    <?php } ?>