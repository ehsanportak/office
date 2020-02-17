jQuery(document).ready(function($){
    $("a.ep_buy_show").click(function(){
        alert('ok');
        $(this).next().slideDown(2000).end().hide(1000);
        return false;
    });
});