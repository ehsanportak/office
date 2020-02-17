<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<?php
$a = file_get_contents("https://currency.jafari.pw/json");
$b = json_decode($a);

?>
<div class="style" style="overflow-x: auto;">

    <div class="container">
        <div class="content">
        
        <?php 
        echo 'last update:' ."  ". $b->LastModified . '<br>'; 
        ?>
            <div id="demo">
            <table class="tg">
        <tr>
            <th class="tg-0lax">نوع ارز</th>
            <th class="tg-0lax">شهر</th>
            <th class="tg-0lax">فروش</th>
            <th class="tg-0lax">خرید</th>
        </tr>     
     <?php
      for($i=0;$i<=23;$i++){
        echo'<tr>';
           echo '<th class="tg-0lax">'. $b->Currency[$i]->Code.'</th>';
           echo '<th class="tg-0lax">'. $b->Currency[$i]->Currency.'</th>';
            echo '<th class="tg-0lax">'. $b->Currency[$i]->Sell.'</th>';
            echo '<th class="tg-0lax">'. $b->Currency[$i]->Buy.'</th>';
        echo'</tr>';
    }
     ?>
    </table>
            </div>
        </div>
    </div>
</div>
<script>
    setInterval(function() {
        $(".content").children().remove();
        $.post("http://localhost/wordpress/ajax1.php", {
            page: "https://currency.jafari.pw/json"
        }, function(response) {

            setTimeout("finishAjax('content', '" + escape(response) + "')", 100);

        });
        return false;




    }, 50000);

    function finishAjax(id, response) {
        $('.' + id).append(unescape(response));
    }
</script>