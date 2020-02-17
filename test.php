<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    * { font-family: Tahoma, 'Courier New', Courier }
*:focus { outline: none; }
body {
    text-align: center;
    background-color: #fafafa;
    color: #000000;
    direction: rtl;
    padding: 15px;    
}

button {
    background-color: #3399ff;
    color:#ffffff;
    padding: 10px 15px;
    border-radius: 5px;
    border: none;
    box-shadow: 0px 3px 5px 0px #86a8c0;
    transition: all 0.10s linear;
}
button:hover {
    background-color: #3366ff;
}
button:focus {
    background-color: #3377ff;
    box-shadow: 0px 1px 5px 0px #86a8c0;
}
#result {
    direction: ltr;
    margin: 3em;
}
#result * {
    font-family: 'Courier New', Courier, monospace !important;
} 
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
 $('button').click(function() {
        $.post("http://localhost/wordpress/ajax.php", {i:'ehsanportak'} , function(response) {

            setTimeout("finishAjax('content', '" + escape(response) + "')", 400);

        });
        return false;

    });

    function finishAjax(id, response) {
        $('.' + id).append(unescape(response));
    }
});
</script>
</head>
<body>
 
 <div>
        </div>
        <div>
            <button id="get-info">بارگذاری با Ajax</button>
            <div id="result">
            </div>
        </div>
</body>
</html>