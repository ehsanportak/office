<?php
$url='http://moviesapi.ir/api/v1/movies?page=1';
$resault=file_get_contents($url);
$body=json_decode($resault);
print_r($body);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <title>کتاب ها</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style type="text/css">
        .item div{
            min-height: 650px;
            border: 1px solid red;
            margin-top: 5px;
            border-radius: 3px;
            text-align: center;
            padding: 10px;
        }
        .img-res{
            width: 200px;
            height: 300px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php for($i=0;$i<=9;$i++): ?>
                <div class="item col-md-3">
                    <div>
                        <img src="<?php echo $body->data[$i]->poster;?>" class="img-res"/>
                        <h3 title="book subtitle">
                            <?php echo $body->data[$i]->title;?>
                        </h3>
                        <p class="description">

                        </p>
                        <input type="button" class="btn btn-primary" value="خرید"/>
                        <a href="#" class="btn btn-default">بیشتر...</a>

                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </body>
</html>