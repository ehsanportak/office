<label>اطلاعات محصول</label>
<br>
<label>نکته: نام محصولات در فایل اکسل با مقدار فیلد replace جایگزین شده است</label>
    <table border="1">  
    <tr>  
        <th >ID</th>  
        <th>Name</th>   
        <th>replace name</th>   
        <th>Price</th>   
        <th>date</th>   
    </tr>  
    <?php

use function PHPSTORM_META\type;
global $wpdb;
$db_name = $wpdb->dbname;
$db_user = $wpdb->dbuser;
$db_pass = $wpdb->dbpassword;
$db_host = $wpdb->dbhost;
$db_prefix = $wpdb->base_prefix;
$a= $db_prefix . 'posts';
$b= $db_prefix . 'wc_product_meta_lookup';

$conn = new mysqli($db_host , $db_user , $db_pass);   
    mysqli_select_db($conn, $db_name);   
    $conn->set_charset("utf8");
    
    $sql = mysqli_query($conn,"SELECT * FROM $a INNER JOIN $b ON $a.ID=$b.product_id WHERE $a.post_type='product' AND $a.post_status='publish'");  
    $a=1;
    while($data = mysqli_fetch_row($sql)){  
    echo '  
    <tr>   
    <td>'.$data[0].'</td>  
    <td>'.$data[5].'</td>
    <td>'.$a.'</td>  
    <td>'.$data[27].'</td>
    <td>'.$data[2].'</td>
    </tr>  
    ';
    $a++;
    }  
    ?>  
    </table> <a href="../wp-content/plugins/ep_get-json-woo/report_root/Report_product.php"> Export To Excel </a>